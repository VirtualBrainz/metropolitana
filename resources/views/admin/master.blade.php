<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="routeName" content="{{ Route::currentRouteName() }}">
        <link rel="icon" type="image/png" href="/media/imagenes/logo.png" />
        <title>EFD @yield('title')</title>

        <!--CSS-->

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
        <link rel="stylesheet" href="{{ url('/css/admin.css?v='.time()) }}">

    </head>
    <body>

       <div class="wrapper">

            <div class="col1">@include('admin.sidebar')</div>

            <div class="col2">

                <!--Navbar-->
                    <nav class="navbar navbar-expand-lg shadow">
                        <div class="collapse navbar-collapse">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="{{ url('/admin') }}" class="nav-link color_link">
                                        <i class="fas fa-home"></i>
                                        Dashboard
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>

                <!--Subnavbar-->
                    <div class="page">
                        <div class="container-fluid">
                            <nav aria-label="breadcrumb shadow">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ url('/admin') }}">
                                            <i class="fas fa-home"></i>
                                            Dashboard
                                        </a>
                                    </li>
                                    @section('breadcrumb')
                                    @show
                                </ol>
                            </nav>
                        </div>
                    </div>

                <!--Alert errors-->
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
                            </div>
                        </div>
                    @endif

                <!--Content Page-->
                    @section('content')
                        hola mundo
                    @show


            </div>

       </div>

        <!--Script-->
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://kit.fontawesome.com/b0d8aefb17.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('js/utils.js') }}"></script>

        <script>
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();
            })
        </script>
       <script>
            $('.alert').slideDown();
            setTimeout(function() {
                $('.alert').slideUp();
            }, 3000);
        </script>
        <script src="{{ asset('js/admin.js') }}"></script>
        <script src="{{ asset('js/imgnews.js') }}"></script>
        @yield('scripts')

        <script>
            window.addEventListener('load',function(){
                    document.getElementById("productos").addEventListener("keyup", () => {
                        if((document.getElementById("productos").value.length)>1)
                            fetch(`/family/buscador/producto?texto=${document.getElementById("productos").value}`,{ method:'get' })
                            .then(response  =>  response.text() )
                            .then(html      =>  {   document.getElementById("buscador_producto").innerHTML = html  })
                        else
                            document.getElementById("buscador_producto").innerHTML = ""
                    })
                });
        </script>

        <script>
        window.addEventListener('load',function(){
                document.getElementById("kits").addEventListener("keyup", () => {
                    if((document.getElementById("kits").value.length)>1)
                        fetch(`/family/buscador/kits?texto=${document.getElementById("kits").value}`,{ method:'get' })
                        .then(response  =>  response.text() )
                        .then(html      =>  {   document.getElementById("buscador_kit").innerHTML = html  })
                    else
                        document.getElementById("buscador_kit").innerHTML = ""
                })
            });
        </script>

        <script>
            window.addEventListener('load',function(){
                    document.getElementById("productoproducto").addEventListener("keyup", () => {
                        if((document.getElementById("productoproducto").value.length)>1)
                            fetch(`/producto/buscador/producto?texto=${document.getElementById("productoproducto").value}`,{ method:'get' })
                            .then(response  =>  response.text() )
                            .then(html      =>  {   document.getElementById("buscador_productoproducto").innerHTML = html  })
                        else
                            document.getElementById("buscador_productoproducto").innerHTML = ""
                    })
                });
        </script>

        


        
    </body>
</html>
