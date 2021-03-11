@extends('admin.master')
@section('title', 'Editar familia')

@section('breadcrumb')

    <li class="breadcrumb-item">
        <a href="{{ url('/admin/families') }}">
            <i class="far fa-folder-open"></i>
            Familias
        </a>
    </li>

@endsection

@section('content')

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-8">
                <div class="container-fluid">
                    <div class="panel shadow">
                            <div class="header">
                                <h2 class="title">
                                    <i class="fas fa-plus"></i>
                                    Editar familia
                                </h2>
                            </div>
                        <div class="inside">

                            @if (kvfj(Auth::user()->permissions, 'families_add'))

                                {!! Form::open(['url' => '/admin/family/'.$cat->id.'/edit', 'files' => true]) !!}

                                    <div class="row" style="padding: 16px;">


                                        <div class="col-md-9 ">

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
                                        <div class="col-md-3 Img-fam">

                                            <div class="container-fluid">
                                                <div class="panel shadow">

                                                    <div class="inside">
                                                        <img src="{{ $cat->file }}" class="img-fluid">
                                                    </div>

                                                </div>
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

            <div class="col-md-4">

                <div class="container-fluid">
                    <div class="panel shadow">

                        <div class="header">
                            <h2 class="title">
                                <i class="far fa-image "></i>
                                Elemtos de familia
                            </h2>
                        </div>
                        <div class="inside">
                            Kits
                            <div class="row" style="padding: 16px;">
                                <div class="col-md-12 ">
                                    @foreach ($kits as $kit)
                                    @foreach ($kitss as $kit1)
                                        @if ($kit->kit_id == $kit1->id)
                                            <p id="{{  $kit->id }},{{  $kit->kit_id }}" >{{  $kit1->name }}</p>
                                            <a href="{{ route('post.delete1', $kit->id) }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                                <i class="fas fa-trash-alt" style="color: red;"></i>
                                            </a>

                                        @endif
                                    @endforeach
                                @endforeach
                                </div>
                            </div>


                        </div>
                        <div class="inside">
                            Productos
                            <div class="row" style="padding: 16px; max-height: 323px; overflow: auto;">
                                <div class="col-md-12 " style="padding: 0;">
                                    @foreach ($productos as $producto)
                                        @foreach ($names as $name)
                                            @if ($producto->product_id == $name->product_id)
                                            <div class="row">
                                                <div class="col-md-6" style="padding: 0;">
                                                    <p id="{{  $producto->id }},{{  $producto->product_id }}" style="padding: 0;">{{  $name->name }}</p>
                                                </div>
                                                <div class="col-md-3" style="padding: 0;">
                                                    <p>{{  $producto->type }}</p>
                                                </div>
                                                <div class="col-md-2" style="padding: 0;">
                                                    <p>{{  $producto->orden }}</p>
                                                </div>
                                                <div class="col-md-1" style="padding: 0;">
                                                    <a href="{{ route('families.product.delete', $producto->id) }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
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
                                {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su busqueda', 'required', 'id' => 'productos']) !!}
                            </div>




                                {!! Form::open(['url' => '/family/add-product/'.$cat->id]) !!}

                                    <div class="row" style="padding: 16px; height: 100px; overflow: auto; padding: 15px 0 0 45px; width: 100%;">
                                        <div id="buscador_producto" style="height: 100% !important">
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


                                        <div class="col-md-6">
                                            {!! Form::number('orden', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el orden del producto', 'required', 'id' => 'orden']) !!}
                                        </div>
                                    </div>

                                    {!! Form::submit('Guardar', ['class' => 'btn btn-success mt16']) !!}

                                {!! Form::close() !!}



                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-5">

                <div class="container-fluid">
                    <div class="panel shadow" style="height: 300px;">

                        <div class="header">
                            <h2 class="title">
                                <i class="fas fa-plus"></i>
                                Agregar kits
                            </h2>
                        </div>
                        <div class="inside">
                            <div class="col-md-12">
                                {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su busqueda', 'required', 'id' => 'kits']) !!}
                            </div>


                            {!! Form::open(['url' => '/family/add-kit/'.$cat->id]) !!}

                                <div class="row" style="padding: 16px; height: 125px !important; overflow: auto; width: 100%; padding: 0 0 0 33px; ">
                                    <div id="buscador_kit" style="height: 100%;">
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


