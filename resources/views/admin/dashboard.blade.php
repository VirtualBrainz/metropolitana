@extends('admin.master')
@section('title', 'Dashboard')

@section('content')

    <div class="container-fluid">
        @if (kvfj(Auth::user()->permissions, 'dashboard_small_stats'))
            <div class="panel shadow">

                <div class="header">
                    <h2 class="title">
                        <i class="fas fa-chart-bar"></i>
                        Estadísticas
                    </h2>
                </div>

            </div>

            <div class="row mt16">


                <div class="col-md-3">
                    <div class="container-fluid">
                        <div class="panel shadow">
                            <div class="header">
                                <h2 class="title">
                                    <i class="fas fa-users">
                                        Usuarios resgistrados
                                    </i>
                                </h2>
                            </div>
                            <div class="inside">
                                <div class="big_count">
                                    {{ $users }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="container-fluid">
                        <div class="panel shadow">
                            <div class="header">
                                <h2 class="title">
                                    <i class="fas fa-globe">
                                        Subclasificaciones listadas
                                    </i>
                                </h2>
                            </div>
                            <div class="inside">
                                <div class="big_count">
                                    {{ $subclasificaciones }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="container-fluid">
                        <div class="panel shadow">
                            <div class="header">
                                <h2 class="title">
                                    <i class="fas fa-globe">
                                        Subareas listadas
                                    </i>
                                </h2>
                            </div>
                            <div class="inside">
                                <div class="big_count">
                                    {{ $subarea }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="container-fluid">
                        <div class="panel shadow">
                            <div class="header">
                                <h2 class="title">
                                    <i class="fas fa-warehouse">
                                        Almacenes listados
                                    </i>
                                </h2>
                            </div>
                            <div class="inside">
                                <div class="big_count">
                                    {{ $warehouse }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row mt16">

                <div class="col-md-3">
                    <div class="container-fluid">
                        <div class="panel shadow">
                            <div class="header">
                                <h2 class="title">
                                    <i class="fas fa-boxes">
                                        Productos listados
                                    </i>
                                </h2>
                            </div>
                            <div class="inside">
                                <div class="big_count">
                                    {{ $products }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="container-fluid">
                        <div class="panel shadow">
                            <div class="header">
                                <h2 class="title">
                                    <i class="fas fa-layer-group">
                                       Familias
                                    </i>
                                </h2>
                            </div>
                            <div class="inside">
                                <div class="big_count">
                                    {{ $familias }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="container-fluid">
                        <div class="panel shadow">
                            <div class="header">
                                <h2 class="title">
                                    <i class="fab fa-uikit">
                                        Kits
                                    </i>
                                </h2>
                            </div>
                            <div class="inside">
                                <div class="big_count">
                                    {{ $kits }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                        <div class="container-fluid">
                        <div class="panel shadow">
                            <div class="header">
                                <h2 class="title">
                                    <i class="far fa-object-group">
                                        Listado de Carousels
                                    </i>
                                </h2>
                            </div>
                            <div class="inside">
                                <div class="big_count">
                                    {{ $carousel }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row mt16">

                <div class="col-md-3">
                    <div class="container-fluid">
                        <div class="panel shadow">
                            <div class="header">
                                <h2 class="title">
                                    <i class="far fa-file-image">
                                        Filmografía listada
                                    </i>
                                </h2>
                            </div>
                            <div class="inside">
                                <div class="big_count">
                                    {{ $filmografia }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="container-fluid">
                        <div class="panel shadow">
                            <div class="header">
                                <h2 class="title">
                                    <i class="fas fa-newspaper">
                                       Noticias listadas
                                    </i>
                                </h2>
                            </div>
                            <div class="inside">
                                <div class="big_count">
                                    {{ $news }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                        <div class="container-fluid">
                        <div class="panel shadow">
                            <div class="header">
                                <h2 class="title">
                                    <i class="fas fa-clipboard-check">
                                        Cotizaciones atendidas
                                    </i>
                                </h2>
                            </div>
                            <div class="inside">
                                <div class="big_count">
                                    {{ $cotizacionesall }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="container-fluid">
                        <div class="panel shadow">
                            <div class="header">
                                <h2 class="title">
                                    <i class="fas fa-clipboard-list">
                                        Cotizaciones pendientes
                                    </i>
                                </h2>
                            </div>
                            <div class="inside">
                                <div class="big_count">
                                    {{ $cotizaciones }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        @endif
    </div>

@endsection
