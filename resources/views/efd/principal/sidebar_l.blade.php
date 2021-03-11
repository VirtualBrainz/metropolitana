<div id="menu-izq" class="row Height95" style="padding: 0%;">
    <div id="menu-2-izq" class="col-12 justify-content-center align-items-center Height100 PAGE2" style="padding: 0% 0% 0% 0%;">
        <div  class=" row justify-content-center align-items-center Height100 Height100" style="padding: 0%;">

            <!--logo-->
            <div class=" col-12   justify-content-center align-items-center Height20" style="padding: 0%;">
                <div class="row justify-content-center align-items-center Height100">
                    <a href="/"  class="EFD_Logo">

                    </a>
                </div>
            </div>

            <!--menu-->

            <div  class=" col-12  justify-content-center align-items-center Height80 " style="    margin-top: 10%; padding: 0%;">
                <div  class=" row justify-content-center align-items-center Height100" style="padding: 0%;">

                    <li class="li col-12  justify-content-center align-items-center Height100 dropdown" style="margin-top: 0px; ">

                        <div  class="row justify-content-center align-items-center Height100" role="button" aria-expanded="false">

                            <div class="col-lg-12 justify-content-center align-items-center Height60" style="padding: 0%;">

                                <div  class="row justify-content-center align-items-center Height100" role="button" aria-expanded="false">
                                    <div class="menu_ menu_camara"></div>
                                    <div class="menu_ menu_camara_gif"></div>
                                </div>

                            </div>

                            <div class="col-lg-12 justify-content-center align-items-center Height40 Texto_izq" style="padding: 0%;">
                                <p>CÁMARAS</p>
                            </div>

                        </div>

                        <ul class="dropdown-menu " role="menu">

                                @foreach ($subclasificaciones as $subclasificacion)
                                    @if ($subclasificacion->classification_id == "1" )
                                        <li class="col-12  justify-content-center align-items-center Height100" style="margin-top: 0px; padding: 0%;">
                                            <div  class="row justify-content-center align-items-center Height100" role="button" aria-expanded="false">
                                                <a  href="{{ route('camaras', "$subclasificacion->slug") }}" class="dropdown-item categoria_menu" style="text-align:end;">{{ $subclasificacion->name }}</a>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach

                        </ul>

                    </li>

                    <li class="li col-12  justify-content-center align-items-center Height100 dropdown" style="margin-top: 0px; ">

                        <div class="row justify-content-center align-items-center Height100" role="button" aria-expanded="false">

                            <div class="col-lg-12 justify-content-center align-items-center Height60" style="padding: 0%;">
                                <div  class="row justify-content-center align-items-center Height100" role="button" aria-expanded="false">
                                        <div class="menu_ menu_optica"></div>
                                        <div class="menu_ menu_optica_gif"></div>
                                </div>
                            </div>

                            <div class="col-lg-12justify-content-center align-items-center Height40 Texto_izq" style="padding: 0%;">
                                <p>ÓPTICA</p>
                            </div>

                        </div>

                        <ul class="dropdown-menu " role="menu">
                        @foreach ($subclasificaciones as $subclasificacion)
                                    @if ($subclasificacion->classification_id == "2" )
                                        <li class="col-12  justify-content-center align-items-center Height100" style="margin-top: 0px; padding: 0%;">
                                            <div  class="row justify-content-center align-items-center Height100" role="button" aria-expanded="false">
                                                <a  href="{{ route('optica', "$subclasificacion->slug") }}" class="dropdown-item categoria_menu" style="text-align:end;">{{ $subclasificacion->name }}</a>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                        </ul>

                    </li>

                    <li class="li col-12  justify-content-center align-items-center Height100 dropdown" style="margin-top: 0px; ">

                        <div class="row justify-content-center align-items-center Height100" role="button" aria-expanded="false">

                            <div class="col-lg-12 justify-content-center align-items-center Height60" style="padding: 0%;">
                                <div  class="row justify-content-center align-items-center Height100" role="button" aria-expanded="false">
                                    <div class="menu_ menu_accesorios-y-filtros"></div>
                                    <div class="menu_ menu_accesorios-y-filtros_gif"></div>
                                </div>
                            </div>

                            <div class="col-lg-12justify-content-center align-items-center Height40 Texto_izq" style="padding: 0%;">
                                <p>ACCESORIOS Y FILTROS</p>
                            </div>


                        </div>

                        <ul class="dropdown-menu " role="menu">
                            @foreach ($subclasificaciones as $subclasificacion)
                                @if ($subclasificacion->classification_id == "3" )
                                    <li class="col-12  justify-content-center align-items-center Height100" style="margin-top: 0px; padding: 0%;">
                                        <div  class="row justify-content-center align-items-center Height100" role="button" aria-expanded="false">
                                            <a  href="{{ route('accesorios-filtros', "$subclasificacion->slug") }}" class="dropdown-item categoria_menu" style="text-align:end;">{{ $subclasificacion->name }}</a>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>

                    </li>

                    <li class="li col-12  justify-content-center align-items-center Height100 dropdown" style="margin-top: 0px; ">

                        <div class="row justify-content-center align-items-center Height100" role="button" aria-expanded="false">

                            <div class="col-lg-12 justify-content-center align-items-center Height60" style="padding: 0%;">
                                <div  class="row justify-content-center align-items-center Height100" role="button" aria-expanded="false">
                                    <div class="menu_ menu_iluminacion" style="background-size: 57% auto !important;"></div>
                                    <div class="menu_ menu_iluminacion_gif" style="background-size: 57% auto !important;"></div>
                                </div>
                            </div>

                            <div class="col-lg-12justify-content-center align-items-center Height40 Texto_izq" style="padding: 0%;">
                                <p>ILUMINACIÓN</p>
                            </div>

                        </div>

                        <ul class="dropdown-menu" role="menu">
                            @foreach ($subclasificaciones as $subclasificacion)
                                @if ($subclasificacion->classification_id == "4" )
                                    <li class="col-12  justify-content-center align-items-center Height100" style="margin-top: 0px; padding: 0%;">
                                        <div  class="row justify-content-center align-items-center Height100" role="button" aria-expanded="false">
                                            <a  href="{{ route('iluminacion', "$subclasificacion->slug") }}" class="dropdown-item categoria_menu" style="text-align:end;">{{ $subclasificacion->name }}</a>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>

                    </li>

                    <li class="li col-12  justify-content-center align-items-center Height100 dropdown" style="margin-top: 0px; ">

                        <div class="row justify-content-center align-items-center Height100" role="button" aria-expanded="false">

                            <div class="col-lg-12 justify-content-center align-items-center Height60" style="padding: 0%;">
                                <div  class="row justify-content-center align-items-center Height100" role="button" aria-expanded="false">
                                    <div class="menu_ menu_moviles-y-plantas"></div>
                                    <div class="menu_ menu_moviles-y-plantas_gif"></div>
                                </div>
                            </div>

                            <div class="col-lg-12justify-content-center align-items-center Height40 Texto_izq" style="padding: 0%;">
                                <p>MÓVILES Y PLANTAS</p>
                            </div>

                        </div>

                        <ul class="dropdown-menu" role="menu">
                            @foreach ($subclasificaciones as $subclasificacion)
                                @if ($subclasificacion->classification_id == "5" )
                                    <li class="col-12  justify-content-center align-items-center Height100" style="margin-top: 0px; padding: 0%;">
                                        <div  class="row justify-content-center align-items-center Height100" role="button" aria-expanded="false">
                                            <a  href="{{ route('moviles-plantas', "$subclasificacion->slug") }}" class="dropdown-item categoria_menu" style="text-align:end;">{{ $subclasificacion->name }}</a>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>

                    </li>

                    <li class="li col-12  justify-content-center align-items-center Height100 dropdown" style="margin-top: 0px; ">

                        <div class="row justify-content-center align-items-center Height100" role="button" aria-expanded="false">

                            <div class="col-lg-12 justify-content-center align-items-center Height60" style="padding: 0%;">
                                <div  class="row justify-content-center align-items-center Height100" role="button" aria-expanded="false">
                                        <div class="menu_ menu_gruas-dollies-cabezas-remotas"></div>
                                        <div class="menu_ menu_gruas-dollies-cabezas-remotas_gif"></div>
                                </div>
                            </div>

                            <div class="col-lg-12justify-content-center align-items-center Height40 Texto_izq" style="padding: 0%;">
                                <p>GRÚAS DOLLIES</p>
                                <p>CABEZAS REMOTAS</p>
                            </div>

                        </div>

                        <ul class="dropdown-menu" role="menu">
                            @foreach ($subclasificaciones as $subclasificacion)
                                @if ($subclasificacion->classification_id == "6" )
                                    <li class="col-12  justify-content-center align-items-center Height100" style="margin-top: 0px; padding: 0%;">
                                        <div  class="row justify-content-center align-items-center Height100" role="button" aria-expanded="false">
                                            <a  href="{{ route('gruas-dollies-cabezas-remotas', "$subclasificacion->slug") }}" class="dropdown-item categoria_menu" style="text-align:end;">{{ $subclasificacion->name }}</a>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>

                    </li>

                    <li class="li col-12  justify-content-center align-items-center Height100" style="margin-top: 10px; ">
                        <a href="{{ route('motion') }}">
                            <div class="row justify-content-center align-items-center Height100">

                                <div class="col-lg-12 justify-content-center align-items-center Height60" style="padding: 0%;">
                                    <div  class="row justify-content-center align-items-center Height100">
                                        <div class="menu_ menu_motion-control" style="background-size: 57% auto !important;"></div>
                                        <div class="menu_ menu_motion-control_gif" style="background-size: 57% auto !important;"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12justify-content-center align-items-center Height40 Texto_izq" style="padding: 0%;">
                                    <p>MOTION CONTROL</p>
                                </div>

                            </div>
                        </a>

                    </li>

                    <li class="li col-12  justify-content-center align-items-center Height100" style="margin-top: 0px; ">
                        <a href="{{ route('personal') }}">
                            <div class="row justify-content-center align-items-center Height100">

                                <div class="col-lg-12 justify-content-center align-items-center Height60" style="padding: 0%;">
                                    <div  class="row justify-content-center align-items-center Height100" role="button" aria-expanded="false">
                                        <div class="menu_ menu_personal"></div>
                                        <div class="menu_ menu_personal_gif"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12justify-content-center align-items-center Height40 Texto_izq" style="padding: 0%;">
                                    <p>PERSONAL</p>

                                </div>

                            </div>
                        </a>
                    </li>

                </div>
            </div>

        </div>
    </div>
</div>
