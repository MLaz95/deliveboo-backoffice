<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewOrder;
use App\Models\Lead;
use App\Models\Order;
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

        // email
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required',
        //     'address' => 'required|email',
        //     'message' => 'required'
        // ], [
        //     'name.required' => "Devi inserire il tuo nome",
        //     'address.required' => "Devi inserire la tua email",
        //     'address.email' => "Devi inserire una mail corretta",
        //     'message.required' => "Devi inserire un messaggio",
        // ]);

        //salvataggio del db
        $newLead = new Lead();
        $newLead->fill($request->all());
        $newLead->save();

        //invio mail
        Mail::to('mikypupo@hotmail.it')->send(new NewOrder($newLead));

        // Risposta al client
        return response()->json([
            'success' => true,
            'message' => 'Richiesta di contatto inviato correttamente',
            'request' => $request->all(),
            "results" => $newOrder,
        ]);
    }
}
