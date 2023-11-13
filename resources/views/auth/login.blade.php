@extends('layouts.app')

<link href="{{ asset('/css/login.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

@section('content')

<div class="container text-white text-center" style="background-color: rgba(0, 0, 0, 0.7); font-size: 18px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card custom-card">
                <div class="card-header text-dark">{{ __('Login') }}</div>
            
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
            
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-12 col-md-4 col-form-label text-start text-md-end text-dark">{{ __('Correo') }}</label>
                            <div class="col-sm-12 col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label for="password" class="col-sm-12 col-md-4 col-form-label text-start text-md-end text-dark">{{ __('Contraseña') }}</label>
                            <div class="col-sm-12 col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
            
                        <div class="mb-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label text-dark" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <button type="submit" class="custom-btn btn-7">
                                {{ __('Login') }}
                            </button>
            
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>            
        </div>
    </div>
</div>

@endsection