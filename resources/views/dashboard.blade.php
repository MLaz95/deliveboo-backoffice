@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <h1>{{$restaurant->name_res}}</h1>

                    <div class="d-flex gap-2 mb-5">
                        @foreach($restaurant->categories as $category)
                        <span class="badge rounded-pill bg-light rounded rounded-3 text-black ">{{ $category->name }}</span>
                        @endforeach
                    </div>

                    <a href="{{route('plates.index')}}" class="btn btn-danger text-decoration-none ">menù</a>

                    <img class="img-fluid" src="{{ asset('storage/' . $restaurant->img_res) }}" alt="">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
