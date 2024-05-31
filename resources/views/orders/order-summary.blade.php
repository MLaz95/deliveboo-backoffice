@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div style="background-color: white; padding: 20px; max-height: 800px; overflow-y: auto;">
                <h1 class="text-center">Order Summary</h1>
                <table class="table table-striped mt-4">
                    <thead>
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Surname</th>
                            {{-- <th scope="col">Email</th> --}}
                            {{-- <th scope="col">Phone Number</th> --}}
                            {{-- <th scope="col">Address</th> --}}
                            <th scope="col">Total</th>
                            <th scope="col">Created At</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allOrders->sortByDesc('created_at') as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->surname }}</td>
                                {{-- <td>{{ $order->email }}</td> --}}
                                {{-- <td>{{ $order->phone_number }}</td> --}}
                                {{-- <td>{{ $order->address }}</td> --}}
                                <td>{{ $order->total }} €</td>
                                <td class="text-danger fw-bold">{{ \Carbon\Carbon::parse($order->created_at)->isoFormat('D MMMM YYYY, HH:mm') }}</td>
                                <td>
                                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary">Show order</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-5">
            <div style="background-color: white; padding: 20px;">
                <h1 class="text-center">Stats</h1>
                {!! $chartjs->render() !!}
                <div class="text-center mt-4">
                    <a href="{{ route('restaurant') }}" class="btn btn-secondary">Back to Restaurant</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection