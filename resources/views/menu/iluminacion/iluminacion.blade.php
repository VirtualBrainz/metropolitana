@extends('master')
@section('title', 'iluminación')
<!--Iluminacion -->
@section('content')
    @foreach($subclasificaciones1 as $subclassication)
        @if     ($subclassication->slug == "textiles" )
            <div  class="container justify-content-center align-items-center Height100" style="padding: 0%; z-index: 98;">
                <div class="row justify-content-center align-items-center Height100 P-mtop" style="padding:6% 0 0 0;">

                    @include('efd.principal.subnavbar')


                    <section class="col-lg-12  justify-content-center align-items-center Height60 textil" style="padding: 0;">
                        <div class="row justify-content-center align-items-center Height20">
                            <h4 style="margin:0%;">Textiles</h4>
                        </div>
                    </section>

                    <section class="col-lg-12  justify-content-center align-items-center Height100 menu0" style="padding: 2% 4% 0 6%;">

                        <div class="row justify-content-center align-items-center Height100">

                            @foreach ($subclasificaciones1 as $subclasificacion)
                                @foreach ($subareas as $subarea)

                                    <div class="col-lg-4  col-12 justify-content-center align-items-center Height100" style="padding: 0 3% 0 0px">

                                        <div class="row justify-content-center align-items-center Height100" style="padding: 0;">
                                            <form method="post" action="{{ route('cart-add-form') }}" style="    width: 100%;  top: 0; position: absolute;">
                                                {{ csrf_field() }}
                                            <div class="col-lg-12 justify-content-center align-items-center menu menu__" style="text-align: center;">
                                                <div class="row justify-content-center align-items-center Height100" style="background: #f2f2f2;     border-radius: 3px 3px 0 0;">
                                                    <div class="col-6 justify-content-center align-items-center Height100 " style="text-align: center;     padding: 0 3px;">
                                                        <div class="row justify-content-center align-items-center Height100">
                                                            <p class="Sub_fil">{{  $subarea->name }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 justify-content-center align-items-center Height100 " style="text-align: center; padding: 0px 4px 0 4px;">
                                                        <div class=" row justify-content-center align-items-center Height100"    onclick="ani()">
                                                            <input type="submit" value="submit" id="checkBtn" class="BTN_Add BTN_new" href="{{ url('/cart/add-form/'.$product->getProducts->sku) }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 justify-content-center align-items-center Height85">
                                                <div class="row justify-content-center align-items-center Height100">

                                                    <div class="contendor-menu-filtros">

                                                        <ul class="menu-filtros">

                                                            @foreach ($familias as $familia)

                                                                @if ($familia->subarea_id == $subarea->id )

                                                                    <li class="Drop_submenu"><a href="#">{{  $familia->name }}<i class="icono derecha fas fa-chevron-down"></i></a>

                                                                        <ul style="max-height: 250px; overflow: auto;">

                                                                            <div  class="row justify-content-center align-items-center Height100"  >
                                                                                <div class="col-8 justify-content-center align-items-center Height100" style="padding:0% ;">
                                                                                    <p></p>
                                                                                </div>
                                                                                <div class="col-2  Height100 Ind_tab" >
                                                                                    <p style="text-align: rigth !important; margin: 0;">Ud.</p>
                                                                                </div>
                                                                                <div class="col-2 justify-content-center align-items-center Height100 Ind_tab">
                                                                                    <p style="margin: 0;">Días</p>
                                                                                </div>
                                                                            </div>

                                                                            @foreach ($productos as $product)

                                                                                @if ($product->family_id == $familia->id )

                                                                                    <div class="col-12 justify-content-center align-items-center Height20 in_filtros" style="padding: 0;">

                                                                                        <div class="row justify-content-center align-items-center Height100">
                                                                                            <div class="col-8 justify-content-center align-items-center Height100 fil-f">
                                                                                                <div class="row justify-content-center align-items-center Height100">
                                                                                                    <label for="">

                                                                                                        <input style="vertical-align: middle;" id="{{ $product->sku }} " name="extra[]" type="checkbox" value="{{ $product->sku }} " />
                                                                                                        {{$product->name}}

                                                                                                    </label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-2 justify-content-center align-items-center" style="    padding:0; height: 17px;">
                                                                                                <div class="row justify-content-center align-items-center Height100">
                                                                                                    <input name="day_{{ $product->sku  }}"  type="number" value="1" min="1" max="1000" step="1" class="numb" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-2 justify-content-center align-items-center" style="    padding: 0; height: 17px;">
                                                                                                <div class="row justify-content-center align-items-center Height100">
                                                                                                    <input name="quantity_{{ $product->sku  }}"  type="number" value="1" min="1" max="1000" step="1" class="numb" />
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>

                                                                                @endif

                                                                            @endforeach

                                                                        </ul>

                                                                    </li>


                                                                @endif

                                                            @endforeach

                                                        </ul>

                                                    </div>

                                                </div>

                                            </div>
                                            </form>

                                        </div>

                                    </div>

                                @endforeach
                            @endforeach


                        </div>

                    </section>

                </div>

            </div>
        @elseif ($subclassication->slug == "tramoya" )
            <div class="container justify-content-center align-items-center Height100" style="padding: 0%; z-index: 98;">
                <div class="row justify-content-center align-items-center Height100 P-mtop" style="padding: 3% 0 0 0">

                    @include('efd.principal.subnavbar')
                    @foreach ($subclasificaciones1 as $subclasificacion)
                        @foreach ($subareas as $subarea)

                            <section id="{{  $subarea->name }}" data-index="{{  $subarea->name }}" class="{{  $subarea->name }} camaras_body" style="margin-top: 1%; padding: 3% 5% 4% 5%; z-index: 98;">



                                <div class="row justify-content-center align-items-center Height40">

                                    @foreach ($kits as $product)

                                        @if ($product->subarea_id == $subarea->id )

                                            <a href="{{ route('product', "$product->slug" )}}">

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

                        @endforeach
                    @endforeach

                </div>
            </div>
        @elseif ($subclassication->slug == "electrico")
            <div class="container justify-content-center align-items-center Height100" style="padding: 0%; z-index: 98;">
                <div class="row justify-content-center align-items-center Height100 P-mtop" style="padding: 3% 0 0 0">

                    <nav id="barra_navegacion" class="navbar col-lg-11 offset-1 Height4 Filter" style="padding: 0%;" >
                        <div class="row justify-content-center align-items-center Height100" style="padding:0; width: 100%;">

                            @foreach ($subclasificaciones1 as $capa2)
                                @foreach ($clasificaciones as $clasificacion)
                                    @if ($clasificacion->id == $capa2->classification_id )

                                        <div class=" col-lg-2 col-6 justify-content-center align-items-center Height100" style="padding:0;">
                                            <div class="row justify-content-center align-items-center Height100" style="padding:0;">

                                                <p class="Marca_submenu"> {{ $clasificacion->name }}  &nbsp;&nbsp; <i class="fas fa-caret-right"></i></p>

                                            </div>
                                        </div>

                                        <div class="dropdown col-lg-2 col-6 justify-content-center align-items-center Height100" style="padding:0">
                                            <div class="row  align-items-center Height100" style="padding:0">

                                                <p class="Marca_submenu" style="text-transform: capitalize !important;"> {{  $capa2->name }} &nbsp;&nbsp; <i class="fas fa-caret-down"></i></p>


                                                <ul class="dropdown-menu_3"  style=" text-decoration:none;">
                                                    @foreach ($subclasificaciones as $drop)

                                                        @foreach ($clasificaciones as $clasi)

                                                            @if ($drop->classification_id == $capa2->classification_id )

                                                                @if ($capa2->classification_id == $clasi->id )

                                                                    <a href="/{{ $clasi->slug }}/{{  $drop->slug }}" class="dropdown-item" style="font-size: 0.6rem; text-decoration:none;">{{  $drop->name }}</a>

                                                                @endif

                                                            @endif

                                                        @endforeach

                                                    @endforeach
                                                </ul>


                                            </div>
                                        </div>

                                        <div id="categorias_bold" class="Categorias_submenu col-lg-8 justify-content-center align-items-center Height100" style="padding:0">
                                            <div class="row justify-content-left align-items-left align-items-center Height100" style="padding:0">
                                                <ul class="nav nav-pills">

                                                    @foreach ($subareas as $capa3)
                                                            <li class="nav-item" style="margin-bottom: 5px;">   <a  id="__{{  $capa3->name }}" data-page="{{  $capa3->name }}" class="_{{  $capa3->name }} sub_menu_cat nav-link" href="#{{  $capa3->name }}" >&nbsp;  &nbsp;  &nbsp;</a></li>

                                                    @endforeach

                                                </ul>
                                            </div>
                                        </div>

                                    @endif
                                @endforeach
                            @endforeach
                        </div>

                    </nav>
                    @foreach ($subclasificaciones1 as $subclasificacion)
                       
                            <section id="{{  $subarea->name }}" data-index="{{  $subarea->name }}" class="{{  $subarea->name }} camaras_body" style="margin-top: 1%; padding: 3% 5% 4% 5%; z-index: 98;">

                                <div class="row justify-content-center align-items-center Height40">

                                    @foreach ($kits as $product)

                                       
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

                                       

                                    @endforeach

                                </div>

                            </section>

                       
                    @endforeach

                </div>
            </div>
        @else
            @foreach ($subclasificaciones1 as $productos)
                <div class="container justify-content-center align-items-center Height100" style="padding: 0%; z-index: 98;">
                    <div class="row justify-content-center align-items-center Height100 P-mtop" style="padding: 3% 0 0 0">
                        @include('efd.principal.subnavbar')
                        <section id="" data-index="" class="camaras_body" style="margin-top: 1%; padding: 3% 5% 4% 5%; z-index: 98;">
                            <div class="row justify-content-center align-items-center Height40">

                                @foreach ($kits as $product)

                                    <a href="{{ route('product', "$product->slug" )}}">
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

                                @endforeach

                            </div>
                        </section>
                    </div>
                </div>
            @endforeach
        @endif
    @endforeach
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
