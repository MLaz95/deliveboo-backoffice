@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center">Order Details</h1>

    <div class="card">
        <div class="card-header">
            <h2>Order ID: {{ $order->id }}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Name:</strong> {{ $order->name }}</p>
                    <p><strong>Surname:</strong> {{ $order->surname }}</p>
                    <p><strong>Email:</strong> {{ $order->email }}</p>
                    <p><strong>Phone Number:</strong> {{ $order->phone_number }}</p>
                    <p><strong>Address:</strong> {{ $order->address }}</p>
                    <p><strong>Total:</strong> {{ $order->total }} €</p>
                    <p><strong>Created At:</strong> {{ $order->created_at->locale('it')->isoFormat('LLLL') }}</p>
                </div>
                <div class="col-md-6">
                    <h3>Order Items:</h3>
                    <ul class="ps-0">
                        @foreach ($order->plates as $plate)
                            <div class="fs-4">
                                <span class="text-danger fw-bold">{{ $plate->pivot->quantity }}x</span>
                                <span class="text-danger fw-bold">{{ $plate->name }}</span> 
                            </div>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('order-summary') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
@endsection