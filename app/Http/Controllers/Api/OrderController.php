<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request){

        $customerData = $request->customerData->amount;

        // $newOrder = new Order();

        // $newOrder->name = $customerData->billingAddress->name;
        // $newOrder->surname = $customerData->billingAddress->surname;
        // $newOrder->email = $customerData->email;
        // $newOrder->phone_number = $customerData->billingAddress->phoneNumber;
        // $newOrder->address = $customerData->billingAddress->address;
        // $newOrder->total = $customerData->amount;
        // $newOrder->save();

        return response()->json([
            "success" => true,
            "results" => $customerData,
        ]);

    }
}
