@extends('admin.master')
@section('title', 'Subareas')

@section('breadcrumb')

    <li class="breadcrumb-item">
        <a href="{{ url('/admin/subareas') }}">
            <i class="far fa-folder-open"></i>
            Subareas
        </a>
    </li>

@endsection

@section('content')

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-4">
                <div class="panel shadow">
                        <div class="header">
                            <h2 class="title">
                                <i class="fas fa-plus"></i>
                                Agregar subarea
                            </h2>
                        </div>
                    <div class="inside" >

                        @if (kvfj(Auth::user()->permissions, 'subareas_add'))

                            {!! Form::open(['url' => '/admin/subarea/add']) !!}

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

                                        {!! Form::label('classification','Clasificación:') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <select class="custom-select" id="classification" name="classification">
                                                        @foreach ($clasi as $key => $clasifica)
                                                            <option id="{{ $clasifica->id }}" name="{{ $clasifica->id }}" value="{{ $clasifica->id }}">{{ $clasifica->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </span>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12 mt16">

                                        {!! Form::label('subclassification','Subclasificación:') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <select class="custom-select" id="subclassification" name="subclassification">
                                                        @foreach ($subclasi as $key => $subclasifica)
                                                            <option id="{{ $subclasifica->id }}" name="{{ $subclasifica->id }}" value="{{ $subclasifica->id }}">{{ $subclasifica->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </span>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                {!! Form::submit('Guardar', ['class' => 'btn btn-success mt16']) !!}

                            {!! Form::close() !!}

                        @endif

                    </div>

                </div>
            </div>

            <div class="col-md-8">
                <div class="panel shadow">

                    <div class="header">
                        <h2 class="title">
                            <i class="far fa-folder-open"></i>
                            Subareas
                        </h2>
                    </div>
                    <div class="inside" style="max-height: 400px; overflow: auto;">
                        <div class="row" style="padding: 16px;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Nombre</td>
                                        <td>Clasificación</td>
                                        <td width="140"></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cats as $cat)
                                        <tr>
                                            <td>{{ $cat->name }}</td>
                                            <td>{{ $cat->classification->name }}</td>
                                            <td>
                                                <div class="opts">
                                                    @if (kvfj(Auth::user()->permissions, 'subareas_edit'))
                                                        <a href="{{ url('/admin/subarea/'.$cat->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                                            <i class="fas fa-edit" style="color: #ffc107;"></i>
                                                        </a>
                                                    @endif
                                                    @if (kvfj(Auth::user()->permissions, 'subareas_delete'))
                                                        <a href="{{ url('/admin/subarea/'.$cat->id.'/delete') }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
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

@stop


