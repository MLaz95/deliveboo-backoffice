@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center">Order Details</h1>

    <div class="card">
        <div class="card-header">
            <h2>Order ID: {{ $order->id }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $order->name }}</p>
            <p><strong>Surname:</strong> {{ $order->surname }}</p>
            <p><strong>Email:</strong> {{ $order->email }}</p>
            <p><strong>Phone Number:</strong> {{ $order->phone_number }}</p>
            <p><strong>Address:</strong> {{ $order->address }}</p>
            <p><strong>Total:</strong> {{ $order->total }} €</p>
            <p><strong>Created At:</strong> {{ $order->created_at }}</p>

            <h3>Order Items:</h3>
            <ul>
                @foreach ($order->plates as $plate)
                    <li>{{ $plate->name }} - Quantity: {{ $plate->pivot->quantity }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <a href="{{ route('order-summary') }}" class="btn btn-primary">Back</a>
</div>
@endsection