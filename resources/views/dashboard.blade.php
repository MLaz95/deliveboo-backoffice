@extends('layouts.app')

@section('content')
<div class="dashboard">
    
    <div class="container text-center cardB ">
        <h2 class="name fs-3   my-4  fw-bolder">
            Welcome Back {{$user->name}}
        </h2>
        <div class="row justify-content-center ">
            <div class="col-8">
                <div class="cards  rounded-2">
                    <div class="card-header fw-bolder">
                        <h1>{{$restaurant->name_res}}</h1>
                    </div>
                    
                    <div class="card-body d-flex gap-3 flex-column flex-md-row">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        
                        <div style="max-width: 300px; max-height: 400px;">
                            <img class=" rounded-5 p-3" src="{{ asset('storage/' . $restaurant->img_res) }}" alt="{{ $restaurant->name }}" style="width: 100%;">
                        </div>
                        
                        <div class="d-flex flex-column gap-3">
                            <h3 class=" adress text-start ">{{$restaurant->address_res}}</h3>
                            <div class=" d-flex gap-2 align-items-center fw-bolder">
                                <div>Categories:</div>
                                @foreach($restaurant->categories as $category)
                                <span class="categories badge rounded-pill  rounded rounded-3 text-black ">{{ $category->name }}</span>
                                @endforeach
                            </div>
        
                            <div class="d-flex align-items-start gap-4 pt-4 ps-5">
                                <a href="{{route('plates.index')}}" class="btn text-decoration-none text-white" style="background-color: #e67e22">Menu</a>
                                <a href="{{ route('order-summary') }}" class="btn text-white" style="background-color: #279647">Orders</a>
                                {{-- <a href="{{ route('orders.stats') }}" class="btn btn-success text-decoration-none" disabled>Statistics</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
