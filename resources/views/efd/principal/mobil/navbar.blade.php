<nav id="mobil" class="row justify-content-center align-items-center Height10" style="background-color: #fff !important;     position: fixed;     top: 0;    z-index: 999;    width: 100%; " >

    <div id="intro" class="col-lg-12 col-sm-12 Height100 M_p navbar navbar-expand-lg " style="padding: 1% 0 0 0;">

        <ul class="navbar-nav mr-auto" style="padding: 0%; width: 100%; height: 100%;" >


            <div  class="nav-item col-12 Height100" style="padding: 0;">
                <div class="row justify-content-center align-items-center Height100">

                    <div  class="col-4 Height100">
                        <div class="row justify-content-center align-items-center Height100">

                        </div>
                    </div>

                    <div  class="col-2 Height100">
                        <div class="row justify-content-center align-items-center Height100">

                            <div>
                                <i class="fas fa-search ico_bus"></i>
                            </div>
                        </div>
                    </div>

                    <div  class="col-1 Height100">
                        <div class="row justify-content-center align-items-center Height100">
                            <a id="map" href="#">
                                <i class="fas fa-map-marker-alt I_m ico_bus"></i>
                             </a>
                        </div>
                    </div>

                    <div  class="col-2 Height100">
                        <div class="row justify-content-center align-items-center Height100">

                            @if (count(session('cart')) != "0")
                                <a id="truck" href="{{ route('cart-show') }}">
                                    <i class="fas fa-truck I_m ico_bus"></i>
                                </a>
                                <div class="circle_item">
                                    <p> {{ count(session('cart')) }}</p>
                                </div>
                            @else
                                <a id="truck" href="{{ route('cart-show') }}">
                                    <i class="fas fa-truck I_m ico_bus"></i>
                                </a>
                            @endif
                        </div>
                    </div>

                    <div  class="col-2 Height100">
                        <div class="row justify-content-center align-items-center Height100">
                            @include('efd.principal.sessionmob')
                        </div>
                    </div>

                    <div class="col-1 Height100" style="cursor: pointer;">
                        <div class="row justify-content-center align-items-center Height100">
                            <div id="menu_bur" onclick="toggleSidebar()" >
                                <i class="fas fa-bars I_m ico_bus" ></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </ul>

    </div>

</nav>

