@extends('admin.master')
@section('title', 'Ediat Carousel')

@section('breadcrumb')

    <li class="breadcrumb-item">
        <a href="{{ url('/admin/carousels') }}">
            <i class="far fa-folder-open"></i>
            Carousels
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
                                    Editar carousel
                                </h2>
                            </div>
                        <div class="inside">

                            @if (kvfj(Auth::user()->permissions, 'carousels_add'))

                                {!! Form::open(['url' => '/admin/carousel/'.$cat->id.'/edit', 'files' => true]) !!}

                                    <div class="row" style="padding: 16px;">


                                        <div class="col-md-7">

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

                                        <div class="col-md-5">

                                            {!! Form::label('file','Imagen:') !!}
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    {!! Form::file('file', ['class' => 'custom-file-input', 'id' => 'customFile']) !!}
                                                    <label class="custom-file-label" for="customFile">Choose File</label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-12 mt16">

                                            {!! Form::label('url','Url:') !!}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-link"></i>
                                                    </span>
                                                </div>
                                                {!! Form::text('ulr', $cat->name, [ 'class' => 'form-control']) !!}
                                            </div>

                                        </div>



                                    </div>

                                    {!! Form::submit('Guardar', ['class' => 'btn btn-success mt16']) !!}

                                {!! Form::close() !!}

                               
                              
                                    
                                    {!! Form::open(['url' => '/carousel/mobile/add/'.$cat->id,  'files' => true]) !!}
                                     
                                    @if ($imgs != 0 )
                                     
                                    @else
                                    <div class="row" style="padding: 16px;">
        
                                           
                                        <div class="col-md-12">

                                            {!! Form::label('file','Imagen:') !!}
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    {!! Form::file('file', ['class' => 'custom-file-input', 'id' => 'customFile']) !!}
                                                    <label class="custom-file-label" for="customFile">Choose File</label>
                                                </div>
                                            </div>

                                        </div>
    
                                    </div>
                                
                                    {!! Form::submit('Guardar', ['class' => 'btn btn-success mt16']) !!}
                                        
                                    @endif
                                   
                                    
                                     {!! Form::close() !!}

                                
                            @endif

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12">

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

                    </div>
                    <div class="col-md-12 mt16">

                        <div class="container-fluid">
                            <div class="panel shadow">

                                <div class="header">
                                    <h2 class="title">
                                        <i class="far fa-image "></i>
                                        Imagen mobile
                                    </h2>
                                    @if ($imgs != 0 )
                                    @foreach ($mobileImages as $image)
                                    <a href="{{ url('/carousel/mobile/'.$image->id.'/delete') }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                        <i class="fas fa-trash-alt" style="color: red;"></i>
                                    </a>
                                    @endforeach
                                    
                                    @endif
                                    

                                    
                                </div>
                                <div class="inside">
                                    @foreach ($mobileImages as $mobileImg)
                                    <img src="{{ url('/multimedia/'.$mobileImg->file_path.'/t_'.$mobileImg->file) }}" class="img-fluid">

                                    @endforeach
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

@stop


