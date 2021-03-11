@extends('admin.master')
@section('title', 'Ediat kit')

@section('breadcrumb')

    <li class="breadcrumb-item">
        <a href="{{ url('/admin/kits') }}">
            <i class="far fa-folder-open"></i>
            Kits
        </a>
    </li>

@endsection

@section('content')

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-9">
                <div class="container-fluid">
                    <div class="panel shadow">
                            <div class="header">
                                <h2 class="title">
                                    <i class="fas fa-plus"></i>
                                    Editar kit
                                </h2>
                            </div>
                        <div class="inside">

                            @if (kvfj(Auth::user()->permissions, 'kits_add'))

                                {!! Form::open(['url' => '/admin/kit/'.$cat->id.'/edit', 'files' => true]) !!}

                                    <div class="row" style="padding: 16px;">

                                        <div class="col-md-5 ">

                                            {!! Form::label('sku','Sku:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-barcode"></i>
                                                    </span>
                                                </div>
                                                {!! Form::text('sku', $cat->sku, [ 'class' => 'form-control']) !!}
                                            </div>

                                        </div>

                                        <div class="col-md-7 ">

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
                                                        {{ Form::select('classification', $clasi, $cat->classification_id, ['class'=>'form-control']) }}
                                                    </span>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-5 mt16">

                                            {!! Form::label('subclassification','Subclasificación:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        {{ Form::select('subclassification', $subclasi, $cat->subclassification_id, ['class'=>'form-control']) }}
                                                    </span>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-5 mt16">

                                            {!! Form::label('subarea','Subarea:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        {{ Form::select('subarea', $subarea, $cat->subarea_id, ['class'=>'form-control']) }}
                                                    </span>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="col-md-4 mt16">

                                            {!! Form::label('warehouses','Almacén:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        {{ Form::select('warehouses', $warehouses, $cat->warehouse_id, ['class'=>'form-control']) }}
                                                    </span>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-3 mt16">

                                            {!! Form::label('status ','Estado:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                            {!! Form::select('status', [ '0' => 'Borrador', '1' => 'Publicado'], $cat->status, ['class' => 'custom-select']) !!}
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

            <div class="col-md-3">

                <div class="container-fluid">
                    <div class="panel shadow">

                        <div class="header">
                            <h2 class="title">
                                <i class="far fa-image "></i>
                                Imagen destacada
                            </h2>
                        </div>
                        <div class="inside">
                            <img src="{{ url('/multimedia/'.$cat->file_path.'/t_'.$cat->file) }}" class="img-fluid">
                        </div>

                    </div>
                </div>

                <div class="col-12 mt16" style="height: 388px;     padding: 0;">

                    <div class="container-fluid" style="height: 100%;">
                        <div class="panel shadow">

                            <div class="header">
                                <h2 class="title">
                                    <i class="far fa-image "></i>
                                    Elementos de Kit
                                </h2>
                            </div>
                            <div class="inside">
                                Incluidos
                                <div class="row" style="padding: 16px; height: 125px;     overflow: auto;">
                                    <div class="col-md-12 ">
                                        @foreach ($incluidos as $incluido)
                                            @foreach ($names as $name)
                                                @if ($incluido->product_id == $name->product_id)
                                                    <div class="row">
                                                        <div class="col-md-8" style="padding: 0;">
                                                            <p id="{{  $incluido->id }},{{  $incluido->product_id }}" >{{  $name->name }}</p>
                                                        </div>
                                                        <div class="col-md-2" style="padding: 0;">
                                                            <p>{{  $incluido->orden }}</p>
                                                        </div>
                                                        <div class="col-md-2" style="padding: 0;">
                                                            <a href="{{ route('kit.product.delete', $incluido->id) }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                                                <i class="fas fa-trash-alt" style="color: red;"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>


                            </div>
                            <div class="inside">
                                Extras
                                <div class="row" style="padding: 16px; height: 125px;     overflow: auto;">
                                    <div class="col-md-12 ">
                                        @foreach ($extras as $extra)
                                        @foreach ($names as $name)
                                            @if ($extra->product_id == $name->product_id)
                                                <div class="row">
                                                    <div class="col-md-8" style="padding: 0;">
                                                        <p id="{{  $extra->id }}" >{{  $name->name }}</p>
                                                    </div>
                                                    <div class="col-md-2" style="padding: 0;">
                                                        <p>{{  $extra->orden }}</p>
                                                    </div>
                                                    <div class="col-md-2" style="padding: 0;">
                                                        <a href="{{ route('kit.product.delete', $extra->id) }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                                            <i class="fas fa-trash-alt" style="color: red;"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row mt-3">

            <div class="col-md-7">
                <div class="container-fluid">
                    <div class="panel shadow">
                            <div class="header">
                                <h2 class="title">
                                    <i class="fas fa-plus"></i>
                                    Agregar productos
                                </h2>
                            </div>
                        <div class="inside">

                            <div class="col-md-12">
                                {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su busqueda', 'required', 'id' => 'kitproducto']) !!}
                            </div>




                                {!! Form::open(['url' => '/kit/add-product/'.$cat->id]) !!}

                                    <div class="row" style="padding: 16px; height: 100px; overflow: auto; padding: 15px 0 0 45px; width: 100%;">
                                        <div id="buscador_kit_producto" style="height: 100% !important">
                                        </div>
                                    </div>
                                    <div class="row" style="padding: 16px; height: 71px;">

                                        <div class="col-md-6" style="height: 100%;">


                                            <div class="input-group" style="height: 100%;">
                                                <div class="input-group-prepend" style="height: 100%;">
                                                    <span class="input-group-text">
                                                        {!! Form::label('type','Tipo:',['style' => 'margin: 0 !important;']) !!}
                                                    </span>
                                                </div>
                                                {{ Form::select('type', [ 'Obligatorio' => 'Obligatorio', 'Extra' => 'Extra'], 'Obligatorio',['class'=>'form-control', 'style' => 'width: 72%;']) }}
                                            </div>

                                        </div>


                                        <div class="col-md-3">
                                            {!! Form::number('orden', null, ['class' => 'form-control', 'placeholder' => 'Orden ', 'required', 'id' => 'orden']) !!}
                                        </div>
                                        <div class="col-md-3">
                                            {!! Form::number('quantity', null, ['class' => 'form-control', 'placeholder' => 'Cantidad ', 'required', 'id' => 'quantity']) !!}
                                        </div>
                                    </div>

                                    {!! Form::submit('Guardar', ['class' => 'btn btn-success mt16']) !!}

                                {!! Form::close() !!}



                        </div>

                    </div>
                </div>
            </div>



        </div>

    </div>

@stop


