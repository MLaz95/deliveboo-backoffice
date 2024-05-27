<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;

class PaymentController extends Controller
{
    public function getToken()
    {
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'vqs23jdr6xh5ccdr',
            'publicKey' => '7hvxj3yjhgrvgvvn',
            'privateKey' => '013ab72c4a4b9e9db83ad7ed1d41167e',
        ]);

        $token = $gateway->ClientToken()->generate();

        return response()->json(['token' => $token]);
    }

    public function processPayment(Request $request)
    {
        $nonce = $request->input('paymentMethodNonce');
        $amount = $request->input('amount');

        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'vqs23jdr6xh5ccdr',
            'publicKey' => '7hvxj3yjhgrvgvvn',
            'privateKey' => '013ab72c4a4b9e9db83ad7ed1d41167e',
        ]);

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => $result->message]);
        }
    }
}