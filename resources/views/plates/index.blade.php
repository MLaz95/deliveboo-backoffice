@extends('layouts.app')

@section('content')
<div class="index-box">
    
    <div class="container">
        <div class="my-4 d-flex justify-content-between align-items-center">
            <div>
                <a class="btn btn-primary text-decoration-none " href="{{ route('restaurant') }}">Back</a>
            </div>
            <div>
                <a class="btn btn-primary text-decoration-none " href="{{ route('plates.create') }}">Create Plate</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h1>Your Plates</h1>
                    </div>
                    <div class="row row-cols-1 row-cols-lg-4">
                        @foreach ($plates as $plate)
                        <div class="col">
                            <a href="{{ route('plates.show', $plate->id) }}" class="text-decoration-none">
                                <div class="card m-3 " style="width: 18rem;">
                                    <img src="{{ asset('storage/' . $plate->image) }}" class="card-img-top object-fit-cover"
                                        alt="{{ $plate->name }}" style="height: 250px;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $plate->name }}</h5>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="card-text">{{ $plate->price }} &euro;</h6>
                                            @if($plate->visible)
                                            <p>Visible</p>
                                            @else
                                            <p>Not Visible</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
    
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
