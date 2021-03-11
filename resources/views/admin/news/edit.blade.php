@extends('admin.master')
@section('title', 'Editar producto')

@section('breadcrumb')

    <li class="breadcrumb-item">
        <a href="{{ url('/admin/products') }}">
            <i class="fas fa-newspaper"></i>
            Notícias
        </a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/product/edit ') }}">
            <i class="far fa-folder-open"></i>
            Editar notícia
        </a>
    </li>

@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-9">
                <div class="panel shadow">

                    <div class="header">
                        <h2 class="title">
                            <i class="far fa-edit"></i>
                            Editar notícia
                        </h2>
                    </div>

                    <div class="inside">

                        {!! Form::open(['url' => '/admin/news/'.$product->id.'/edit', 'files' => true]) !!}

                            <div class="row" style="padding: 16px;">

                                <div class="col-md-9">
                                    {!! Form::label('name','Nombre:') !!}
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-keyboard"></i>
                                            </span>
                                        </div>
                                        {!! Form::text('name', $product->name, [ 'class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-md-3 .FechaN">
                                    {!! Form::label('date','Fecha:') !!}
                                    <div class="input-group" style="    height: 56%;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        {!! Form::date('date', $product->date,['class' => 'date', 'style' => 'border: 1px solid #ced4da !important;']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row mt16">

                                <div class="col-md-9">
                                    <div class="container-fluid">
                                        <label for="name">Imagen destacada:</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                {!! Form::file('file', ['class' => 'custom-file-input', 'id' => 'customFile']) !!}
                                                <label class="custom-file-label" for="customFile">Choose File</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="container-fluid">
                                        {!! Form::label('status ','Estado:') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                {!! Form::select('status', [ '0' => 'Borrador', '1' => 'Publicado'], $product->status, ['class' => 'custom-select']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="row mt16" style="padding: 16px;">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        {{ Form::label('body_1','Descripcion 1:') }}
                                        <div class="input-group-prepend">
                                            {!! Form::textarea('body_1', $product->body_1, ['class' => 'form-control ', 'id' => 'editor']) !!}
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row mt16" style="padding: 16px;">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        {{ Form::label('video_1','Video 1:') }}
                                        <div class="input-group-prepend">
                                            {!! Form::textarea('video_1', $product->video_1, ['class' => 'form-control ', 'id' => 'video_1']) !!}
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row mt16" style="padding: 16px;">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        {{ Form::label('body_2','Descripcion 2:') }}
                                        <div class="input-group-prepend">
                                            {!! Form::textarea('body_2', $product->body_2, ['class' => 'form-control ', 'id' => 'editor']) !!}
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row mt16" style="padding: 16px;">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        {{ Form::label('video_2','Video 2:') }}
                                        <div class="input-group-prepend">
                                            {!! Form::textarea('video_2', $product->video_2, ['class' => 'form-control ', 'id' => 'video_2']) !!}
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row mt16" style="padding: 16px;">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        {{ Form::label('body_3','Descripcion 3:') }}
                                        <div class="input-group-prepend">
                                            {!! Form::textarea('body_3', $product->body_3, ['class' => 'form-control ', 'id' => 'editor']) !!}
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row mt16" style="padding: 16px;">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        {{ Form::label('video_3','Video 3:') }}
                                        <div class="input-group-prepend">
                                            {!! Form::textarea('video_3', $product->video_3, ['class' => 'form-control ', 'id' => 'video_3']) !!}
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row mt16" style="padding: 16px;">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        {{ Form::label('body_4','Descripcion 4:') }}
                                        <div class="input-group-prepend">
                                            {!! Form::textarea('body_4', $product->body_4, ['class' => 'form-control ', 'id' => 'editor']) !!}
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row mt16" style="padding: 16px;">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        {{ Form::label('video_4','Video 4:') }}
                                        <div class="input-group-prepend">
                                            {!! Form::textarea('video_4', $product->video_4, ['class' => 'form-control ', 'id' => 'video_4']) !!}
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row mt16" style="padding: 16px;">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        {{ Form::label('body_5','Descripcion 5:') }}
                                        <div class="input-group-prepend">
                                            {!! Form::textarea('body_5', $product->body_5, ['class' => 'form-control ', 'id' => 'editor']) !!}
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row mt16" style="padding: 16px;">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        {{ Form::label('video_5','Video 5:') }}
                                        <div class="input-group-prepend">
                                            {!! Form::textarea('video_5', $product->video_5, ['class' => 'form-control ', 'id' => 'video_5']) !!}
                                        </div>

                                    </div>
                                </div>
                            </div>
                           

                            {!! Form::submit('Guardar', ['class' => 'btn btn-success mt16']) !!}

                        {!! Form::close() !!}

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
                            <img src="{{ url('/multimedia/'.$product->file_path.'/t_'.$product->file) }}" class="img-fluid">
                        </div>

                    </div>
                </div>

                <div class="container-fluid">
                    <div class="panel shadow mt16">

                        <div class="header">
                            <h2 class="title">
                                <i class="far fa-images"></i>
                                Galeria 1
                            </h2>
                        </div>

                        <div class="inside product_gallery">


                                {!! Form::open(['url' => '/admin/news/'.$product->id.'/gallery/add/1', 'files' => true, 'id' => 'form_product_gallery_1']) !!}

                                    {!! Form::file('file_image', ['id' => 'product_file_image_1', 'accept' => 'image/*', 'video/*', 'style' => 'display:none;', 'required']) !!}

                                {!! Form::close() !!}

                                <div class="btn-submit">
                                    <a href="#" id="btn_product_file_image_1" onclick="Ngallery00()"><i class="fas fa-plus"></i></a>
                                </div>

                            <div class="tumbs">
                                @foreach ($galeria as $ima)
                                @if ($ima->after == 1)
                                <div class="tumb">

                                    @if (kvfj(Auth::user()->permissions, 'news_gallery_delete'))

                                        <a href="{{ url('/admin/news/'.$product->id.'/gallery/'.$ima->id.'/delete') }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>

                                    @endif

                                    <img src="{{ url('/multimedia/'.$ima->file_path.'/t_'.$ima->file_name) }}" class="img-fluid">
                                </div>
                                @endif
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="panel shadow mt16">

                        <div class="header">
                            <h2 class="title">
                                <i class="far fa-images"></i>
                                Galeria 2
                            </h2>
                        </div>

                        <div class="inside product_gallery">


                                {!! Form::open(['url' => '/admin/news/'.$product->id.'/gallery/add/2', 'files' => true, 'id' => 'form_product_gallery_2']) !!}

                                    {!! Form::file('file_image', ['id' => 'product_file_image_2', 'accept' => 'image/*', 'video/*', 'style' => 'display:none;', 'required']) !!}

                                {!! Form::close() !!}

                                <div class="btn-submit">
                                    <a href="#" id="btn_product_file_image_2" onclick="Ngallery01()"><i class="fas fa-plus"></i></a>
                                </div>

                            <div class="tumbs">
                                @foreach ($galeria as $ima)
                                @if ($ima->after == 2)
                                <div class="tumb">

                                    @if (kvfj(Auth::user()->permissions, 'news_gallery_delete'))

                                        <a href="{{ url('/admin/news/'.$product->id.'/gallery/'.$ima->id.'/delete') }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>

                                    @endif

                                    <img src="{{ url('/multimedia/'.$ima->file_path.'/t_'.$ima->file_name) }}" class="img-fluid">
                                </div>
                                @endif
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="panel shadow mt16">

                        <div class="header">
                            <h2 class="title">
                                <i class="far fa-images"></i>
                                Galeria 3
                            </h2>
                        </div>

                        <div class="inside product_gallery">


                                {!! Form::open(['url' => '/admin/news/'.$product->id.'/gallery/add/3', 'files' => true, 'id' => 'form_product_gallery_3']) !!}

                                    {!! Form::file('file_image', ['id' => 'product_file_image_3', 'accept' => 'image/*', 'video/*', 'style' => 'display:none;', 'required']) !!}

                                {!! Form::close() !!}

                                <div class="btn-submit">
                                    <a href="#" id="btn_product_file_image_3" onclick="Ngallery02()"><i class="fas fa-plus"></i></a>
                                </div>

                            <div class="tumbs">
                                @foreach ($galeria as $ima)
                                @if ($ima->after == 3)
                                <div class="tumb">

                                    @if (kvfj(Auth::user()->permissions, 'news_gallery_delete'))

                                        <a href="{{ url('/admin/news/'.$product->id.'/gallery/'.$ima->id.'/delete') }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>

                                    @endif

                                    <img src="{{ url('/multimedia/'.$ima->file_path.'/t_'.$ima->file_name) }}" class="img-fluid">
                                </div>
                                @endif
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="panel shadow mt16">

                        <div class="header">
                            <h2 class="title">
                                <i class="far fa-images"></i>
                                Galeria 4
                            </h2>
                        </div>

                        <div class="inside product_gallery">


                                {!! Form::open(['url' => '/admin/news/'.$product->id.'/gallery/add/4', 'files' => true, 'id' => 'form_product_gallery_4']) !!}

                                    {!! Form::file('file_image', ['id' => 'product_file_image_4', 'accept' => 'image/*', 'video/*', 'style' => 'display:none;', 'required']) !!}

                                {!! Form::close() !!}

                                <div class="btn-submit">
                                    <a href="#" id="btn_product_file_image_4" onclick="Ngallery03()"><i class="fas fa-plus"></i></a>
                                </div>

                            <div class="tumbs">
                                @foreach ($galeria as $ima)
                                @if ($ima->after == 4)
                                <div class="tumb">

                                    @if (kvfj(Auth::user()->permissions, 'news_gallery_delete'))

                                        <a href="{{ url('/admin/news/'.$product->id.'/gallery/'.$ima->id.'/delete') }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>

                                    @endif

                                    <img src="{{ url('/multimedia/'.$ima->file_path.'/t_'.$ima->file_name) }}" class="img-fluid">
                                </div>
                                @endif
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="panel shadow mt16">

                        <div class="header">
                            <h2 class="title">
                                <i class="far fa-images"></i>
                                Galeria 5
                            </h2>
                        </div>

                        <div class="inside product_gallery">


                                {!! Form::open(['url' => '/admin/news/'.$product->id.'/gallery/add/5', 'files' => true, 'id' => 'form_product_gallery_5']) !!}

                                    {!! Form::file('file_image', ['id' => 'product_file_image_5', 'accept' => 'image/*', 'video/*', 'style' => 'display:none;', 'required']) !!}

                                {!! Form::close() !!}

                                <div class="btn-submit">
                                    <a href="#" id="btn_product_file_image_5" onclick="Ngallery04()"><i class="fas fa-plus"></i></a>
                                </div>

                            <div class="tumbs">
                                @foreach ($galeria as $ima)
                                @if ($ima->after == 5)
                                <div class="tumb">

                                    @if (kvfj(Auth::user()->permissions, 'news_gallery_delete'))

                                        <a href="{{ url('/admin/news/'.$product->id.'/gallery/'.$ima->id.'/delete') }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>

                                    @endif

                                    <img src="{{ url('/multimedia/'.$ima->file_path.'/t_'.$ima->file_name) }}" class="img-fluid">
                                </div>
                                @endif
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>



            </div>

        </div>

    </div>

@stop

@section('scripts')

    <script src="{{ asset('/libs/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>

@endsection
