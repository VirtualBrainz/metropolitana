@extends('master')

@section('title', 'Login')

@section('content')
<div class="container L-m">
    <div id="login" class="login-container js-navDots" >
        <div class="col-md-12 justify-content-center align-items-center Height100" style="padding: 0%">
            <div class="row justify-content-center" style=" height: 100% !important;">

                <div id="mandala__1" class="col-lg-6 justify-content-center align-items-center Height100" style="padding: 0%">
                    <div class="row justify-content-center align-items-center Height100" >
                        <div class="" style="height: 100%; width: 100%; z-index: 97;" >
                            <img class="log-mandala" src="{{ asset('media/imagenes/mandala.png') }}">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-12 justify-content-center align-items-center Height100" style="padding: 0%">
                    <div class="row justify-content-center align-items-center Height100" >

                        <div id="login-2" class="col-lg-12  col-sm-12  justify-content-center align-items-center Height100 logi" >
                            <div class="row justify-content-center align-items-center Height100">
                                    <div class="card-body justify-content-center align-items-center Height100" style="width: 100%;">

                                            <h1 class="Title_Login">¡Bienvenido!</h1>
                                            <p style="color: white;">Concectarse a través de Redes Sociales</p>

                                            <form method="POST" action="{{ route('login') }}" style=" " class="Acceso">
                                                @csrf

                                                <div class="login-redes row justify-content-center align-items-center" style="height: 50px; text-align: center; color: white;">
                                                    <div class="col-md-12 justify-content-center align-items-center Height100" style="padding: 0%; margin-top:6px;">
                                                        <div class="imd" style="margin-left: 30px; "><a style="color:#fff;" href="/login/facebook"><i class="fab fa-facebook-f C"></i></a></div>
                                                        <div class="imd" style="margin-left: 30px; "><a style="color:#fff;" href="#"><i class="fab fa-twitter C"></i></div>
                                                        <div class="imd" style="margin-left: 30px; "><a style="color:#fff;" href="/login/google"><i class="fab fa-google-plus-g C"></i></a></div>
                                                    </div>
                                                </div>

                                                <div class=" form-group row">
                                                    <div class="col-md-6 ml">
                                                        <p style="color: white;">Usuario</p>
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" required autocomplete="email" autofocus>
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">

                                                    <div class="col-md-6 ml">
                                                        <p style="color: white;">Contraseña</p>
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" required autocomplete="current-password">
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!--<div class="form-group row">
                                                    <div class="col-md-6 offset-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                            <label class="form-check-label" for="remember">
                                                                {{ __('Remember Me') }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>asdasd-->

                                                <div class="form-group row mb-0" style="margin-top: 30px;">
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-style">
                                                            {{ __('Iniciar sesión') }}
                                                        </button>


                                                    </div>
                                                    <div class="col-md-12">

                                                            <a class="btn btn-link" href="{{ url('/recover') }}" style="color: white;">
                                                                {{ __('No recuerdas tu contraseña?') }}
                                                            </a>

                                                    </div>
                                                </div>

                                            </form>
                                            <div class="col-md-12">
                                                <p style="color: #707791;">¿No tienes cuenta? <a href="{{ route('register') }}" style="color: white;">Crear cuenta aquí</a></p>
                                            </div>
                                        </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')
    <script>
        $(document).ready(function(){

            $("#intro").addClass("backgroud_1");
        });

    </script>


@endsection
