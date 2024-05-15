@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        Welcome Back Admin
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h1>Your Restaurant</h1>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h1>{{$restaurant->name_res}}</h1>

                    <div class="d-flex justify-content-between align-items-center my-4  ">
                        <div class="d-flex gap-2">
                            @foreach($restaurant->categories as $category)
                            <span class="badge rounded-pill bg-light rounded rounded-3 text-black ">{{ $category->name }}</span>
                            @endforeach
                        </div>
    
                        <div>
                            <a href="{{route('plates.index')}}" class="btn btn-primary text-decoration-none ">menù</a>
                        </div>
                    </div>

                    <div class="container">
                        <img class="img-fluid" src="{{ asset('storage/' . $restaurant->img_res) }}" alt="">
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
