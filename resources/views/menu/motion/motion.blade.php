@extends('master')
<!--Motion -->
@section('title', 'motion control')
@section('content')
    <div class="container justify-content-center align-items-center Height100" style="padding: 0%; z-index: 98;">
        <div class="row justify-content-center align-items-center Height100 P-mtop" style="padding: 3% 0 0 0">
            <nav id="barra_navegacion" class="navbar col-lg-11 offset-1 Height4 Filter" style="padding: 0%;">
                <div class="row justify-content-center align-items-center Height100" style="padding:0; width: 100%;">
                    @foreach ($clasificaciones1 as $capa1)

                        <div class="col-lg-2 justify-content-center align-items-center Height100" style="padding:0;">
                            <div class="row justify-content-center align-items-center Height100" style="padding:0;">

                                <p class="Marca_submenu"> {{ $capa1->name }} &nbsp;&nbsp; <i class="fas fa-caret-right"></i> </p>

                            </div>
                        </div>

                        <div class="dropdown col-lg-2 justify-content-center align-items-center Height100" style="padding:0">
                            <div class="row  align-items-center Height100" style="padding:0">

                                <p class="Marca_submenu" style="text-transform: capitalize !important;">  &nbsp;&nbsp;  </p>

                            </div>
                        </div>

                        <div id="categorias_bold" class="Categorias_submenu col-lg-8 justify-content-center align-items-center Height100" style="padding:0">
                            <div class="row justify-content-left align-items-left align-items-center Height100" style="padding:0">
                                <ul class="nav nav-pills">


                                </ul>
                            </div>
                        </div>

                    @endforeach


                </div>
            </nav>

            @foreach ($clasificaciones1 as $productos)
                <section id="" data-index="" class="camaras_body" style="margin-top: 1%; padding: 3% 5% 4% 5%; z-index: 98;">
                    <div class="row justify-content-center align-items-center Height40">

                        @foreach ($kits as $product)

                            <a href="{{ route('producto', "$product->slug" )}}">
                                <div class="col-lg-2 col-4 justify-content-center align-items-center Height100" style="padding: 0%; margin-right: 5px;">

                                    <div class="card">

                                        <div class="face face1">

                                            <div class="content" style="text-align: center; width: 100%;">

                                                <img class="vidd_2" src="{{ strip_tags($product->file) }}" />

                                                <div class="t_v justify-content-center align-items-center" style="text-align: center;">
                                                    <h4 class="C_N" style="color: #fff !important;">{{ strip_tags($product->name) }}</h4>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="face face2 justify-content-center align-items-center" style="text-align: center;">

                                            <div class="content justify-content-center align-items-center" style="width: 100%">
                                                <div class="BTN_CAM BTN_Show">
                                                    <a href="{{ route('producto', "$product->slug" )}}"></a>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </a>

                        @endforeach

                    </div>
                </section>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')

    <script src="{{ asset('js/lodash.js') }}"></script>
    <script src="{{ asset('js/servicio_mov.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#intro").addClass("backgroud_1");
        });
    </script>


@endsection
