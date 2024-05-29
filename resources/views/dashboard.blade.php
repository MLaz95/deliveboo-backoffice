@extends('layouts.app')

@section('content')
<div class="dashboard">
    
    <div class="container">
        <h2 class="fs-4 text-light  my-4">
            Welcome Back {{$user->name}}
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h1>{{$restaurant->name_res}}</h1>
                    </div>
                    
                    <div class="card-body d-flex gap-3 flex-column flex-md-row">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        
                        <div style="max-width: 500px; max-height: 500px;">
                            <img class="" src="{{ asset('storage/' . $restaurant->img_res) }}" alt="{{ $restaurant->name }}" style="width: 100%;">
                        </div>
                        
                        <div class="d-flex flex-column gap-3">
                            <h2>{{$restaurant->address_res}}</h2>
                            <div class="d-flex gap-2 align-items-center">
                                <div>Categories:</div>
                                @foreach($restaurant->categories as $category)
                                <span class="badge rounded-pill bg-light rounded rounded-3 text-black ">{{ $category->name }}</span>
                                @endforeach
                            </div>
        
                            <div class="d-flex flex-column align-items-start gap-2">
                                <a href="{{route('plates.index')}}" class="btn btn-primary text-decoration-none ">Menu</a>
                                <a href="{{ route('order-summary') }}" class="btn btn-info">Orders</a>
                                <a href="{{ route('orders.stats') }}" class="btn btn-secondary text-decoration-none" disabled>Statistics</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
