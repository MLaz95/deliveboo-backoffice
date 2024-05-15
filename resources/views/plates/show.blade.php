@extends('layouts.app')

@section('content')
<div class="container">
    <div class="my-4 d-flex justify-content-between align-items-center">
        <div>
            <a class="btn btn-primary text-decoration-none " href="{{route('plates.index')}}">Back</a>
        </div>
        <div>
            <a class="btn btn-warning  text-decoration-none " href="{{route('plates.edit', $plate->id)}}">Edit</a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Delete Plate
            </button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Are you sure you want to delete '{{$plate->name}}' ?
              </div>
              <div class="modal-footer">
                <form action="{{route('plates.destroy', $plate)}}" method="POST">

                    @csrf

                    @method("DELETE")

                    <button class="btn btn-danger">Confirm Delete</button>
                </form>
              </div>
            </div>
          </div>
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