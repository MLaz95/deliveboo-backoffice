@extends('layouts.app')

@section('content')
<div class="container">
    <div class="my-4 d-flex justify-content-between align-items-center">
        <div>
            <a class="btn btn-primary text-decoration-none " href="{{route('plates.index')}}">Back</a>
        </div>
        <div>
            <a class="btn btn-warning  text-decoration-none " href="{{route('plates.edit', $plate->id)}}">Edit</a>
            <a class="btn btn-danger text-decoration-none " href="{{route('plates.destroy', $plate->id)}}">Delete Plate</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card m-3 " style="width: 18rem;">
                <img src="{{asset('storage/' . $plate->image)}}" class="card-img-top" alt="@">
                <div class="card-body">
                  <h5 class="card-title">{{$plate->name}}</h5>
                  <p class="card-text">{{$plate->ingredients}}</p>
                  <p>{{$plate->price}}€</p>
                    @if ($plate->visible == true)
                        <p>this plate is visible</p>
                    @else
                        <p>this plate is not visible</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection