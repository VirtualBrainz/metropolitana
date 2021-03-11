<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>

		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" type="image/png" href="/media/iconos/logo.png" />
        <title>{{ config('app.name', 'EFD') }} @yield('title')</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="https://vjs.zencdn.net/7.3.0/video-js.css"/>
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/efd_style.css?v='.time()) }}">
        <link rel="stylesheet" href="{{ asset('/css/bootstrap-datepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/bootstrap-dropdownhover.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/intlTelInput.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/efd.css?v='.time()) }}">
        <link rel="stylesheet" href="{{ url('/css/style.css?v='.time()) }}">
        <link rel="stylesheet" href="{{ asset('/css/chat_stilo.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/intlTelInput.css') }}">

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/b0d8aefb17.js" crossorigin="anonymous"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('js/utils.js') }}"></script>

        <script>
            $(document).ready(function(){

                window.addEventListener('load',function(){
                    document.getElementById("texto").addEventListener("keyup", () => {
                        if((document.getElementById("texto").value.length)>1)
                            fetch(`/nombres/buscador?texto=${document.getElementById("texto").value}`,{ method:'get' })
                            .then(response  =>  response.text() )
                            .then(html      =>  {   document.getElementById("Buscador").innerHTML = html  })
                        else
                            document.getElementById("Buscador").innerHTML = ""
                    })
                });

            });

        </script>
    </head>

    <body data-spy="scroll" data-target="#barra_navegacion" disabled>

        @include('efd.principal.navbar')
        @include('efd.principal.sidebar_l')
        @include('efd.principal.sidebar_r')
        @include('efd.principal.chat')

        @include('efd.principal.mobil.navbar')

        <div id="G_randon" class="random ran_none"><div id="random"></div></div>

        <div id="modal-final-quote" class="col-12 justify-content-center align-items-center" style="width: 0; height: 0; z-index: 0; display: none;">
            <div class="row justify-content-center align-items-center Height100" style="padding: 10%">
                <div class="col-12 justify-content-center align-items-center Height100" style="background-color:#fff; border-radius: 25px;">

                    <div class="row justify-content-center align-items-center Height70">
                        <h2 style="font-size: 30px; text-align:center; font-weight:bold; ">Tu solicitud ha sido enviada</h2>
                        <h3 style="font-size: 25px; text-align:center; width: 100%;">Uno de nuestros ejecutivos se pondrá en contacto contigo</h3>
                        <h3 style="font-size: 25px;">¡Gracias por tu preferencia!</h3>
                    </div>

                    <div class="row justify-content-center align-items-center Height30">
                        <a class="btn btn-primary" style="background-color: #707791; border-color: #707791;" href="{{ url('/finalizar-cotizacion') }}" onclick="modal_finish_off()">
                            Finalizar
                        </a>
                    </div>

                </div>

            </div>
        </div>

        <div id="Page_01" class="row justify-content-center align-items-center Height95" style="padding: 0%;  margin: 0% ;">

            <div id="Pags" class="col-lg-11 offset-lg-1 col-sm-12 justify-content-center align-items-center Height100" style="padding: 0%; z-index: 98; background-color: #ffffff;">

                <div id="Buscador" class="row justify-content-center align-items-center" style="height: auto;"></div>
                @include('efd.principal.mobil.sidebar')
                @yield('content')

            </div>

        </div>

        <!--Pie de pagina-->
        @include('efd.principal.footer')

        <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script src="{{ asset('js/bootstrap-dropdownhover.js') }}"></script>
        <script src="{{ asset('js/Mov-Scroll.js') }}"></script>
        <script src="{{ asset('js/gif.js') }}"></script>
        <script src="{{ asset('js/chat.js') }}"></script>
        <script src="{{ asset('js/funcion_chat.js') }}"></script>
        <script src="{{ asset('js/bold.js') }}"></script>
        <script src="{{ asset('js/itemslist.js') }}"></script>
        <script src="{{ asset('js/bootstrap-input-spinner.js') }}"></script>
        <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('js/slick.min.js') }}"></script>

        <script>
            (function() {
                $(document).ready(function() {

                    $('.poste-wrappere').slick({
                        slidesToShow: 8,
                        slidesToScroll: 1,
                        autoplay: false,
                    });

                });
            })();
        </script>

        <script>
            $(document).ready(function(){

                var altura = $('.menu0').offset().top;

                $(window).on('scroll', function(){
                    if($(window).scrollTop() > altura){
                        $('.menu').addClass('menu-fixed');
                    } else {
                        $('.menu').removeClass('menu-fixed');
                    }
                });

                $('.Drop_submenu').click(function(e){
                    e.preventDefault();
                        $(this).children('ul').slideToggle();

                });
                $('.Drop_submenu ul').click(function(p){
                    p.stopPropagation();

                });
            });

        </script>

        <script>
            $(function(){
                $(".icon-1").click(function(){
                    $(".input").toggleClass("active");
                    $(".contain").toggleClass("active");
                })
            });
        </script>

        <script >
            $("input[type='number']").inputSpinner()
        </script>

        @yield('scripts')

    </body>
</html>

