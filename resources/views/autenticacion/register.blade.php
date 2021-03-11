@extends('master')

@section('title', 'register')

@section('content')
<div class="container">
    <div id="register" class="login-container js-navDots">
        <div class="col-md-12 justify-content-center align-items-center Height100" style="padding: 0%">
            <div class="row justify-content-center" style=" height: 100% !important;">

                <div id="mandala__1" class="col-lg-6 justify-content-center align-items-center Height100" style="padding: 0%; background: white;">
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

                                    <h1 class="Title_Login" style="margin-top:0 !important;">¡Bienvenido!</h1>
                                    <p style="color: white; margin-bottom: 5px;">Concectarse a través de Redes Sociales</p>
                                    <div class="login-redes row justify-content-center align-items-center" style="margin-bottom: 5px; height: 25px; text-align: center; color: white;">
                                        <div class="col-md-12 justify-content-center align-items-center Height100" style="padding: 0%; margin-top:6px;">
                                            <div class="imd" style="margin-left: 5px; "><a style="color:#fff;" href="/login/facebook"><i class="fab fa-facebook-f C"></i></a></div>
                                            <div class="imd" style="margin-left: 30px; "><a style="color:#fff;" href="#"><i class="fab fa-twitter C"></i></div>
                                            <div class="imd" style="margin-left: 30px; "><a style="color:#fff;" href="/login/google"><i class="fab fa-google-plus-g C"></i></a></div>
                                        </div>
                                    </div>
                                    <div id="registro" class="inside">

                                        {!! Form::open(['route' => 'register']) !!}

                                            <div class=" form-group row">
                                                <div class="col-md-6 ml">
                                                    <p style="color: white;">Nombre:</p>
                                                    <input id="name" type="text" class="form-control"  name="name" value="" required autocomplete="name" autofocus>

                                                </div>
                                            </div>
                                            <div class=" form-group row">
                                                <div class="col-md-6 ml">
                                                    <p style="color: white;">Apellidos:</p>
                                                    <input id="lastname" type="text" class="form-control" name="lastname" value="" required autocomplete="lastname" autofocus>

                                                </div>
                                            </div>
                                            <div class=" form-group row">
                                                <div class="col-md-6 ml">
                                                    <p style="color: white;">Correo electrónico:</p>
                                                    <input id="email" type="email" class="form-control " name="email" value="" required autocomplete="email" autofocus>

                                                </div>
                                            </div>
                                            <div class="form-group row">

                                                <div class="col-md-6 ml">
                                                    <p style="color: white;">Contraseña</p>
                                                    <input id="password" type="password" class="form-control " name="password" value="" required >

                                                </div>
                                            </div>

                                            <div class="form-group row">

                                                <div class="col-md-6 ml">
                                                    <p style="color: white;">Confirmar contraseña:</p>
                                                    <input id="cpassword" type="password" class="form-control" name="cpassword" value="" required >

                                                </div>
                                            </div>

                                            {!! Form::submit('Registrarse', ['class' => 'btn btn-style mt16']) !!}

                                        {!! Form::close() !!}

                                        @if (Session::has('message'))
                                            <div class="container">
                                                <div class="alert alert-{{ Session::get('typealert') }}" style="display: none;">
                                                    {{ Session::get('message') }}
                                                    @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                    <script>
                                                        $('.alert').slideDown();
                                                        setTimeout(function() {
                                                            $('.alert').slideUp();
                                                        }, 3000);
                                                    </script>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="footer mt16">
                                            <a href="{{ url('/login') }}" style="color: #fff;">Ya tengo una cuenta, ingresar.</a>
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
</div>
@stop
@section('scripts')
    <script>
        $(document).ready(function(){

            $("#intro").addClass("backgroud_1");
        });

    </script>

    <script>
        window.fbAsyncInit = function() {
        FB.init({
            appId      : '{your-app-id}',
            cookie     : true,
            xfbml      : true,
            version    : '{api-version}'
        });

        FB.AppEvents.logPageView();

        };

        (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
@endsection
