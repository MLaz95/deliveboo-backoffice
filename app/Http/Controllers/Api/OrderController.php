<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewOrder;
use App\Models\Lead;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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

        // Crea un nuovo lead e salva i dati nella tabella 'leads'
        $newLead = new Lead();
        $newLead->name = $customerData['billingAddress']['name'];
        $newLead->address = $customerData['email'];
        $newLead->message = 'Order placed with total: ' . $newOrder->total . '€';
        $newLead->save();

        // Invia email al consumatore con i dettagli dell'ordine
        Mail::to($customerData['email'])
            ->send(new NewOrder($newOrder, $customerData));

        // recupera ristorante dal piatto
        $restaurant = Restaurant::where('id', $cart['items'][0]['restaurant_id'])
                                ->first();
        // recupera ristoratore dal ristorante
        $owner = User::where('id', $restaurant->user_id)->first();

        // Invia email al ristoratore con i dettagli dell'ordine
        Mail::to($owner->email)
            ->send(new NewOrder($newOrder, $customerData));

        // Risposta al client
        return response()->json([
            'success' => true,
            'message' => 'Ordine creato e email inviata correttamente',
            'request' => $request->all(),
            'results' => $owner,
        ]);
    }

    // recuperiamo la lista degli ordini da passare alla pagina order-summary
    public function summary()
    {
        // Recupera tutti gli ordini
        $orders = Order::all();

        // Passa gli ordini alla vista
        return view('orders.order-summary', compact('orders'));
    }

    public function show($id)
    {
        // Recupera l'ordine specifico con gli id
        $order = Order::with('plates')->findOrFail($id);
        
        // Passa l'ordine alla vista
        return view('orders.order-detail', compact('order'));
    }
}
