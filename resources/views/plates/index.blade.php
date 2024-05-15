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

                <div class="card m-3 " style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection