@extends('admin.master')
@section('title', 'Almacénes')

@section('breadcrumb')

    <li class="breadcrumb-item">
        <a href="{{ url('/admin/warehouses') }}">
            <i class="fas fa-warehouse"></i>
            Almacénes
        </a>
    </li>

@endsection

@section('content')

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-5">
                <div class="container-fluid">
                    <div class="panel shadow">

                            <div class="header">
                                <h2 class="title">
                                    <i class="fas fa-plus"></i>
                                    Agregar almacén
                                </h2>
                            </div>

                        <div class="inside" style="overflow: auto; height: 446px;">

                            @if (kvfj(Auth::user()->permissions, 'warehouses_add'))

                                {!! Form::open(['url' => '/admin/warehouse/add']) !!}

                                    <div class="row" style="padding: 16px;">

                                        <div class="col-md-12 ">

                                            {!! Form::label('name','Nombre:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-keyboard"></i>
                                                    </span>
                                                </div>
                                                {!! Form::text('name', null, [ 'class' => 'form-control']) !!}
                                            </div>

                                        </div>
                                        <div class="col-md-12 mt16">

                                            {!! Form::label('direction','Dirección:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-map-marker"></i>
                                                    </span>
                                                </div>
                                                {!! Form::text('direction', null, [ 'class' => 'form-control']) !!}
                                            </div>

                                        </div>
                                        <div class="col-md-12 mt16">

                                            {!! Form::label('phone_1','Teléfono 1:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-phone"></i>
                                                    </span>
                                                </div>
                                                {!! Form::number('phone_1', null, [ 'class' => 'form-control']) !!}
                                            </div>

                                        </div>
                                        <div class="col-md-12 mt16">

                                            {!! Form::label('phone_2','Teléfono 2:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-phone"></i>
                                                    </span>
                                                </div>
                                                {!! Form::number('phone_2', null, [ 'class' => 'form-control']) !!}
                                            </div>

                                        </div>
                                        <div class="col-md-12 mt16">

                                            {!! Form::label('email','Email:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-at"></i>
                                                    </span>
                                                </div>
                                                {!! Form::email('email', null, [ 'class' => 'form-control']) !!}
                                            </div>

                                        </div>


                                    </div>

                                    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}

                                {!! Form::close() !!}

                            @endif

                        </div>

                    </div>
                </div>
            </div>


            <div class="col-md-7">
                <div class="container-fluid">
                    <div class="panel shadow">

                        <div class="header">
                            <h2 class="title">
                                <i class="fas fa-warehouse"></i>
                                Almacén
                            </h2>
                        </div>

                        <div class="inside" style="max-height: 400px; overflow: auto;">
                            <div class="row" style="padding: 16px;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td width="120">Nombre</td>
                                            <td>Dirección</td>
                                            <td width="140"></td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($cats as $cat)
                                            <tr>
                                                <td>{{ $cat->name }}</td>
                                                <td>{{ $cat->direction }}</td>
                                                <td>
                                                    <div class="opts">
                                                        @if (kvfj(Auth::user()->permissions, 'warehouses_edit'))
                                                            <a href="{{ url('/admin/warehouse/'.$cat->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                                                <i class="fas fa-edit" style="color: #ffc107;"></i>
                                                            </a>
                                                        @endif
                                                        @if (kvfj(Auth::user()->permissions, 'warehouses_delete'))
                                                            <a href="{{ url('/admin/warehouse/'.$cat->id.'/delete') }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                                                <i class="fas fa-trash-alt" style="color: red;"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
