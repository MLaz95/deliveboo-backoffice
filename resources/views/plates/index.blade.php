@extends('layouts.app')

@section('content')
<div class="container">
    <div class="my-4 d-flex justify-content-between align-items-center">
        <div>
            <a class="btn btn-primary text-decoration-none " href="{{route('restaurant')}}">Back</a>
        </div>
        <div>
            <a class="btn btn-primary text-decoration-none " href="{{route('plates.create')}}">Create Plate</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h1>Your Plates</h1>
                </div>

                @foreach ($plates as $plate)
                <div class="card m-3 " style="width: 18rem;">
                    <img src="{{asset('storage/' . $plate->image)}}" class="card-img-top" alt="@">
                    <div class="card-body">
                      <h5 class="card-title">{{$plate->name}}</h5>
                      <p class="card-text">{{$plate->ingredients}}</p>
                      <a href="{{route('plates.show', $plate->id)}}" class="btn btn-primary">Show</a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection