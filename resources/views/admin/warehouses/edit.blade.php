@extends('admin.master')
@section('title', 'Editar Almacéne')

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
                                    Editar almacén
                                </h2>
                            </div>

                        <div class="inside">

                            @if (kvfj(Auth::user()->permissions, 'warehouses_add'))

                                {!! Form::open(['url' => '/admin/warehouse/'.$cat->id.'/edit']) !!}

                                    <div class="row" style="padding: 16px;">

                                        <div class="col-md-12 ">

                                            {!! Form::label('name','Nombre:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-keyboard"></i>
                                                    </span>
                                                </div>
                                                {!! Form::text('name', $cat->name, [ 'class' => 'form-control']) !!}
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
                                                {!! Form::text('direction', $cat->direction, [ 'class' => 'form-control']) !!}
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
                                                {!! Form::number('phone_1', $cat->phone_1, [ 'class' => 'form-control']) !!}
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
                                                {!! Form::number('phone_2', $cat->phone_2, [ 'class' => 'form-control']) !!}
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
                                                {!! Form::email('email', $cat->email, [ 'class' => 'form-control']) !!}
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

        </div>

    </div>

@endsection
