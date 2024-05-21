@extends('layouts.app')

@section('content')
<div class="register-box container pb-5 ">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Register</h1>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="rov d-flex ">
                            <div class="col-5">
                                <div class="mb-4 row">
                                    <h3 class="mb-4">User data</h3>
                                    
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name *</label>
        
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="mb-4 row">
                                    <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname *') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>
        
                                        @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="mb-4 row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address *') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="mb-4 row">
                                    <label for="vat_number" class="col-md-4 col-form-label text-md-right">{{ __('P.IVA *') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="vat_number" type="numerable" class="form-control @error('vat_number') is-invalid @enderror" name="vat_number" value="{{ old('vat_number') }}" required autocomplete="vat_number" autofocus minlength="11" maxlength="11">
        
                                        @error('vat_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="mb-4 row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password *') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="mb-4 row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password *') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="my-3 fw-bold  ">
                                    * Required field
                                </div>

                                
                            </div>
                            <div class="col-2 d-flex flex-column justify-content-end align-items-center ">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                            <div class="col-5">
                                <h3 class="mb-4">Restaurant data</h3>
                            
    
                                <div class="mb-4 row">
                                    <label for="name_res" class="col-md-4 col-form-label text-md-right">{{ __('Restaurant Name *') }}</label>
        
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
                                    <label for="address_res" class="col-md-4 col-form-label text-md-right">{{ __('Address *') }}</label>
        
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
                                    <label for="img_res" class="col-md-4 col-form-label text-md-right">{{ __('Image *') }}</label>
        
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
                                    <label for="img_res" class="col-md-4 col-form-label text-md-right">{{ __('Category *') }}</label>
        
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
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div> 
                            </div>

                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
