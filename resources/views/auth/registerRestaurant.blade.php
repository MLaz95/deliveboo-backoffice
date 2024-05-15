@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Register Restaurant</h1>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('registerRestaurant') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4 row">
                            <label for="name_res" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name_res" type="text" class="form-control @error('name_res') is-invalid @enderror" name="name_res" value="{{ old('name_res') }}" required maxlength="100" autocomplete="name_res" autofocus>

                                @error('name_res')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="address_res" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address_res" type="text" class="form-control @error('address_res') is-invalid @enderror" name="address_res" value="{{ old('address_res') }}" required maxlength="100" autocomplete="address_res" autofocus>

                                @error('address_res')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="img_res" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="img_res" type="file" class="form-control @error('img_res') is-invalid @enderror" name="img_res" value="{{ old('img_res') }}" required accept=".jpg, .bpm, .png, .svg" autocomplete="img_res" autofocus>

                                @error('img_res')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="img_res" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                <div class="d-flex gap-3 flex-wrap ">
                                    @foreach($categories as $category)
                                    <div class="form-check">
                                        <input 
                                            type="checkbox" 
                                            name="categories[]" 
                                            value="{{$category->id}}" 
                                            class="form-check-input" 
                                            id="category-{{$category->id}}"
                                            {{in_array($category->id, old('categories', [])) ? 'checked' : ''}}
                                        >
                                        <label 
                                            class="form-check-label" 
                                            for="category-{{$category->id}}"
                                        >{{$category->name}}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection