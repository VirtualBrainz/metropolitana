@extends('master')
<!--Movil ojl -->
@section('title', 'móviles y plantas')
@section('content')
    <div id="MyP" class="container justify-content-center align-items-center Height100" style="padding: 0%; z-index: 98;">
        <div class="row justify-content-center align-items-center Height100 P-mtop" style="padding: 3% 0 0 0">

            @foreach ($subclasificaciones1 as $subclasificacion)

                @if ($subclasificacion->slug == "plantas" )

                    <nav id="barra_navegacion" class="navbar col-lg-11 offset-1 Height4 Filter" style="padding: 0%;">
                        <div class="row justify-content-center align-items-center Height100" style="padding:0; width: 100%;">

                            @foreach ($subclasificaciones1 as $capa2)

                            <div class="col-lg-2 col-6 justify-content-center align-items-center Height100" style="padding:0;">
                                <div class="row justify-content-center align-items-center Height100" style="padding:0;">
                                    @foreach ($clasificaciones as $clasificacion)

                                    @if ($clasificacion->id == $capa2->classification_id )
                                        <p class="Marca_submenu"> {{ $clasificacion->name }} &nbsp;&nbsp;<i class="fas fa-caret-right"></i></p>
                                    @endif

                                    @endforeach
                                </div>
                            </div>

                            <div class="dropdown col-lg-2 col-6 justify-content-center align-items-center Height100" style="padding:0">
                                <div class="row  align-items-center Height100" style="padding:0">

                                    <p class="Marca_submenu" style="text-transform: capitalize !important;"> {{ $capa2->name }} &nbsp;&nbsp;<i class="fas fa-caret-down"></i></p>


                                    <ul class="dropdown-menu_3" style=" text-decoration:none;">
                                        @foreach ($subclasificaciones as $drop)

                                            @foreach ($clasificaciones as $clasi)

                                                @if ($drop->classification_id == $capa2->classification_id )

                                                    @if ($capa2->classification_id == $clasi->id )

                                                        <a href="/{{ $clasi->slug }}/{{  $drop->slug }}" class="dropdown-item" style="font-size: 0.6rem; text-decoration:none;">{{ $drop->name }}</a>

                                                    @endif

                                                @endif

                                            @endforeach

                                        @endforeach
                                    </ul>


                                </div>
                            </div>

                            <div id="categorias_bold" class="Categorias_submenu col-lg-8 justify-content-center align-items-center Height100" style="padding:0">
                                <div class="row justify-content-left align-items-left align-items-center Height100" style="padding:0">

                                </div>
                            </div>
                            @endforeach
                        </div>
                    </nav>

                    <section id="{{  $subclasificacion->name }}" data-index="{{  $subclasificacion->name }}" class="{{  $subclasificacion->name }} camaras_body" style="margin-top: 1%; padding: 3% 5% 4% 5%; z-index: 98;">

                        <div class="row justify-content-center align-items-center Height40">

                            @foreach ($families as $product)

                                @if ($product->subclassification_id == $subclasificacion->id )

                                    <a href="{{ route('product', "$product->slug" )}}">
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
                                                            <a href="{{ route('product', "$product->slug" )}}"></a>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </a>

                                @endif


                            @endforeach

                        </div>

                    </section>

                @else

                    <nav id="barra_navegacion" class="navbar col-lg-11 offset-1 Height4 Filter" style="padding: 0%;">
                        <div class="row justify-content-center align-items-center Height100" style="padding:0; width: 100%;">

                            @foreach ($subclasificaciones1 as $capa2)

                            <div class="col-lg-2 col-6 justify-content-center align-items-center Height100" style="padding:0;">
                                <div class="row justify-content-center align-items-center Height100" style="padding:0;">
                                    @foreach ($clasificaciones as $clasificacion)

                                    @if ($clasificacion->id == $capa2->classification_id )
                                        <p class="Marca_submenu"> {{ $clasificacion->name }} &nbsp;&nbsp;<i class="fas fa-caret-right"></i></p>
                                    @endif

                                    @endforeach
                                </div>
                            </div>

                            <div class="dropdown col-lg-2 col-6 justify-content-center align-items-center Height100" style="padding:0">
                                <div class="row  align-items-center Height100" style="padding:0">

                                    <p class="Marca_submenu" style="text-transform: capitalize !important;"> {{ $capa2->name }} &nbsp;&nbsp;<i class="fas fa-caret-down"></i></p>


                                    <ul class="dropdown-menu_3" style=" text-decoration:none;">
                                        @foreach ($subclasificaciones as $drop)

                                            @foreach ($clasificaciones as $clasi)

                                                @if ($drop->classification_id == $capa2->classification_id )

                                                    @if ($capa2->classification_id == $clasi->id )

                                                        <a href="/{{ $clasi->slug }}/{{  $drop->slug }}" class="dropdown-item" style="font-size: 0.6rem; text-decoration:none;">{{ $drop->name }}</a>

                                                    @endif

                                                @endif

                                            @endforeach

                                        @endforeach
                                    </ul>


                                </div>
                            </div>

                            <div id="categorias_bold" class="Categorias_submenu col-lg-8 justify-content-center align-items-center Height100" style="padding:0">
                                <div class="row justify-content-left align-items-left align-items-center Height100" style="padding:0">

                                </div>
                            </div>
                            @endforeach
                        </div>
                    </nav>

                    <section id="{{  $subclasificacion->name }}" data-index="{{  $subclasificacion->name }}" class="{{  $subclasificacion->name }} camaras_body" style="margin-top: 1%; padding: 3% 5% 4% 5%; z-index: 98;">


                        <div class="row  align-items-left Height20">

                        </div>


                        <div class="row justify-content-center align-items-center Height40">

                            @foreach ($kits as $product)

                                @if ($product->subclassification_id == $subclasificacion->id )

                                    <a href="{{ route('producto', "$product->slug" )}}">
                                        <div class="col-lg-2 col-4  justify-content-center align-items-center Height100" style="padding: 0%; margin-right: 5px;">

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

                                @endif

                            @endforeach

                        </div>

                    </section>

                @endif
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
