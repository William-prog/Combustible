@extends('layouts.app')

<link href="{{ asset('/css/login.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">


@section('content')
    <div class="container text-white text-center" style="background-color: rgba(0, 0, 0, 0.7); font-size: 18px;">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card custom-card">
                    <div class="card-header text-dark">{{ __('Iniciar sesión') }}&nbsp;&nbsp;<i class="fas fa-users" style="color: #ff7300;"></i></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3 row align-items-center">
                                <label for="email"
                                    class="col-sm-12 col-md-2 col-form-label custom-label text-dark">{{ __('Correo') }}&nbsp;&nbsp;&nbsp;<i
                                        class="fas fa-envelope"></i></label>
                                <div class="col-sm-12 col-md-8">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="mb-3 row align-items-center">
                                <label for="password" class="col-sm-12 col-md-2 col-form-label custom-label text-dark">
                                    {{ __('Contraseña') }}&nbsp;&nbsp;<i class="fas fa-lock"></i>
                                </label>
                                <div class="col-sm-12 col-md-8">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label text-dark" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <button id="customButton" type="submit" class="custom-btn btn-7 orange-btn">
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


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#customButton").mousemove(function(e) {
                var offset = $(this).offset();
                var xPos = e.pageX - offset.left;
                var yPos = e.pageY - offset.top;

                $(this).find("before").css({
                    "transform-origin": xPos + "px " + yPos + "px"
                });
            });
        });
    </script>
@endsection
