@extends('master')
@section('title', 'detalles de paquete')
@section('content')

    @if ($product->classification_id == 1 )

        <div   class="row justify-content-center align-items-center Height100 P-mtop" style="    padding-top: 6%;">
            <!--Barra de navegacion-->
            @foreach ($clasificaciones as $capa1)

                @if ($capa1->id == $product->classification_id )

                    <nav id="barra_navegacion" class="navbar col-lg-11 offset-1 Height4 Filter" style="padding: 0%;" >
                        <div class="row justify-content-center align-items-center Height100" style="padding:0; width: 100%;">

                            <div class=" col-lg-2 col-6 justify-content-center align-items-center Height100" style="padding:0;">
                                <div class="row justify-content-center align-items-center Height100" style="padding:0;">


                                    @if ($capa1->id == $product->classification_id )

                                        <p class="Marca_submenu"> {{ $capa1->name }}  &nbsp;&nbsp; <i class="fas fa-caret-right"></i></p>

                                    @endif


                                </div>
                            </div>

                            @foreach ($subclasificaciones1 as $capa2)

                                @if ($capa2->id == $product->subclassification_id )

                                    <div class="dropdown col-lg-2 col-6 justify-content-center align-items-center Height100" style="padding:0">
                                        <div class="row  align-items-center Height100" style="padding:0">

                                            <p class="Marca_submenu dropdown-toggle" style="text-transform: capitalize !important;" data-toggle="dropdown">{{  $capa2->name }}&nbsp;&nbsp; </p>
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
                                            <ul class="nav">
                                                @foreach ($subareas as $capa3)
                                                    @if ($capa3->subclassification_id == $capa2->id )

                                                        <li class="nav-item" style="margin-bottom: 5px;">
                                                            <a id="__{{  $capa3->name }}" data-page="{{  $capa3->name }}" class="_{{  $capa3->name }} sub_menu_cat nav-link" href="{{ url('camaras/'.$capa2->slug.'#'.$capa3->name) }}"  >&nbsp; {{  $capa3->name }} &nbsp; {{$capa3->classification->slug}}| &nbsp;</a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                @endif

                            @endforeach

                        </div>
                    </nav>

                @endif

            @endforeach
            <!--Parte Izquierda producto-->
                <div class="col-md-5 col-12 justify-content-center align-items-center Height100 h-m" style="padding: 0% 5% 5% 5%;">

                    <div   class="Conte_Box row justify-content-center align-items-center Height91" >
                        <div class="col-lg-12 justify-content-center align-items-center" style="padding: 0;padding: 0;margin-top: 40px; height: 40px;">
                            <div   class="row  align-items-left Height100" style="padding: 0;">
                                <h2 class="Prodcut_Show_">{{ $product->name}}</h2>
                            </div>
                        </div>
                        <div class="container_producto">

                            @if ( $product->file )
                                <img class="Product_Img" src="{{ $product->file }}" />

                            @endif

                            <div type=button class="btn-especi justify-content-center align-items-center" data-toggle="modal" data-target="#exampleModalCenter">
                                <p class="justify-content-center align-items-center P-esp">Especificaciones</p>
                            </div>

                        </div>

                    </div>

                    <div   class="row justify-content-center align-items-center Height10" style="padding:0% 15% 5% 15%;">

                        <div class="col-lg-12 justify-content-center align-items-center Height100" style="padding: 0;">

                            <form method="post" action="{{ route('cart-add-form') }}">
                                {{ csrf_field() }}

                            <div   class="row justify-content-center align-items-center Height100" style="padding: 0% 5%;">
                                <div class="col-lg-6 offset-3 justify-content-center align-items-center" style="height: 35px; text-align: center; padding:0%; margin:auto;">

                                    <div   class=" row justify-content-center align-items-center Height100"  onclick="ani()">
                                        <input type="submit" id="checkBtn" class="BTN_Add BTN_new" href="{{ url('/cart/add-form/'.$product->sku) }}">
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            <!--Parte Derecha producto-->
                <div class="col-md-7 col-md-5 col-12 justify-content-center align-items-center Height100 P-mob" style="padding:10% 9% 3% 2%">
                    <div   class="row justify-content-center align-items-center Height100" >

                        <div class="Act_Show  col-md-12 justify-content-center" style="padding: 0; height: 7%;">

                            <div   class="Cabe_ row justify-content-center align-items-center Height100">

                                <div class="col-8 justify-content-center align-items-center Height100" style="padding: 0 2px 0 0;">
                                    <div class="row justify-content-center align-items-center Height100" style="background-color: #c3cbe3;">
                                        <label  style="width: 100%; margin-bottom: 0px; margin-left:16px;"  for="{{ $product->id  }}">
                                            <input style="vertical-align: middle;" id="{{ $product->sku  }}" name="extra[]" type="checkbox" value="{{ $product->sku  }}" />
                                            <p class="btn_filtro_add I_E" style="margin-left: 2px;">INCLUIDO EN EL PAQUETE</p>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-2 justify-content-center align-items-center Height100" style="background-color: #c3cbe3; ">
                                    <div class="row justify-content-center align-items-center Height100">
                                        <p>Ud</p>
                                    </div>
                                </div>
                                <div class="col-2 justify-content-center align-items-center Height100" style="background-color: #c3cbe3; ">
                                    <div class="row justify-content-center align-items-center Height100">
                                        <p>Días</p>
                                    </div>
                                </div>

                            </div>

                            <div   class="row justify-content-center align-items-center Height20 H-in-m" style="height: 19px;">
                                <div class="col-8 justify-content-center align-items-center Height100" style="padding: 0 2px 0 0;">
                                </div>

                                <div class="col-2 justify-content-center align-items-center Height100 In-m" style="padding: 0 30px 0 10px; margin-top: 15px;">

                                    <input name="day_{{ $product->sku  }}" type="number" value="1" min="1" max="1000" step="1" class="numb" />

                                </div>

                                <div class="col-2 justify-content-center align-items-center Height100 In-m" style="padding: 0 30px 0 10px; margin-top: 15px;">
                                    <input name="quantity_{{ $product->sku  }}"  type="number" value="1" min="1" max="1000" step="1" class="numb" />

                                </div>
                            </div>

                        </div>

                        <div class="col-lg-12 justify-content-center Height30" style="padding: 0;">

                            <div id="INCLUIDO" class="INCLUIDO col-12 justify-content-center align-items-center Height80" style="padding: 1% 3%;  overflow: auto;">

                                <div   class="row justify-content-center align-items-center Height100" >
                                    @foreach ($incluidos as $incluido)


                                            <div class="col-1 justify-content-center align-items-center" style="padding: 0; height: 13px; margin-bottom: 4px;">
                                                <p>{{ $incluido->quantity}}</p>
                                            </div>

                                            <div class="col-11 justify-content-center align-items-center" style="padding: 0; height: 13px; margin-bottom: 4px;">
                                                @foreach ($names as $name)
                                                    @if ($name->product_id == $incluido->product_id )
                                                        <p>{{ $name->name }}</p>
                                                    @endif
                                                @endforeach
                                            </div>


                                    @endforeach
                                </div>

                            </div>

                        </div>

                        <div class="col-lg-12 justify-content-center align-items-center Height50" style="padding: 0;">
                            @for ($i = 0 ; $i < sizeof($extras) ; $i++)
                            @if ($i == 0)
                                <div   class="Cabe_ row justify-content-center align-items-center" style="    height: 25px;">
                                    <div class="col-8 justify-content-center align-items-center Height100" style="padding: 0 2px 0 0;">
                                        <div class="row justify-content-center align-items-center Height100" style="background-color: #c3cbe3;">
                                            <p class="I_E" style="width: 100%; margin-left: 37px;">EXTRAS</p>
                                        </div>
                                    </div>
                                    <div class="col-2 justify-content-center align-items-center Height100" style="background-color: #c3cbe3;">
                                        <div class="row justify-content-center align-items-center Height100">
                                            <p>Ud</p>
                                        </div>
                                    </div>
                                    <div class="col-2 justify-content-center align-items-center Height100" style="background-color: #c3cbe3;">
                                        <div class="row justify-content-center align-items-center Height100">
                                            <p>Días</p>
                                        </div>
                                    </div>

                                </div>

                                <div id="EXTRAS" class="EXTRA Act_Show col-12 justify-content-center Height90" style="padding: 0; margin-top: 10px; overflow: auto; text-align: right;">

                                    @foreach ($extras as $extra)
                                        <div class="Art row Height8 H-m-input" style="padding: 0;">
                                            <div class="col-8 justify-content-center Height100">
                                                <div class="row justify-content-center  Height100">
                                                    <label for="{{ $extra->name }}">

                                                        <input style="vertical-align: middle;" id="{{$extra->sku}}" name="extra[]" type="checkbox" value="{{$extra->sku}}" />
                                                        {{ strip_tags($extra->name) }}

                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-2 justify-content-center align-items-center Height100 P-m-input" style="     padding:0 20px 0 10px;">
                                                <div class="row justify-content-center align-items-center Height100">
                                                    <input name="day_{{ $extra->sku  }}"  type="number" value="1" min="1" max="1000" step="1" class="numb" />
                                                </div>
                                            </div>
                                            <div class="col-2 justify-content-center align-items-center Height100 P-m-input" style="    padding:0 20px 0 10px; ">
                                                <div class="row justify-content-center align-items-center Height100">
                                                    <input name="quantity_{{ $extra->sku  }}"  type="number" value="1" min="1" max="1000" step="1" class="numb" />
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach

                                </div>
                            @endif
                            @endfor
                        </div>

                    </div>
                </div>

            </form>
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top: 1%;">
                    <div class="modal-content modal_especificaciones">

                        <div class="modal-header">

                            <h5 class="modal-title" id="exampleModalCenterTitle">{{ $product->name }}</h5>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" style="font-size: 20px;">&times;</span>
                            </button>

                        </div>

                        <div class="modal-body">
                            <div class="row-lg-12 justify-content-center align-items-center Height100" style="padding:0% 10% 12% 13%;">

                                <div class="col-lg-12 justify-content-center align-items-center Height10" style="padding:0%;">
                                    <div class="row justify-content-center align-items-center Height100">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Especificaciones</h5>
                                    </div>
                                </div>

                                <div class="col-lg-12 justify-content-center align-items-center Height5_2" style="padding:0% ;">
                                    <div class="row justify-content-center align-items-center Height100">
                                        <p style="background: #151e45; color: #151e45; width: 100%;">.</p>
                                    </div>
                                </div>

                                <div class="col-lg-12  Height85" style="padding: 3% 0 0 0;">
                                    <div class="row  Height100">
                                        <p>{{ $product->technical_specifications }}</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    @endif

    @if ($product->classification_id == 2 )

        <div   class="row justify-content-center align-items-center Height100 P-mtop" style="    padding-top: 6%;">

            <!--Barra de navegacion-->
            @foreach ($clasificaciones as $capa1)

                @if ($capa1->id == $product->classification_id )

                    <nav id="barra_navegacion" class="navbar col-lg-11 offset-1 Height4 Filter" style="padding: 0%;" >
                        <div class="row justify-content-center align-items-center Height100" style="padding:0; width: 100%;">

                            <div class=" col-lg-2 col-6 justify-content-center align-items-center Height100" style="padding:0;">
                                <div class="row justify-content-center align-items-center Height100" style="padding:0;">


                                    @if ($capa1->id == $product->classification_id )

                                        <p class="Marca_submenu"> {{ $capa1->name }}  &nbsp;&nbsp; <i class="fas fa-caret-right"></i></p>

                                    @endif


                                </div>
                            </div>

                            @foreach ($subclasificaciones1 as $capa2)

                                @if ($capa2->id == $product->subclassification_id )

                                    <div class="dropdown col-lg-2 col-6 justify-content-center align-items-center Height100" style="padding:0">
                                        <div class="row  align-items-center Height100" style="padding:0">

                                            <p class="Marca_submenu dropdown-toggle" style="text-transform: capitalize !important;" data-toggle="dropdown">{{  $capa2->name }}&nbsp;&nbsp;  </p>
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
                                            <ul class="nav">
                                                @foreach ($subareas as $capa3)
                                                    @if ($capa3->subclassification_id == $capa2->id )
                                                        <li class="nav-item" style="margin-bottom: 5px;">   <a  id="__{{  $capa3->name }}" data-page="{{  $capa3->name }}" class="_{{  $capa3->name }} sub_menu_cat nav-link" href="{{ url('optica/'.$capa2->slug.'#'.$capa3->name) }}" >&nbsp; {{  $capa3->name }} &nbsp; | &nbsp;</a></li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                @endif

                            @endforeach

                        </div>
                    </nav>

                @endif

            @endforeach

            <!--Parte Izquierda producto-->
            <div class="col-md-5 col-12 justify-content-center align-items-center Height100 h-m" style="padding: 40px 5% 5% 5%;">

                <div   class="Conte_Box row justify-content-center align-items-center Height90" >

                    <div class="col-lg-12 justify-content-center align-items-center Height10" style="padding: 0;">
                        <div   class="row  align-items-left Height100" style="padding: 0;">
                            <h2 class="Prodcut_Show_">{{ $product->name}}</h2>
                        </div>
                    </div>
                    <div class="container_producto">
                        @if ( $product->file )
                            <img class="Product_Img" src="{{ $product->file }}" />
                        @endif
                    </div>

                </div>

                <div   class="row justify-content-center align-items-center Height10" style="padding:0% 15% 5% 15%;">

                    <div class="col-lg-12 justify-content-center align-items-center Height100" style="padding: 0;">
                        <form method="post" action="{{ route('cart-add-form') }}">
                            {{ csrf_field() }}
                        <div   class="row justify-content-center align-items-center Height100" style="padding: 0% 5%;">
                            <div class="col-lg-6 offset-3 justify-content-center align-items-center" style="height: 35px; text-align: center; padding:0%; margin:auto;">
                                <div   class=" row justify-content-center align-items-center Height100"  onclick="ani()">
                                    <input type="submit" value="submit" id="checkBtn" class="BTN_Add BTN_new" href="{{ url('/cart/add/'.$product->sku) }}">
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <!--Parte Derecha producto-->
            <div class="col-md-7 col-12 justify-content-center  Height100 P-mob" style="padding:10% 9% 3% 2%;">
                <div   class="row justify-content-center  Height100" >


                    @for ($i = 0 ; $i < sizeof($kit) ; $i++)
                        @if ($i == 0)

                            <div class="Act_Show col-md-12 justify-content-center  Height10" style="padding: 0; width:100%; margin-top">

                                <div   class="Cabe_ row justify-content-center align-items-center Height80">
                                    <div class="col-8 justify-content-center align-items-center Height100" style="padding: 0 2px 0 0;">
                                        <div class="row justify-content-center align-items-center Height100" style="background-color: #c3cbe3">
                                            <p class="I_E" style="margin-left: 15px; width:100%; right:0;">PAQUETES</p>
                                        </div>
                                    </div>
                                    <div class="col-2 justify-content-center align-items-center Height100" style="background-color: #c3cbe3">
                                        <div class="row justify-content-center align-items-center Height100">
                                            <p>Ud</p>
                                        </div>
                                    </div>
                                    <div class="col-2 justify-content-center align-items-center Height100" style="background-color: #c3cbe3">
                                        <div class="row justify-content-center align-items-center Height100">
                                            <p style="right: 0;">Días</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-12 Act_Show justify-content-center  Height30" style="padding: 0;">

                                    @foreach ($incluidos as $incluido)

                                                    <div id="IN" class="Act_Show row justify-content-center align-items-center HeightI H-m-input" >

                                                        <div class="col-8   Height100 ">
                                                            <div class="row   Height100">
                                                                <label for="{{ $incluido->name }}" style="font-size: 0.6rem; color: #707791;">

                                                                    <input style="vertical-align: middle; position: absolute;" id="{{$incluido->sku}}" name="extra[]" type="checkbox" value="{{$incluido->sku}}" />
                                                                    <p class="paq">{{ strip_tags($incluido->name) }}</p>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-2 justify-content-center align-items-center Height100 P-m-input" style="padding: 0px 30px 0px 10px;">
                                                            <div class="row justify-content-center align-items-center Height100">
                                                                <input name="day_{{ $incluido->sku  }}"  type="number" value="1" min="1" max="1000" step="1" class="numb" />
                                                            </div>
                                                        </div>
                                                        <div class="col-2 justify-content-center align-items-center Height100 P-m-input" style="padding: 0px 30px 0px 10px;">
                                                            <div class="row justify-content-center align-items-center Height100">
                                                                <input name="quantity_{{ $incluido->sku  }}"  type="number" value="1" min="1" max="1000" step="1" class="numb" />
                                                            </div>
                                                        </div>

                                                    </div>


                                    @endforeach
                            </div>

                        @endif
                    @endfor

                    <div class="col-lg-12 justify-content-center  Height50" style="padding: 0;">
                        @for ($i = 0 ; $i < sizeof($extras) ; $i++)
                        @if ($i == 0)

                            <div   class="Cabe_ row justify-content-center" style="    height: 25px;">
                                <div class="col-8 justify-content-center align-items-center Height100" style="padding: 0 2px 0 0;">
                                    <div id="EX" class="row  align-items-center Height100" style="background-color: #c3cbe3">
                                        <p class="I_E" style="margin-left: 15px;">LENTES SUELTOS</p>
                                    </div>
                                </div>
                                <div class="col-2 justify-content-center align-items-center Height100" style="background-color: #c3cbe3">
                                    <div class="row justify-content-center align-items-center Height100">
                                        <p>Ud</p>
                                    </div>
                                </div>
                                <div class="col-2 justify-content-center align-items-center Height100" style="background-color: #c3cbe3">
                                    <div class="row justify-content-center align-items-center Height100">
                                        <p>Días</p>
                                    </div>
                                </div>
                            </div>

                            <div id="EXTRAS" class="EXTRA Act_Show col-12 justify-content-center Height90" style="padding: 0; margin-top: 10px; overflow: auto; text-align: right;">

                                @foreach ($extras as $extra)

                                    <div class="Art row Height8 H-m-input" style="padding: 0;">
                                        <div class="col-8 justify-content-center Height100" style="padding-right: 0;">
                                            <div class="row justify-content-center  Height100">
                                                <label for="{{ $extra->name }}">

                                                    <input style="vertical-align: middle;" id="{{$extra->sku}}" name="extra[]" type="checkbox" value="{{$extra->sku}}" />
                                                    {{ strip_tags($extra->name) }}

                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-2 justify-content-center align-items-center Height100 P-m-input" style="     padding:0 20px 0 10px;">
                                            <div class="row justify-content-center align-items-center Height100">
                                                <input name="day_{{ $extra->sku  }}"  type="number" value="1" min="1" max="1000" step="1" class="numb" />
                                            </div>
                                        </div>
                                        <div class="col-2 justify-content-center align-items-center Height100 P-m-input" style="    padding:0 20px 0 10px; ">
                                            <div class="row justify-content-center align-items-center Height100">
                                                <input name="quantity_{{ $extra->sku  }}"  type="number" value="1" min="1" max="1000" step="1" class="numb" />
                                            </div>
                                        </div>

                                    </div>

                                @endforeach

                            </div>

                        @endif
                        @endfor
                    </div>

                </div>
            </div>
        </form>
        </div>

    @endif

    @if ($product->classification_id == 3 )

        <div   class="row justify-content-center align-items-center Height100 P-mtop" style="    padding-top: 6%;">

            <!--Barra de navegacion-->
            @foreach ($clasificaciones as $capa1)

                @if ($capa1->id == $product->classification_id )

                    <nav id="barra_navegacion" class="navbar col-lg-11 offset-1 Height4 Filter" style="padding: 0%;" >
                        <div class="row justify-content-center align-items-center Height100" style="padding:0; width: 100%;">

                            <div class=" col-lg-2 col-6 justify-content-center align-items-center Height100" style="padding:0;">
                                <div class="row justify-content-center align-items-center Height100" style="padding:0;">


                                    @if ($capa1->id == $product->classification_id )

                                        <p class="Marca_submenu"> {{ $capa1->name }}  &nbsp;&nbsp; <i class="fas fa-caret-right"></i></p>

                                    @endif


                                </div>
                            </div>

                            @foreach ($subclasificaciones1 as $capa2)

                                @if ($capa2->id == $product->subclassification_id )

                                    <div class="dropdown col-lg-2 col-6 justify-content-center align-items-center Height100" style="padding:0">
                                        <div class="row  align-items-center Height100" style="padding:0">

                                            <p class="Marca_submenu dropdown-toggle" style="text-transform: capitalize !important;" data-toggle="dropdown">{{  $capa2->name }}&nbsp;&nbsp;  </p>
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
                                            <ul class="nav">
                                                @foreach ($subareas as $capa3)
                                                    @if ($capa3->subclassification_id == $capa2->id )
                                                        <li class="nav-item" style="margin-bottom: 5px;">   <a  id="__{{  $capa3->name }}" data-page="{{  $capa3->name }}" class="_{{  $capa3->name }} sub_menu_cat nav-link" href="{{ url('accesorios-filtros/'.$capa2->slug.'#'.$capa3->name) }}" >&nbsp; {{  $capa3->name }} &nbsp; | &nbsp;</a></li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                @endif

                            @endforeach

                        </div>
                    </nav>

                @endif

            @endforeach

            <!--Parte Izquierda producto-->
            <div class="col-md-5 col-12 justify-content-center align-items-center Height100 h-m" style="padding: 40px 5% 5% 5%;">

                <div   class="Conte_Box row justify-content-center align-items-center Height90" >

                    <div class="col-lg-12 justify-content-center align-items-center Height10" style="padding: 0;">
                        <div   class="row  align-items-left Height100" style="padding: 0;">
                            <h2 class="Prodcut_Show_">{{ $product->name}}</h2>
                        </div>
                    </div>
                    <div class="container_producto">
                        @if ( $product->file )
                            <img class="Product_Img" src="{{ $product->file }}" />
                        @endif
                    </div>

                </div>

                <div   class="row justify-content-center align-items-center Height10" style="padding:0% 15% 5% 15%;">

                    <div class="col-lg-12 justify-content-center align-items-center Height100" style="padding: 0;">
                        <form method="post" action="{{ route('cart-add-form') }}">
                            {{ csrf_field() }}
                        <div   class="row justify-content-center align-items-center Height100" style="padding: 0% 5%;">
                            <div class="col-lg-6 offset-3 justify-content-center align-items-center" style="height: 35px; text-align: center; padding:0%; margin:auto;">
                                <div   class=" row justify-content-center align-items-center Height100"  onclick="ani()">
                                    <input type="submit" value="submit" id="checkBtn" class="BTN_Add BTN_new" href="{{ url('/cart/add/'.$product->sku) }}">
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <!--Parte Derecha producto-->
            <div class="col-md-7 col-12 justify-content-center  Height100 P-mob" style="padding:10% 9% 3% 2%;">
                <div   class="row justify-content-center  Height100" >


                    @for ($i = 0 ; $i < sizeof($kit) ; $i++)
                        @if ($i == 0)

                            <div class="Act_Show col-md-12 justify-content-center  Height10" style="padding: 0; width:100%; margin-top">

                                <div   class="Cabe_ row justify-content-center align-items-center Height80">
                                    <div class="col-8 justify-content-center align-items-center Height100" style="padding: 0 2px 0 0;">
                                        <div class="row justify-content-center align-items-center Height100" style="background-color: #c3cbe3">
                                            <p class="I_E" style="margin-left: 15px; width:100%; right:0;">PAQUETES</p>
                                        </div>
                                    </div>
                                    <div class="col-2 justify-content-center align-items-center Height100" style="background-color: #c3cbe3">
                                        <div class="row justify-content-center align-items-center Height100">
                                            <p>Ud</p>
                                        </div>
                                    </div>
                                    <div class="col-2 justify-content-center align-items-center Height100" style="background-color: #c3cbe3">
                                        <div class="row justify-content-center align-items-center Height100">
                                            <p style="right: 0;">Días</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-12 Act_Show justify-content-center  Height30" style="padding: 0;">

                                    @foreach ($incluidos as $incluido)

                                        <div id="IN" class="Act_Show row justify-content-center align-items-center Height8 H-m-input" >

                                            <div class="col-8   Height100">
                                                <div class="row   Height100">
                                                    <label for="{{ $incluido->name }}" style="font-size: 0.6rem; color: #707791;">

                                                        <input style="vertical-align: middle;" id="{{$incluido->sku}}" name="extra[]" type="checkbox" value="{{$incluido->sku}}" />
                                                        {{ strip_tags($incluido->name) }}

                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-2 justify-content-center align-items-center Height100 P-m-input" style="padding: 0px 30px 0px 10px;">
                                                <div class="row justify-content-center align-items-center Height100">
                                                    <input name="day_{{ $incluido->sku  }}"  type="number" value="1" min="1" max="1000" step="1" class="numb" />
                                                </div>
                                            </div>
                                            <div class="col-2 justify-content-center align-items-center Height100 P-m-input" style="padding: 0px 30px 0px 10px;">
                                                <div class="row justify-content-center align-items-center Height100">
                                                    <input name="quantity_{{ $incluido->sku  }}"  type="number" value="1" min="1" max="1000" step="1" class="numb" />
                                                </div>
                                            </div>

                                        </div>

                                    @endforeach
                            </div>

                        @endif
                    @endfor

                    <div class="col-lg-12 justify-content-center  Height50" style="padding: 0;">

                        <div   class="Cabe_ row justify-content-center" style="    height: 25px;">
                            <div class="col-8 justify-content-center align-items-center Height100" style="padding: 0 2px 0 0;">
                                <div id="EX" class="row  align-items-center Height100" style="background-color: #c3cbe3">
                                    <p class="I_E" style="margin-left: 15px;">ACCESORIOS</p>
                                </div>
                            </div>
                            <div class="col-2 justify-content-center align-items-center Height100" style="background-color: #c3cbe3">
                                <div class="row justify-content-center align-items-center Height100">
                                    <p>Ud</p>
                                </div>
                            </div>
                            <div class="col-2 justify-content-center align-items-center Height100" style="background-color: #c3cbe3">
                                <div class="row justify-content-center align-items-center Height100">
                                    <p>Días</p>
                                </div>
                            </div>
                        </div>

                        <div id="EXTRAS" class="EXTRA Act_Show col-12 justify-content-center Height90" style="padding: 0; margin-top: 10px; overflow: auto; text-align: right;">

                            @foreach ($extras as $extra)

                                <div class="Art row Height8 H-m-input" style="padding: 0;">
                                    <div class="col-8 justify-content-center Height100">
                                        <div class="row justify-content-center  Height100">
                                            <label for="{{ $extra->name }}">

                                                <input style="vertical-align: middle;" id="{{$extra->sku}}" name="extra[]" type="checkbox" value="{{$extra->sku}}" />
                                                {{ strip_tags($extra->name) }}

                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2 justify-content-center align-items-center Height100 P-m-input" style="     padding:0 20px 0 10px;">
                                        <div class="row justify-content-center align-items-center Height100">
                                            <input name="day_{{ $extra->sku  }}"  type="number" value="1" min="1" max="1000" step="1" class="numb" />
                                        </div>
                                    </div>
                                    <div class="col-2 justify-content-center align-items-center Height100 P-m-input" style="    padding:0 20px 0 10px; ">
                                        <div class="row justify-content-center align-items-center Height100">
                                            <input name="quantity_{{ $extra->sku  }}"  type="number" value="1" min="1" max="1000" step="1" class="numb" />
                                        </div>
                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>
            </div>
        </form>
        </div>

    @endif

    @if ($product->classification_id == 4  )

        <div   class="row justify-content-center align-items-center Height100 P-mtop" style="    padding-top: 6%;">

            <!--Barra de navegacion-->
            @foreach ($clasificaciones as $capa1)

                @if ($capa1->id == $product->classification_id )

                    <nav id="barra_navegacion" class="navbar col-lg-11 offset-1 Height4 Filter" style="padding: 0%;" >
                        <div class="row justify-content-center align-items-center Height100" style="padding:0; width: 100%;">

                            <div class=" col-lg-2 col-6 justify-content-center align-items-center Height100" style="padding:0;">
                                <div class="row justify-content-center align-items-center Height100" style="padding:0;">


                                    @if ($capa1->id == $product->classification_id )

                                        <p class="Marca_submenu"> {{ $capa1->name }}  &nbsp;&nbsp; <i class="fas fa-caret-right"></i></p>

                                    @endif


                                </div>
                            </div>

                            @foreach ($subclasificaciones1 as $capa2)

                                @if ($capa2->id == $product->subclassification_id )

                                    <div class="dropdown col-lg-2 col-6 justify-content-center align-items-center Height100" style="padding:0">
                                        <div class="row  align-items-center Height100" style="padding:0">

                                            <p class="Marca_submenu dropdown-toggle" style="text-transform: capitalize !important;" data-toggle="dropdown">{{  $capa2->name }}&nbsp;&nbsp;  </p>
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
                                            <ul class="nav">
                                                @foreach ($subareas as $capa3)
                                                    @if ($capa3->subclassification_id == $capa2->id )
                                                        <li class="nav-item" style="margin-bottom: 5px;">   <a  id="__{{  $capa3->name }}" data-page="{{  $capa3->name }}" class="_{{  $capa3->name }} sub_menu_cat nav-link" href="{{ url('iluminacion/'.$capa2->slug.'#'.$capa3->name) }}" >&nbsp; {{  $capa3->name }} &nbsp; | &nbsp;</a></li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                @endif

                            @endforeach

                        </div>
                    </nav>

                @endif

            @endforeach

            <!--Parte Izquierda producto-->
            <div class="col-md-5 col-12 justify-content-center align-items-center Height100 h-m" style="padding: 40px 5% 5% 5%;">

                <div   class="Conte_Box row justify-content-center align-items-center Height90" >

                    <div class="col-lg-12 justify-content-center align-items-center Height10" style="padding: 0;">
                        <div   class="row  align-items-left Height100" style="padding: 0;">
                            <h2 class="Prodcut_Show_">{{ $product->name}}</h2>
                        </div>
                    </div>
                    <div class="container_producto">
                        @if ( $product->file )
                            <img class="Product_Img" src="{{ $product->file }}" />
                        @endif
                    </div>

                </div>

                <div   class="row justify-content-center align-items-center Height10" style="padding:0% 15% 5% 15%;">

                    <div class="col-lg-12 justify-content-center align-items-center Height100" style="padding: 0;">
                        <form method="post" action="{{ route('cart-add-form') }}">
                            {{ csrf_field() }}
                        <div   class="row justify-content-center align-items-center Height100" style="padding: 0% 5%;">
                            <div class="col-lg-6 offset-3 justify-content-center align-items-center" style="height: 35px; text-align: center; padding:0%; margin:auto;">
                                <div   class=" row justify-content-center align-items-center Height100"  onclick="ani()">
                                    <input type="submit" value="submit" id="checkBtn" class="BTN_Add BTN_new" href="{{ url('/cart/add/'.$product->sku) }}">
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <!--Parte Derecha producto-->
            <div class="col-md-7 col-12 justify-content-center  Height100 P-mob" style="padding:10% 9% 3% 2%;">
                <div   class="row justify-content-center  Height100" >


                    @for ($i = 0 ; $i < sizeof($kit) ; $i++)
                        @if ($i == 0)

                            <div class="Act_Show col-md-12 justify-content-center  Height10" style="padding: 0; width:100%; margin-top">

                                <div   class="Cabe_ row justify-content-center align-items-center Height80">
                                    <div class="col-8 justify-content-center align-items-center Height100" style="padding: 0 2px 0 0;">
                                        <div class="row justify-content-center align-items-center Height100" style="background-color: #c3cbe3">
                                            <p class="I_E" style="margin-left: 15px; width:100%; right:0;">EQUIPO</p>
                                        </div>
                                    </div>
                                    <div class="col-2 justify-content-center align-items-center Height100" style="background-color: #c3cbe3">
                                        <div class="row justify-content-center align-items-center Height100">
                                            <p>Ud</p>
                                        </div>
                                    </div>
                                    <div class="col-2 justify-content-center align-items-center Height100" style="background-color: #c3cbe3">
                                        <div class="row justify-content-center align-items-center Height100">
                                            <p style="right: 0;">Días</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-12 Act_Show justify-content-center  Height30" style="padding: 0; overflow: auto; height: 200px;">

                                    @foreach ($incluidos as $incluido)

                                                    <div id="IN" class="Act_Show row justify-content-center align-items-center Height8 H-m-input" >

                                                        <div class="col-8   Height100">
                                                            <div class="row   Height100">
                                                                <label for="{{ $incluido->name }}" style="font-size: 0.7rem; color: #707791;">

                                                                    <input style="vertical-align: middle;" id="{{$incluido->sku}}" name="extra[]" type="checkbox" value="{{$incluido->sku}}" />
                                                                    {{ strip_tags($incluido->name) }}

                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-2 justify-content-center align-items-center Height100 P-m-input" style="padding: 0px 30px 0px 10px;">
                                                            <div class="row justify-content-center align-items-center Height100">
                                                                <input name="day_{{ $incluido->sku  }}"  type="number" value="1" min="1" max="1000" step="1" class="numb" />
                                                            </div>
                                                        </div>
                                                        <div class="col-2 justify-content-center align-items-center Height100 P-m-input" style="padding: 0px 30px 0px 10px;">
                                                            <div class="row justify-content-center align-items-center Height100">
                                                                <input name="quantity_{{ $incluido->sku  }}"  type="number" value="1" min="1" max="1000" step="1" class="numb" />
                                                            </div>
                                                        </div>

                                                    </div>

                                    @endforeach
                            </div>

                        @endif
                    @endfor

                    <div class="col-lg-12 justify-content-center  Height50" style="padding: 0;">
                        @for ($i = 0 ; $i < sizeof($extras) ; $i++)
                            @if ($i == 0)
                                <div   class="Cabe_ row justify-content-center" style="    height: 25px;">
                                    <div class="col-8 justify-content-center align-items-center Height100" style="padding: 0 2px 0 0;">
                                        <div id="EX" class="row  align-items-center Height100" style="background-color: #c3cbe3">
                                            <p class="I_E" style="margin-left: 15px;">ACCESORIOS</p>
                                        </div>
                                    </div>
                                    <div class="col-2 justify-content-center align-items-center Height100" style="background-color: #c3cbe3">
                                        <div class="row justify-content-center align-items-center Height100">
                                            <p>Ud</p>
                                        </div>
                                    </div>
                                    <div class="col-2 justify-content-center align-items-center Height100" style="background-color: #c3cbe3">
                                        <div class="row justify-content-center align-items-center Height100">
                                            <p>Días</p>
                                        </div>
                                    </div>
                                </div>

                                <div id="EXTRAS" class="EXTRA Act_Show col-12 justify-content-center Height90" style="padding: 0; margin-top: 10px; overflow: auto; text-align: right;">

                                    @foreach ($extras as $extra)
                                                        <div class="Art row Height8 H-m-input" style="padding: 0;">
                                                            <div class="col-8 justify-content-center Height100">
                                                                <div class="row justify-content-center  Height100">
                                                                    <label for="{{ $extra->name }}">

                                                                        <input style="vertical-align: middle;" id="{{$extra->sku}}" name="extra[]" type="checkbox" value="{{$extra->sku}}" />
                                                                        {{ strip_tags($extra->name) }}

                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 justify-content-center align-items-center Height100 P-m-input" style="     padding:0 20px 0 10px;">
                                                                <div class="row justify-content-center align-items-center Height100">
                                                                    <input name="day_{{ $extra->sku  }}"  type="number" value="1" min="1" max="1000" step="1" class="numb" />
                                                                </div>
                                                            </div>
                                                            <div class="col-2 justify-content-center align-items-center Height100 P-m-input" style="    padding:0 20px 0 10px; ">
                                                                <div class="row justify-content-center align-items-center Height100">
                                                                    <input name="quantity_{{ $extra->sku  }}"  type="number" value="1" min="1" max="1000" step="1" class="numb" />
                                                                </div>
                                                            </div>

                                                        </div>
                                    @endforeach

                                </div>
                            @endif
                        @endfor
                    </div>


                </div>
            </div>
        </form>
        </div>

    @endif

    @if ($product->classification_id == 5 )

        @if ($product->subclassification_id == 3 )
            <div   class="row justify-content-center align-items-center Height100 P-mtop" style="    padding-top: 6%;">

                <!--Barra de navegacion-->
                @foreach ($clasificaciones as $capa1)

                    @if ($capa1->id == $product->classification_id )

                        <nav id="barra_navegacion" class="navbar col-lg-11 offset-1 Height4 Filter" style="padding: 0%;" >
                            <div class="row justify-content-center align-items-center Height100" style="padding:0; width: 100%;">

                                <div class=" col-lg-2 col-6 justify-content-center align-items-center Height100" style="padding:0;">
                                    <div class="row justify-content-center align-items-center Height100" style="padding:0;">


                                        @if ($capa1->id == $product->classification_id )

                                            <p class="Marca_submenu"> {{ $capa1->name }}  &nbsp;&nbsp; <i class="fas fa-caret-right"></i></p>

                                        @endif


                                    </div>
                                </div>

                                @foreach ($subclasificaciones1 as $capa2)

                                    @if ($capa2->id == $product->subclassification_id )

                                        <div class="dropdown col-lg-2 col-6 justify-content-center align-items-center Height100" style="padding:0">
                                            <div class="row  align-items-center Height100" style="padding:0">

                                                <p class="Marca_submenu dropdown-toggle" style="text-transform: capitalize !important;" data-toggle="dropdown">{{  $capa2->name }}&nbsp;&nbsp;  </p>
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
                                                <ul class="nav">
                                                    @foreach ($subareas as $capa3)
                                                        @if ($capa3->subclassification_id == $capa2->id )
                                                            <li class="nav-item" style="margin-bottom: 5px;">   <a  id="__{{  $capa3->name }}" data-page="{{  $capa3->name }}" class="_{{  $capa3->name }} sub_menu_cat nav-link" href="{{ url('moviles-plantas/'.$capa2->slug.'#'.$capa3->name) }}" >&nbsp; {{  $capa3->name }} &nbsp; | &nbsp;</a></li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                    @endif

                                @endforeach

                            </div>
                        </nav>

                    @endif

                @endforeach

                <!--Parte Izquierda producto-->
                <div class="col-md-5 col-12 justify-content-center align-items-center Height100 h-m" style="padding: 40px 5% 5% 5%;">

                    <div   class="Conte_Box row justify-content-center align-items-center Height90" >

                        <div class="col-lg-12 justify-content-center align-items-center Height10" style="padding: 0;">
                            <div   class="row  align-items-left Height100" style="padding: 0;">
                                <h2 class="Prodcut_Show_">{{ $product->name}}</h2>
                            </div>
                        </div>
                        <div class="container_producto">
                            @if ( $product->file )
                                <img class="Product_Img" src="{{ $product->file }}" />
                            @endif
                        </div>

                    </div>

                    <div   class="row justify-content-center align-items-center Height10" style="padding:0% 15% 5% 15%;">

                        <div class="col-lg-12 justify-content-center align-items-center Height100" style="padding: 0;">
                            <form method="post" action="{{ route('cart-add-form') }}">
                                {{ csrf_field() }}
                            <div   class="row justify-content-center align-items-center Height100" style="padding: 0% 5%;">
                                <div class="col-lg-6 offset-3 justify-content-center align-items-center" style="height: 35px; text-align: center; padding:0%; margin:auto;">
                                    <div   class=" row justify-content-center align-items-center Height100"  onclick="ani()">
                                        <input type="submit" value="submit" id="checkBtn" class="BTN_Add BTN_new" href="{{ url('/cart/add/'.$product->sku) }}">
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

                <!--Parte Derecha producto-->
                <div class="col-md-7 col-12 justify-content-center  Height100 P-mob" style="padding:10% 9% 3% 2%;">
                    <div   class="row justify-content-center  Height100" >

                        <div class="Act_Show  col-md-12 justify-content-center" style="padding: 0; height: 7%;">

                            <div   class="Cabe_ row justify-content-center align-items-center Height100">
                                <div class="col-8 justify-content-center align-items-center Height100" style="padding: 0 2px 0 0;">
                                    <div class="row justify-content-center align-items-center Height100" style="background-color: #c3cbe3;">
                                        <label  style="width: 100%; margin-bottom: 0px; margin-left:16px;"  for="{{ $product->id  }}">
                                            <input style="vertical-align: middle;" id="{{ $product->sku  }}" name="extra[]" type="checkbox" value="{{ $product->sku  }}" />
                                            <p class="btn_filtro_add I_E" style="margin-left: 2px;">INCLUIDO EN EL PAQUETE</p>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-2 justify-content-center align-items-center Height100" style="background-color: #c3cbe3; ">
                                    <div class="row justify-content-center align-items-center Height100">
                                        <p>Ud</p>
                                    </div>
                                </div>
                                <div class="col-2 justify-content-center align-items-center Height100" style="background-color: #c3cbe3; ">
                                    <div class="row justify-content-center align-items-center Height100">
                                        <p>Días</p>
                                    </div>
                                </div>

                            </div>

                            <div   class="row justify-content-center align-items-center Height20 H-in-m" style="height: 19px;">
                                <div class="col-8 justify-content-center align-items-center Height100" style="padding: 0 2px 0 0;">
                                </div>
                                <div class="col-2 justify-content-center align-items-center Height100 In-m" style="padding: 0 30px 0 10px; margin-top: 15px;">

                                    <input name="day_{{ $product->sku  }}" type="number" value="1" min="1" max="1000" step="1" class="numb" />

                                </div>
                                <div class="col-2 justify-content-center align-items-center Height100 In-m" style="padding: 0 30px 0 10px; margin-top: 15px;">
                                    <input name="quantity_{{ $product->sku  }}"  type="number" value="1" min="1" max="1000" step="1" class="numb" />

                                </div>
                            </div>

                        </div>

                        <div class="col-lg-12 justify-content-center" style="padding: 0; height: 85%;">

                            <div id="INCLUIDO" class="INCLUIDO col-12 justify-content-center align-items-center Height80" style="padding: 1% 3%;  overflow: auto;">

                                <div   class="row justify-content-center align-items-center Height100" >
                                    @foreach ($incluidos as $incluido)


                                            <div class="col-1 justify-content-center align-items-center" style="padding: 0; height: 13px; margin-bottom: 4px;">
                                                <p>{{ $incluido->quantity}}</p>
                                            </div>

                                            <div class="col-11 justify-content-center align-items-center" style="padding: 0; height: 13px; margin-bottom: 4px;">
                                                <p>{{ $incluido->name }}</p>
                                            </div>


                                    @endforeach
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </form>
            </div>
        @else

            <div   class="row justify-content-center align-items-center Height100 P-mtop" style="    padding-top: 6%;">

                <!--Barra de navegacion-->
                @foreach ($clasificaciones as $capa1)

                    @if ($capa1->id == $product->classification_id )

                        <nav id="barra_navegacion" class="navbar col-lg-11 offset-1 Height4 Filter" style="padding: 0%;" >
                            <div class="row justify-content-center align-items-center Height100" style="padding:0; width: 100%;">

                                <div class=" col-lg-2 col-6 justify-content-center align-items-center Height100" style="padding:0;">
                                    <div class="row justify-content-center align-items-center Height100" style="padding:0;">


                                        @if ($capa1->id == $product->classification_id )

                                            <p class="Marca_submenu"> {{ $capa1->name }}  &nbsp;&nbsp; <i class="fas fa-caret-right"></i></p>

                                        @endif


                                    </div>
                                </div>

                                @foreach ($subclasificaciones1 as $capa2)

                                    @if ($capa2->id == $product->subclassification_id )

                                        <div class="dropdown col-lg-2 col-6 justify-content-center align-items-center Height100" style="padding:0">
                                            <div class="row  align-items-center Height100" style="padding:0">

                                                <p class="Marca_submenu dropdown-toggle" style="text-transform: capitalize !important;" data-toggle="dropdown">{{  $capa2->name }}&nbsp;&nbsp;  </p>
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
                                                <ul class="nav">
                                                    @foreach ($subareas as $capa3)
                                                        @if ($capa3->subclassification_id == $capa2->id )
                                                            <li class="nav-item" style="margin-bottom: 5px;">   <a  id="__{{  $capa3->name }}" data-page="{{  $capa3->name }}" class="_{{  $capa3->name }} sub_menu_cat nav-link" href="#{{  $capa3->name }}" >&nbsp; {{  $capa3->name }} &nbsp; | &nbsp;</a></li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                    @endif

                                @endforeach

                            </div>
                        </nav>

                    @endif

                @endforeach

                <!--Parte Izquierda producto-->
                <div class="col-md-5 col-12 justify-content-center align-items-center Height100 h-m" style="padding: 40px 5% 5% 5%;">

                    <div   class="Conte_Box row justify-content-center align-items-center Height90" >

                        <div class="col-lg-12 justify-content-center align-items-center Height10" style="padding: 0;">
                            <div   class="row  align-items-left Height100" style="padding: 0;">
                                <h2 class="Prodcut_Show_">{{ $product->name}}</h2>
                            </div>
                        </div>
                        <div class="container_producto">
                            @if ( $product->file )
                                <img class="Product_Img" src="{{ $product->file }}" />
                            @endif
                        </div>

                    </div>

                    <div   class="row justify-content-center align-items-center Height10" style="padding:0% 15% 5% 15%;">

                        <div class="col-lg-12 justify-content-center align-items-center Height100" style="padding: 0;">
                        <form method="post" action="{{ route('cart-add-form') }}">
                            {{ csrf_field() }}
                            <div   class="row justify-content-center align-items-center Height100" style="padding: 0% 5%;">
                                <div class="col-lg-6 offset-3 justify-content-center align-items-center" style="height: 35px; text-align: center; padding:0%; margin:auto;">
                                    <div   class=" row justify-content-center align-items-center Height100"  onclick="ani()">
                                        <input type="submit" value="submit" id="checkBtn" class="BTN_Add BTN_new" href="{{ url('/cart/add/'.$product->sku) }}">
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

                <!--Parte Derecha producto-->
                <div class="col-md-7 col-12 justify-content-center  Height100 P-mob" style="padding:10% 9% 3% 2%;">
                    <div   class="row justify-content-center  Height100" >

                            @for ($i = 0 ; $i < sizeof($kit) ; $i++)
                                @if ($i == 0)

                                    <div class="Act_Show col-md-12 justify-content-center  Height10" style="padding: 0; width:100%; margin-top">

                                        <div   class="Cabe_ row justify-content-center align-items-center Height80">
                                            <div class="col-8 justify-content-center align-items-center Height100" style="padding: 0 2px 0 0;">
                                                <div class="row justify-content-center align-items-center Height100" style="background-color: #c3cbe3">
                                                    <p class="I_E" style="margin-left: 15px; width:100%; right:0;">PAQUETES</p>
                                                </div>
                                            </div>
                                            <div class="col-2 justify-content-center align-items-center Height100" style="background-color: #c3cbe3">
                                                <div class="row justify-content-center align-items-center Height100">
                                                    <p>Ud</p>
                                                </div>
                                            </div>
                                            <div class="col-2 justify-content-center align-items-center Height100" style="background-color: #c3cbe3">
                                                <div class="row justify-content-center align-items-center Height100">
                                                    <p style="right: 0;">Días</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-12 Act_Show justify-content-center  Height30" style="padding: 0;">

                                            @foreach ($incluidos as $incluido)

                                                            <div id="IN" class="Act_Show row justify-content-center align-items-center Height8 H-m-input" >

                                                                <div class="col-8   Height100">
                                                                    <div class="row   Height100">
                                                                        <label for="{{ $incluido->name }}" style="font-size: 0.6rem; color: #707791;">

                                                                            <input style="vertical-align: middle;" id="{{$incluido->sku}}" name="extra[]" type="checkbox" value="{{$incluido->sku}}" />
                                                                            {{ strip_tags($incluido->name) }}

                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-2 justify-content-center align-items-center Height100 P-m-input" style="padding: 0px 30px 0px 10px;">
                                                                    <div class="row justify-content-center align-items-center Height100">
                                                                        <input name="day_{{ $incluido->sku  }}"  type="number" value="1" min="1" max="1000" step="1" class="numb" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-2 justify-content-center align-items-center Height100 P-m-input" style="padding: 0px 30px 0px 10px;">
                                                                    <div class="row justify-content-center align-items-center Height100">
                                                                        <input name="quantity_{{ $incluido->sku  }}"  type="number" value="1" min="1" max="1000" step="1" class="numb" />
                                                                    </div>
                                                                </div>

                                                            </div>

                                            @endforeach
                                    </div>

                                @endif
                            @endfor

                            <div class="col-lg-12 justify-content-center" style="padding: 0; height: 75%;">

                                <div   class="Cabe_ row justify-content-center" style="    height: 25px;">
                                    <div class="col-8 justify-content-center align-items-center Height100" style="padding: 0 2px 0 0;">
                                        <div id="EX" class="row  align-items-center Height100" style="background-color: #c3cbe3">
                                            <p class="I_E" style="margin-left: 15px;">GENERADORES</p>
                                        </div>
                                    </div>
                                    <div class="col-2 justify-content-center align-items-center Height100" style="background-color: #c3cbe3">
                                        <div class="row justify-content-center align-items-center Height100">
                                            <p>Ud</p>
                                        </div>
                                    </div>
                                    <div class="col-2 justify-content-center align-items-center Height100" style="background-color: #c3cbe3">
                                        <div class="row justify-content-center align-items-center Height100">
                                            <p>Días</p>
                                        </div>
                                    </div>
                                </div>

                                <div id="EXTRAS" class="EXTRA Act_Show col-12 justify-content-center Height90" style="padding: 0; margin-top: 10px; overflow: auto; text-align: right;">

                                    @foreach ($extras as $extra)

                                                        <div class="Art row Height8 H-m-input" style="padding: 0;">
                                                            <div class="col-8 justify-content-center Height100">
                                                                <div class="row justify-content-center  Height100">
                                                                    <label for="{{ $extra->name }}">

                                                                        <input style="vertical-align: middle;" id="{{$extra->sku}}" name="extra[]" type="checkbox" value="{{$extra->sku}}" />
                                                                        {{ strip_tags($extra->name) }}

                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 justify-content-center align-items-center Height100 P-m-input" style="     padding:0 20px 0 10px;">
                                                                <div class="row justify-content-center align-items-center Height100">
                                                                    <input name="day_{{ $extra->sku  }}"  type="number" value="1" min="1" max="1000" step="1" class="numb" />
                                                                </div>
                                                            </div>
                                                            <div class="col-2 justify-content-center align-items-center Height100 P-m-input" style="    padding:0 20px 0 10px; ">
                                                                <div class="row justify-content-center align-items-center Height100">
                                                                    <input name="quantity_{{ $extra->sku  }}"  type="number" value="1" min="1" max="1000" step="1" class="numb" />
                                                                </div>
                                                            </div>

                                                        </div>
                                    @endforeach

                                </div>

                            </div>

                    </div>
                </div>
            </form>
            </div>

        @endif

    @endif

    @if ($product->classification_id == 6 )

        <div   class="row justify-content-center align-items-center Height100 P-mtop" style="    padding-top: 6%;">
            <!--Barra de navegacion-->
            @foreach ($clasificaciones as $capa1)

                @if ($capa1->id == $product->classification_id )

                    <nav id="barra_navegacion" class="navbar col-lg-11 offset-1 Height4 Filter" style="padding: 0%;" >
                        <div class="row justify-content-center align-items-center Height100" style="padding:0; width: 100%;">

                            <div class=" col-lg-3 col-6 justify-content-center align-items-center Height100" style="padding:0;">
                                <div class="row justify-content-center align-items-center Height100" style="padding:0;">


                                    @if ($capa1->id == $product->classification_id )

                                        <p class="Marca_submenu"> {{ $capa1->name }}  &nbsp;&nbsp; <i class="fas fa-caret-right"></i></p>

                                    @endif


                                </div>
                            </div>

                            @foreach ($subclasificaciones1 as $capa2)

                                @if ($capa2->id == $product->subclassification_id )

                                    <div class="dropdown col-lg-2 col-6 justify-content-center align-items-center Height100" style="padding:0">
                                        <div class="row  align-items-center Height100" style="padding:0">

                                            <p class="Marca_submenu dropdown-toggle" style="text-transform: capitalize !important;" data-toggle="dropdown">{{  $capa2->name }}&nbsp;&nbsp; </p>
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

                                    <div id="categorias_bold" class="Categorias_submenu col-lg-7 justify-content-center align-items-center Height100" style="padding:0">
                                        <div class="row justify-content-left align-items-left align-items-center Height100" style="padding:0">
                                            <ul class="nav">
                                                @foreach ($subareas as $capa3)
                                                    @if ($capa3->subclassification_id == $capa2->id )
                                                        <li class="nav-item" style="margin-bottom: 5px;">
                                                            <a id="__{{  $capa3->name }}" data-page="{{  $capa3->name }}" class="_{{  $capa3->name }} sub_menu_cat nav-link" href="#{{  $capa3->name }}" >&nbsp; {{  $capa3->name }} &nbsp; | &nbsp;</a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                @endif

                            @endforeach

                        </div>
                    </nav>

                @endif

            @endforeach
                <!--Parte Izquierda producto-->
                <div class="col-md-5 col-12 justify-content-center align-items-center Height100 h-m" style="padding: 0% 5% 5% 5%;">

                    <div   class="Conte_Box row justify-content-center align-items-center Height91" >
                        <div class="col-lg-12 justify-content-center align-items-center" style="padding: 0;padding: 0;margin-top: 40px; height: 40px;">
                            <div   class="row  align-items-left Height100" style="padding: 0;">
                                <h2 class="Prodcut_Show_">{{ $product->name}}</h2>
                            </div>
                        </div>
                        <div class="container_producto">

                            @if ( $product->file )
                                <img class="Product_Img" src="{{ $product->file }}" />

                            @endif



                        </div>

                    </div>

                    <div   class="row justify-content-center align-items-center Height10" style="padding:0% 15% 5% 15%;">

                        <div class="col-lg-12 justify-content-center align-items-center Height100" style="padding: 0;">

                            <form method="post" action="{{ route('cart-add-form') }}">
                                {{ csrf_field() }}

                            <div   class="row justify-content-center align-items-center Height100" style="padding: 0% 5%;">
                                <div class="col-lg-6 offset-3 justify-content-center align-items-center" style="height: 35px; text-align: center; padding:0%; margin:auto;">

                                    <div   class=" row justify-content-center align-items-center Height100"  onclick="ani()">
                                        <input type="submit" id="checkBtn" class="BTN_Add BTN_new" href="{{ url('/cart/add-form/'.$product->sku) }}">
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>

                <!--Parte Derecha producto-->
                <div class="col-md-7 col-12 justify-content-center align-items-center Height100 P-mob" style="padding:10% 9% 3% 2%;">
                    <div   class="row justify-content-center align-items-center Height100" >
                        @for ($i = 0 ; $i < sizeof($incluidos) ; $i++)
                            @if ($i == 0)

                                <div class="Act_Show  col-md-12 justify-content-center" style="padding: 0; height: 7%;">

                                    <div   class="Cabe_ row justify-content-center align-items-center Height100">
                                        <div class="col-8 justify-content-center align-items-center Height100" style="padding: 0 2px 0 0;">
                                            <div class="row justify-content-center align-items-center Height100" style="background-color: #c3cbe3;">
                                                <label  style="width: 100%; margin-bottom: 0px; margin-left:16px;"  for="{{ $product->id  }}">
                                                    <input style="vertical-align: middle;" id="{{ $product->sku  }}" name="extra[]" type="checkbox" value="{{ $product->sku  }}" />
                                                    <p class="btn_filtro_add I_E" style="margin-left: 2px;">{{ $product->name}}</p>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-2 justify-content-center align-items-center Height100" style="background-color: #c3cbe3;">
                                            <div class="row justify-content-center align-items-center Height100">
                                                <p>Ud</p>
                                            </div>
                                        </div>
                                        <div class="col-2 justify-content-center align-items-center Height100" style="background-color: #c3cbe3;">
                                            <div class="row justify-content-center align-items-center Height100">
                                                <p>Días</p>
                                            </div>
                                        </div>

                                    </div>

                                    <div   class="row justify-content-center align-items-center Height20 H-in-m" style="height: 19px;">
                                        <div class="col-8 justify-content-center align-items-center Height100" style="padding: 0 2px 0 0;">
                                        </div>
                                        <div class="col-2 justify-content-center align-items-center Height100 In-m" style="padding: 0 30px 0 10px; margin-top: 15px;">

                                            <input name="day_{{ $product->sku  }}" type="number" value="1" min="1" max="1000" step="1" class="numb" />

                                        </div>
                                        <div class="col-2 justify-content-center align-items-center Height100 In-m" style="padding: 0 30px 0 10px; margin-top: 15px;">
                                            <input name="quantity_{{ $product->sku  }}"  type="number" value="1" min="1" max="1000" step="1" class="numb" />

                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-12 justify-content-center Height30" style="padding: 0;">

                                    <div id="INCLUIDO" class="INCLUIDO col-12 justify-content-center  Height80" style="padding: 1% 3%;  overflow: auto;">

                                        <div   class="row justify-content-center  Height100" >
                                            @foreach ($incluidos as $incluido)


                                                    <div class="col-1 justify-content-center " style="padding: 0; height: 13px; margin-bottom: 4px;">
                                                        <p>{{ $incluido->quantity}}</p>
                                                    </div>

                                                    <div class="col-11 justify-content-center " style="padding: 0; height: 13px; margin-bottom: 4px;">

                                                        <p>{{ $incluido->name }}</p>

                                                    </div>


                                            @endforeach
                                        </div>

                                    </div>

                                </div>

                            @endif
                        @endfor

                        <div class="col-lg-12 justify-content-center" style="padding: 0; height: 75%;">
                            @for ($i = 0 ; $i < sizeof($extras) ; $i++)
                                @if ($i == 0)

                                    <div   class="Cabe_ row justify-content-center" style="    height: 25px;">
                                        <div class="col-8 justify-content-center align-items-center Height100" style="padding: 0 2px 0 0;">
                                            <div id="EX" class="row  align-items-center Height100" style="background-color: #c3cbe3">
                                                @if ($product->subarea->slug == 'toninas' )
                                                    <p class="I_E" style="margin-left: 15px;">Toninas</p>
                                                @else
                                                    <p class="I_E" style="margin-left: 15px;">Extras</p>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-2 justify-content-center align-items-center Height100" style="background-color: #c3cbe3">
                                            <div class="row justify-content-center align-items-center Height100">
                                                <p>Ud</p>
                                            </div>
                                        </div>
                                        <div class="col-2 justify-content-center align-items-center Height100" style="background-color: #c3cbe3">
                                            <div class="row justify-content-center align-items-center Height100">
                                                <p>Días</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="EXTRAS" class="EXTRA Act_Show col-12 justify-content-center Height90" style="padding: 0; margin-top: 10px; overflow: auto; text-align: right;">

                                        @foreach ($extras as $extra)



                                                <div class="Art row Height8 H-m-input" style="padding: 0;">
                                                    <div class="col-8 justify-content-center Height100">
                                                        <div class="row justify-content-center  Height100">
                                                            <label for="{{ $extra->name }}">

                                                                <input style="vertical-align: middle;" id="{{$extra->sku}}" name="extra[]" type="checkbox" value="{{$extra->sku}}" />
                                                                {{ strip_tags($extra->name) }}

                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2 justify-content-center align-items-center Height100 P-m-input" style="     padding:0 20px 0 10px;">
                                                        <div class="row justify-content-center align-items-center Height100">
                                                            <input name="day_{{ $extra->sku  }}"  type="number" value="1" min="1" max="1000" step="1" class="numb" />
                                                        </div>
                                                    </div>
                                                    <div class="col-2 justify-content-center align-items-center Height100 P-m-input" style="    padding:0 20px 0 10px; ">
                                                        <div class="row justify-content-center align-items-center Height100">
                                                            <input name="quantity_{{ $extra->sku  }}"  type="number" value="1" min="1" max="1000" step="1" class="numb" />
                                                        </div>
                                                    </div>

                                                </div>
                                             



                                        @endforeach

                                    </div>

                                @endif
                            @endfor
                        </div>

                    </div>
                </div>

            </form>

        </div>

    @endif

    @if ($product->classification_id == 7 )

        <div   class="row justify-content-center align-items-center Height100 P-mtop" style="    padding-top: 6%;">

            @foreach ($clasificaciones as $capa1)

                @if ($capa1->id == $product->classification_id )

                    <nav id="barra_navegacion" class="navbar col-lg-11 offset-1 Height4 Filter" style="padding: 0%;" >
                        <div class="row justify-content-center align-items-center Height100" style="padding:0; width: 100%;">

                            <div class="col-lg-2 col-6 justify-content-center align-items-center Height100" style="padding:0;">
                                <div class="row justify-content-center align-items-center Height100" style="padding:0;">

                                    <p class="Marca_submenu"> {{ $capa1->name }} &nbsp;&nbsp; <i class="fas fa-caret-right"></i> </p>

                                </div>
                            </div>

                            <div class="dropdown col-lg-2 col-6 justify-content-center align-items-center Height100" style="padding:0">
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


                        </div>
                    </nav>

                @endif

            @endforeach

                <div class="col-md-5 col-12 justify-content-center align-items-center Height100 h-m" style="padding: 0% 5% 5% 5%;">

                    <div   class="Conte_Box row justify-content-center align-items-center Height91" >
                        <div class="col-lg-12 justify-content-center align-items-center" style="padding: 0;padding: 0;margin-top: 40px; height: 40px;">
                            <div   class="row  align-items-left Height100" style="padding: 0;">
                                <h2 class="Prodcut_Show_">{{ $product->name}}</h2>
                            </div>
                        </div>
                        <div class="container_producto">

                            @if ( $product->file )
                                <img class="Product_Img" src="{{ $product->file }}" />

                            @endif

                            <div type=button class="btn-especi justify-content-center align-items-center" data-toggle="modal" data-target="#exampleModalCenter">
                                <p class="justify-content-center align-items-center P-esp">Especificaciones</p>
                            </div>

                        </div>

                    </div>

                    <div   class="row justify-content-center align-items-center Height10" style="padding:0% 15% 5% 15%;">

                        <div class="col-lg-12 justify-content-center align-items-center Height100" style="padding: 0;">

                            <form method="post" action="{{ route('cart-add-form') }}">
                                {{ csrf_field() }}

                            <div   class="row justify-content-center align-items-center Height100" style="padding: 0% 5%;">
                                <div class="col-lg-6 offset-3 justify-content-center align-items-center" style="height: 35px; text-align: center; padding:0%; margin:auto;">

                                    <div   class=" row justify-content-center align-items-center Height100"  onclick="ani()">
                                        <input type="submit" id="checkBtn" class="BTN_Add BTN_new" href="{{ url('/cart/add-form/'.$product->sku) }}">
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-7 col-12 justify-content-center align-items-center Height100 P-mob" style="padding:10% 14% 3% 5%;">
                    <div   class="row justify-content-center align-items-center Height100" >

                        <div class="Act_Show  col-md-12 justify-content-center" style="padding: 0; height: 7%;">

                            <div   class="Cabe_ row justify-content-center align-items-center Height100">
                                <div class="col-8 justify-content-center align-items-center Height100" style="padding: 0 2px 0 0;">
                                    <div class="row justify-content-center align-items-center Height100" style="background-color: #c3cbe3;">
                                        <label  style="width: 100%; margin-bottom: 0px; margin-left:16px;"  for="{{ $product->id  }}">
                                            <input style="vertical-align: middle;" id="{{ $product->sku_add_add  }}" name="extra[]" type="checkbox" value="{{ $product->sku  }}" />
                                            <p class="btn_filtro_add I_E" style="margin-left: 2px;">INCLUIDO</p>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-2 justify-content-center align-items-center Height100" style="background-color: #c3cbe3;">
                                    <div class="row justify-content-center align-items-center Height100">
                                        <p>Ud</p>
                                    </div>
                                </div>
                                <div class="col-2 justify-content-center align-items-center Height100" style="background-color: #c3cbe3;">
                                    <div class="row justify-content-center align-items-center Height100">
                                        <p>Días</p>
                                    </div>
                                </div>

                            </div>

                            <div   class="row justify-content-center align-items-center Height20 H-in-m" style="height: 19px;">
                                <div class="col-8 justify-content-center align-items-center Height100" style="padding: 0 2px 0 0;">
                                </div>
                                <div class="col-2 justify-content-center align-items-center Height100 In-m" style="padding: 0 30px 0 10px; margin-top: 15px;">

                                    <input name="day_{{ $product->sku  }}" type="number" value="1" min="1" max="1000" step="1" class="numb" />

                                </div>
                                <div class="col-2 justify-content-center align-items-center Height100 In-m" style="padding: 0 30px 0 10px; margin-top: 15px;">
                                    <input name="quantity_{{ $product->sku  }}"  type="number" value="1" min="1" max="1000" step="1" class="numb" />

                                </div>
                            </div>

                        </div>

                        <div class="col-lg-12 justify-content-center Height30" style="padding: 0;">

                            <div id="INCLUIDO" class="INCLUIDO col-12 justify-content-center  Height80" style="padding: 1% 3%;  overflow: auto;">

                                <div   class="row justify-content-center  Height100" >
                                    @foreach ($incluidos as $incluido)


                                            <div class="col-1 justify-content-center " style="padding: 0; height: 13px; margin-bottom: 4px;">
                                                <p>{{ $incluido->quantity}}</p>
                                            </div>

                                            <div class="col-11 justify-content-center " style="padding: 0; height: 13px; margin-bottom: 4px;">

                                                        <p>{{ $incluido->name }}</p>

                                            </div>


                                    @endforeach
                                </div>

                            </div>

                        </div>

                        <div class="col-lg-12 justify-content-center align-items-center Height50" style="padding: 0;">


                        </div>

                    </div>
                </div>

            </form>

            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top: 1%;">
                    <div class="modal-content modal_especificaciones">

                        <div class="modal-header">

                            <h5 class="modal-title" id="exampleModalCenterTitle">{{ $product->name }}</h5>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" style="font-size: 20px;">&times;</span>
                            </button>

                        </div>

                        <div class="modal-body">
                            <div class="row-lg-12 justify-content-center align-items-center Height100" style="padding:0% 10% 12% 13%;">

                                <div class="col-lg-12 justify-content-center align-items-center Height10" style="padding:0%;">
                                    <div class="row justify-content-center align-items-center Height100">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Especificaciones</h5>
                                    </div>
                                </div>

                                <div class="col-lg-12 justify-content-center align-items-center Height5_2" style="padding:0% ;">
                                    <div class="row justify-content-center align-items-center Height100">
                                        <p style="background: #151e45; color: #151e45; width: 100%;">.</p>
                                    </div>
                                </div>

                                <div class="col-lg-12  Height85" style="padding: 3% 0 0 0;">
                                    <div class="row  Height100">
                                        <p>{{ $product->technical_specifications }}</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    @endif

@endsection

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function () {
            $('#checkBtn').click(function() {
            checked = $("input[type=checkbox]:checked").length;

            if(!checked) {
                alert("Debe marcar al menos una opción (CheckBox).");
                return false;
            }

            });
        });

    </script>

    <script>
        $(document).ready(function() {
            $("#intro").addClass("backgroud_1");
        });
    </script>

@endsection
