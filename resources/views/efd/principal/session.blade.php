@if(Auth::check())
    <li class="dropdown">
        <a id="use" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <i class="fa fa-user I_m ico_bus" style="color: rgba(0,0,0,0);"></i>
            @if (is_null(Auth::user()->avatar))
                <img src="{{ asset('media/iconos/avatar.png') }}" alt="" class="avatar-user">
            @else

                <img src="{{ asset('multimedia/avatar/'.Auth::user()->id.'/'.Auth::user()->avatar ) }}" alt="" class="avatar-user">

            @endif
        </a>
        <ul class="dropdown-menu dropdown-menu-user" role="menu" style="box-shadow: 0px 0px 1px 0px rgba(0, 0, 0, .15) !important; border-radius: 1px 1px 1px 1px !important;">
            @if ( Auth::user()->role == "1" )

                <li>
                    <a href="{{ url('/admin') }}" data-toggle="tooltip" class="us" data-placement="top" title="Salir">
                        <i class="fas fa-chalkboard-teacher"></i> Administración
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
            @endif

            <li>
                <a href="{{ route('user-profile', Auth::user()->id) }}" class="us" data-toggle="tooltip" data-placement="top" title="Editar Perfil">
                   <i class="fas fa-cog"></i> Perfil
                </a>
            </li>
            <li>
                <a href="{{ url('/logout') }}" data-toggle="tooltip" class="us" data-placement="top" title="Salir">
                    <i class="fas fa-sign-out-alt "></i> Salir
                </a>
            </li>
        </ul>
    </li>
@else
    <li class="dropdown">
        <a id="use" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <i class="fa fa-user I_m ico_bus"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-user" role="menu" style="box-shadow: 1px 1px 1px 0px rgba(0, 0, 0, .15) !important;">
            <li><a href="{{ url('/login') }}" class="us">Iniciar sesión</a></li>
        </ul>
    </li>
@endif
