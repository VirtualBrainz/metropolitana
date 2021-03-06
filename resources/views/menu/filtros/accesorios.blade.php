@extends('master')
@section('title', 'filtros y accesorios')
<!--Generadores -->
@section('content')

    @foreach($subclasificaciones1 as $subclassication)

        @if ($subclassication->slug == "accesorios-af" )

            <div class="container justify-content-center align-items-center Height100" style="padding: 0%; z-index: 98;">
                <div class="row justify-content-center align-items-center Height100 P-mtop" style="padding: 3% 0 0 0">

                    @include('efd.principal.subnavbar')
                    @foreach ($subclasificaciones1 as $subclasificacion)
                        @foreach ($subareas as $subarea)
                            @if ($subarea->subclassification_id == $subclasificacion->id )

                                <section id="{{  $subarea->name }}" data-index="{{  $subarea->name }}" class="{{  $subarea->name }} camaras_body" style="margin-top: 1%; padding: 3% 5% 4% 5%; z-index: 98;">

                                    <div class="row  align-items-left Height20">
                                        <h6 class="Title_categoria_">{{ $subarea->name }}</h6>
                                    </div>

                                    <div class="row justify-content-center align-items-center Height40">

                                        @foreach ($kits as $product)

                                            @if ($product->subarea_id == $subarea->id )

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

                            @endif
                        @endforeach
                    @endforeach

                </div>
            </div>

        @else

            <div  class="container justify-content-center align-items-center Height100" style="padding: 0%; z-index: 98;">
                <div class="row justify-content-center align-items-center Height100 P-mtop" style="padding:6% 0 0 0;">

                    @include('efd.principal.subnavbar')

                    <section class="col-lg-12  justify-content-center align-items-center Height60 filtro" style="padding: 0;">
                        <div class="row justify-content-center align-items-center Height20">
                            <h4 style="margin:0%;">Filtros</h4>
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
                                                <div class="col-12 justify-content-center align-items-center menu menu__" style="text-align: center;">
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
                                                                                        <p style="margin: 0;">D??as</p>
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

        @endif

    @endforeach
@endsection


@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#checkBtn').click(function() {
        checked = $("input[type=checkbox]:checked").length;

        if(!checked) {
            alert("Debe marcar al menos una opci??n (CheckBox).");
            return false;
        }

        });
    });

</script>
    <script>
        $(document).ready(function(){
            $("#intro").addClass("backgroud_1");
        });
    </script>



@endsection
