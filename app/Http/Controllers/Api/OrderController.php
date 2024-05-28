<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Recupera i dati dal payload della richiesta
        $customerData = $request->input('customerData');
        $cart = $request->input('cart');

        // Crea un nuovo ordine e salva i dati nella tabella 'orders'
        $newOrder = new Order();
        $newOrder->name = $customerData['billingAddress']['name'];
        $newOrder->surname = $customerData['billingAddress']['surname'];
        $newOrder->email = $customerData['email'];
        $newOrder->phone_number = $customerData['billingAddress']['phoneNumber'];
        $newOrder->address = $customerData['billingAddress']['address'];
        $newOrder->total = $cart['total'];
        $newOrder->save();

        foreach($cart['items'] as $plate){
            $newOrder->plates()->attach($plate['id'], ['quantity' => $plate['quantity']]);
        }

        return response()->json([
            "success" => true,
            "results" => $newOrder,
        ]);
    }
}
