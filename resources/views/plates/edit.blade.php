@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Edit</h1>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('plates.update', $plate->id)}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name') ?? $plate->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="ingredients" class="col-md-4 col-form-label text-md-right">{{ __('Ingrediets') }}</label>

                            <div class="col-md-6">
                                <textarea id="ingredients" rows="5" class="form-control h-100  @error('ingredients') is-invalid @enderror" name="ingredients" required autocomplete="ingredients" autofocus>{{ old('ingredients') ?? $plate->ingredients}}</textarea>    
                                @error('ingredients')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">

                                <div class="input-group mb-3">
                                    <span class="input-group-text">€</span>
                                    <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" value="{{old('price') ?? $plate->price}}" required autocomplete="price" aria-label="Amount (to the nearest dollar)">
                                </div>

                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <img src="{{ asset('storage/' . $plate->image) }}" class="img-fluid mb-2" alt="@" style="width: 300px; height: 300px; object-fit: cover">
                                <label for="image">Choose a New Image</label>
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required accept=".jpg, .bpm, .png, .svg" autocomplete="image" autofocus>
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="visible" class="col-md-4 col-form-label text-md-right">{{ __('Visible') }}</label>

                            <div class="col-md-6">
                                <input id="visible" type="checkbox" class="form-check-input" value='{{true}}' {{ $plate->visible ? 'checked' : '' }} name="visible">
                            </div>
                        </div>

                        
                            <div class="d-flex gap-2 justify-content-center">
                                <a class="btn btn-secondary text-decoration-none " href="{{route('plates.show', $plate->id)}}">Back</a>
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection