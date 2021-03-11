@extends('admin.master')
@section('title', 'Permisos de usuario')
@section('breadcrumb')

    <li class="breadcrumb-item">
        <a href="{{ url('/admin/users/'.$user->status) }}">
            <i class="fas fa-user-friends"></i>
            Usuarios
        </a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/user/'.$user->id.'/permissions' ) }}">
            <i class="fas fa-cogs"></i>
            Permisos del usario: {{ $user->name }} {{ $user->lastname }}
        </a>
    </li>

@endsection
@section('content')

    <div class="container-fluid">

        <div class="page_user">
            <form action="{{ url('/admin/user/'.$user->id.'/permissions') }}" method="POST">
                @csrf
                <div class="row">
                    @include('admin.users.permissions.module_dashboard')
                    @include('admin.users.permissions.module_quotes')
                    @include('admin.users.permissions.module_users')
                </div>

                <div class="row mt16">
                    @include('admin.users.permissions.module_warehouses')
                    @include('admin.users.permissions.module_subclassifications')
                    @include('admin.users.permissions.module_subareas')
                </div>

                <div class="row mt16">
                    @include('admin.users.permissions.module_products')
                    @include('admin.users.permissions.module_kits')
                    @include('admin.users.permissions.module_families')
                </div>

                <div class="row mt16">
                    @include('admin.users.permissions.module_carousel')
                    @include('admin.users.permissions.module_filmography')
                    @include('admin.users.permissions.module_news')
                </div>



                <div class="row mt16">

                    <div class="col-md-12">
                        <div class="container-fluid">
                            <div class="panel shadow">
                                <div class="inside">
                                    <input type="submit" value="Guardar" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </form>
        </div>

    </div>

@endsection

