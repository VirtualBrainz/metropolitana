<nav id="barra_navegacion" class="navbar col-12 Height4 Filter" style="padding: 0%;" >
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
                                    @if ($capa3->subclassification_id == $capa2->id )
                                        <li class="nav-item" style="margin-bottom: 5px;">   <a  id="__{{  $capa3->name }}" data-page="{{  $capa3->name }}" class="_{{  $capa3->name }} sub_menu_cat nav-link" href="#{{  $capa3->name }}" >&nbsp; {{  $capa3->name }} &nbsp; | &nbsp;</a></li>
                                    @endif
                                @endforeach

                            </ul>
                        </div>
                    </div>

                @endif
            @endforeach
        @endforeach
    </div>

</nav>
