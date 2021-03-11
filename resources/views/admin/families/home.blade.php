@extends('admin.master')
@section('title', 'Familias')

@section('breadcrumb')

    <li class="breadcrumb-item">
        <a href="{{ url('/admin/families') }}">
            <i class="far fas fa-layer-group"></i>
            Familias
        </a>
    </li>

@endsection

@section('content')

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-7">
                <div class="container-fluid">
                    <div class="panel shadow">
                            <div class="header">
                                <h2 class="title">
                                    <i class="fas fa-plus"></i>
                                    Agregar familia
                                </h2>
                            </div>
                        <div class="inside">

                            @if (kvfj(Auth::user()->permissions, 'families_add'))

                                {!! Form::open(['url' => '/admin/family/add', 'files' => true]) !!}

                                    <div class="row" style="padding: 16px;">


                                        <div class="col-md-7">

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

                                        <div class="col-md-5">

                                            {!! Form::label('file','Imagen:') !!}
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    {!! Form::file('file', ['class' => 'custom-file-input', 'id' => 'customFile']) !!}
                                                    <label class="custom-file-label" for="customFile">Choose File</label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-7 mt16">

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

                                        <div class="col-md-5 mt16">

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
                                        <div class="col-md-7 mt16">

                                            {!! Form::label('subarea','Subarea:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <select class="custom-select" id="subarea" name="subarea">
                                                            @foreach ($subarea as $key => $subar)
                                                                <option id="{{ $subar->id }}" name="{{ $subar->id }}" value="{{ $subar->id }}">{{ $subar->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </span>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="col-md-5 mt16">

                                            {!! Form::label('warehouses','Subclasificación:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <select class="custom-select" id="warehouses" name="warehouses">
                                                            @foreach ($warehouses as $key => $warehouse)
                                                                <option id="{{ $warehouse->id }}" name="{{ $warehouse->id }}" value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
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
            </div>

            <div class="col-md-5">
                <div class="panel shadow" style="max-height: 477px;">

                    <div class="header">
                        <h2 class="title">
                            <i class="fas fa-layer-group"></i>
                            Familias
                        </h2>
                    </div>
                    <div class="inside" style="overflow: auto; height: 90%;">
                        <div class="row" style="padding: 16px;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Nombre</td>
                                        <td>Clasificación</td>
                                        <td>Edo</td>
                                        <td width="150"></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cats as $cat)
                                        <tr>
                                            <td>{{ $cat->name }}</td>
                                            <td>{{ $cat->classification->name }}</td>
                                            <td>
                                                @if ($cat->status == '1')
                                                    <i class="fas fa-globe-americas" style="color: green;"></i>
                                                @else
                                                    <i class="fas fa-globe-americas" style="color: red;"></i>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="opts">
                                                    @if (kvfj(Auth::user()->permissions, 'families_edit'))
                                                        <a href="{{ url('/admin/family/'.$cat->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                                            <i class="fas fa-edit" style="color: #ffc107;"></i>
                                                        </a>
                                                    @endif
                                                    @if (kvfj(Auth::user()->permissions, 'families_delete'))
                                                        <a href="{{ url('/admin/family/'.$cat->id.'/delete') }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
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


