@extends('layouts.app')

@section('content')
<div class="show-box">
    
    <div class="container">
      
        <div class="my-4 d-flex justify-content-between align-items-center">
          <div>
            <a class="btn btn-primary text-decoration-none " href="{{ route('plates.index') }}">Back</a>
          </div>
          <div>
            <a class="btn btn-warning  text-decoration-none " href="{{ route('plates.edit', $plate->id) }}">Edit</a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Delete Plate
            </button>
          </div>
        </div>
    
        <div class="row justify-content-center">
            <div class="col">
                <div class="d-flex gap-3">
                  <div>
                    <img src="{{ asset('storage/' . $plate->image) }}" class="img-fluid" alt="@" style="max-height: 500px">
                  </div>
                  <div>
                      <h2>{{ $plate->name }}</h2>
                      <p>Ingredients: {{ $plate->ingredients }}</p>
                      <p>Price: {{ $plate->price }}€</p>
                      @if ($plate->visible == true)
                          <p>This plate is visible</p>
                      @else
                          <p>This plate is not visible</p>
                      @endif
                  </div>
                </div>
            </div>
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
                        Are you sure you want to delete '{{ $plate->name }}' ?
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('plates.destroy', $plate) }}" method="POST">
    
                            @csrf
    
                            @method('DELETE')
    
                            <button class="btn btn-danger">Confirm Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
