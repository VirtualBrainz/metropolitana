<div id="menumobil" class="row   Height15" style="padding: 0%; margin-top: 30px;">
    <div class="col-12   Height100" style="padding: 0% 0% 0% 0%;">
        <div  class=" row   Height100" style="padding: 0%;">

            <!--logo-->
            <div class=" col-3     Height100" style="padding: 0%;">
                <div class="row   Height100">
                    <a href="/"  class="EFD_Logo">
                    </a>
                </div>
            </div>
            <div class=" col-9 justify-content-center align-items-center   Height100 scrollmenu" style="padding: 0%;">

                    <a class="EFD_cam" href="{{ url($camaras->classification->slug.'/'.$camaras->slug) }}">
                        </a>
                    <a class="EFD_op" href="{{url($optica->classification->slug.'/'. $optica->slug)  }}">
                        </a>
                    <a class="EFD_fil" href="{{url($filtros->classification->slug.'/'. $filtros->slug) }} ">
                        </a>
                    <a class="EFD_il" href="{{url($iluminacion->classification->slug.'/'. $iluminacion->slug) }}">
                        </a>
                    <a class="EFD_mov" href="{{url($moviles->classification->slug.'/'. $moviles->slug) }}">
                        </a>
                    <a class="EFD_gru" href="{{url($gruas->classification->slug.'/'. $gruas->slug) }}">
                        </a>
                    <a class="EFD_mot" href="{{ route('motion') }}">
                        </a>
                    <a class="EFD_per" href="{{ route('personal') }}">
                        </a>

            </div>
        </div>
    </div>
</div>

