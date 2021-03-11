@extends('master')
@section('title', 'detalles de noticia')
@section('content')

    <div id="noticias-car" class="row justify-content-center" style="padding: 4% 0 3% 0; height: auto;">
        <!-- Search -->
            <div class="form_search" id="form_search" style="width: 100%; padding: 0 65% 0 4%;">

                <ul>
                    {!! Form::open(['url' => '/news/search']) !!}
                        <div class="row">
                            <div class="col-md-10">
                                {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la noticia']) !!}
                            </div>

                            <div class="col-md-2">
                                {!! Form::submit('Buscar', ['class' => 'btn btn-primary btn-news']) !!}
                            </div>
                        </div>



                    {!! Form::close() !!}
                </ul>

            </div>

        <!-- Destacado -->

            <!-- TITULO NOTICIA -->
                <div  class="col-12 justify-content-center align-items-center Height5_2" style="padding: 0; margin-bottom: 10px;">
                    <div id="" class="row justify-content-center align-items-center Height100">
                        <div class="col-lg-12 justify-content-center align-items-center Title_Show" style="height: 100% !important;">
                            <h3 style="text-align: center;">{!!  html_entity_decode($post->name, ENT_QUOTES | ENT_XML1, 'UTF-8')  !!}</h3>
                        </div>
                    </div>
                </div>
            <!-- iMAGEN DESTACADA -->
                <div  class="col-12 justify-content-center align-items-center Height70" style="padding: 0 20%; margin-bottom: 40px;">
                    <div id="" class="row justify-content-center align-items-center Height100" style="margin-bottom: 10px;">
                        <img src="{{ url('/multimedia/'.$post->file_path.'/'.$post->file) }}" class="d-block imagen_noticia" alt="...">

                    </div>
                </div>

        <!-- Secccion1 -->

            <!-- IMAGENES -->
                @for($i = 0; $i < sizeof($imagenes1); $i++)
                    @if($i != 0)
                        <div  class="col-6 justify-content-center align-items-center " style="padding: 0; max-height: 300px;">
                            <div class="row justify-content-center align-items-center " style="width: 100%;     height: 100% !important;" >
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                                    <ol class="carousel-indicators">

                                        @for($i = 0; $i < sizeof($imagenes1); $i++)
                                            @if($i == 0)
                                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                            @else
                                                <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>
                                            @endif
                                        @endfor

                                    </ol>

                                    <div class="carousel-inner">

                                        @for($i = 0; $i < sizeof($imagenes1); $i++)
                                            @if($i == 0)

                                                <div class="carousel-item active">

                                                    <img src=" {{ url('/multimedia/'.$imagenes1[$i]->file_path.'/'.$imagenes1[$i]->file_name) }}" class="d-block  Height100" alt="..." s>

                                                </div>

                                            @else
                                                <div class="carousel-item">

                                                    <img src=" {{ url('/multimedia/'.$imagenes1[$i]->file_path.'/'.$imagenes1[$i]->file_name) }}" class="d-block  Height100" alt="..." s>

                                                </div>
                                            @endif
                                        @endfor

                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif
                @endfor
            <!--VIDEO -->
                @if ($post->video_1 != null )
                    <div  class="col-6 justify-content-center align-items-center vimeo" style="padding: 0; height:50%; min-height:300px;">
                        <div id="" class="row justify-content-center align-items-center " style="height:300px; margin-bottom: 10px; padding: 0 10%; text-align: justify; " >

                            {!! html_entity_decode($post->video_1, ENT_QUOTES | ENT_XML1, 'UTF-8') !!}

                        </div>
                    </div>
                @endif
            <!-- DESCRIPCION -->
                <div  class="col-12 justify-content-center align-items-center " style="padding: 0; margin-bottom: 10px;  height: auto;">
                    <div id="" class="row justify-content-center align-items-center Height100" style="margin-bottom: 10px; padding: 0 10%; text-align: justify;" >

                        {!! html_entity_decode($post->body_1, ENT_QUOTES | ENT_XML1, 'UTF-8') !!}

                    </div>
                </div>

        <!-- Secccion2 -->
            @if ($post->body_2 != null || $post->video_2 != null)

                <!-- IMAGENES2 -->
                    @for($i = 0; $i < sizeof($imagenes2); $i++)
                        @if($i != 0)
                            <div  class="col-6 justify-content-center align-items-center" style="padding: 0;  max-height: 300px;">
                                <div class="row justify-content-center align-items-center Height100" style="width: 100%" >
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                                        <ol class="carousel-indicators">

                                            @for($i = 0; $i < sizeof($imagenes2); $i++)
                                                @if($i == 0)
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                                @else
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>
                                                @endif
                                            @endfor

                                        </ol>

                                        <div class="carousel-inner">

                                            @for($i = 0; $i < sizeof($imagenes2); $i++)
                                                @if($i == 0)

                                                    <div class="carousel-item active">

                                                        <img src=" {{ url('/multimedia/'.$imagenes2[$i]->file_path.'/'.$imagenes2[$i]->file_name) }}" class="d-block Height100" alt="..." s>

                                                    </div>

                                                @else
                                                    <div class="carousel-item">

                                                        <img src=" {{ url('/multimedia/'.$imagenes2[$i]->file_path.'/'.$imagenes2[$i]->file_name) }}" class="d-block  Height100" alt="..." s>

                                                    </div>
                                                @endif
                                            @endfor

                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endif
                    @endfor

                <!--VIDEO2 -->

                    @if ($post->video_2 != null )
                        <div  class="col-6 justify-content-center align-items-center vimeo" style="padding: 0; height:50%;min-height:300px;">
                            <div id="" class="row justify-content-center align-items-center" style="margin-bottom: 10px; padding: 0 10%; text-align: justify; height:300px;" >

                                {!! html_entity_decode($post->video_2, ENT_QUOTES | ENT_XML1, 'UTF-8') !!}

                            </div>
                        </div>
                    @endif
                <!-- DESCRIPCION2 -->
                    <div  class="col-12 justify-content-center align-items-center " style="padding: 0; height: auto; margin-top: 25px;">
                        <div id="" class="row justify-content-center align-items-center Height100" style="margin-bottom: 10px; padding: 0 10%; text-align: justify;" >

                            {!! html_entity_decode($post->body_2, ENT_QUOTES | ENT_XML1, 'UTF-8') !!}

                        </div>
                    </div>

            @endif

        <!-- Secccion3 -->
            @if ($post->body_3 != null ||   $post->video_3 != null)

                <!-- IMAGENES3 -->
                    @for($i = 0; $i < sizeof($imagenes3); $i++)
                        @if($i != 0)
                            <div  class="col-6 justify-content-center align-items-center Height40" style="padding: 0;">
                                <div id="" class="row justify-content-center align-items-center Height100" style="margin-bottom: 20px; padd0ing: 0 12%; text-align: justify;" >
                                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            @for($i = 0; $i < sizeof($imagenes3); $i++)
                                                @if($i == 0)
                                                    <div class="carousel-item active">
                                                        <img src="{{ url('/multimedia/'.$imagenes3[$i]->file_path.'/'.$imagenes3[$i]->file_name) }}" class="d-block  carousel" alt="...">

                                                    </div>
                                                @else
                                                    <div class="carousel-item ">
                                                        <img src="{{ url('/multimedia/'.$imagenes3[$i]->file_path.'/'.$imagenes3[$i]->file_name) }}" class="d-block  carousel" alt="...">
                                                    </div>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endfor
                <!--VIDEO3 -->

                    @if ($post->video_3 != null )
                        <div  class="col-6 justify-content-center align-items-center vimeo" style="padding: 0; height:50%;min-height:300px;">
                            <div id="" class="row justify-content-center align-items-center" style="height:300px;margin-bottom: 10px; padding: 0 10%; text-align: justify; " >

                                {!! html_entity_decode($post->video_3, ENT_QUOTES | ENT_XML1, 'UTF-8') !!}

                            </div>
                        </div>
                    @endif

                <!-- DESCRIPCION3 -->
                    <div  class="col-12 justify-content-center align-items-center " style="padding: 0; height: auto; margin-top: 25px;">
                        <div id="" class="row justify-content-center align-items-center Height100" style="margin-bottom: 10px; padding: 0 10%; text-align: justify;" >

                            {!! html_entity_decode($post->body_3, ENT_QUOTES | ENT_XML1, 'UTF-8') !!}

                        </div>
                    </div>

            @endif

        <!-- Secccion4 -->
            @if ($post->body_4 != null || $post->video_4 != null)

                <!-- IMAGENES4 -->
                    @for($i = 0; $i < sizeof($imagenes4); $i++)
                        @if($i != 0)
                            <div  class="col-6 justify-content-center align-items-center Height40" style="padding: 0;">
                                <div id="" class="row justify-content-center align-items-center Height100" style="margin-bottom: 20px; padd0ing: 0 12%; text-align: justify;" >
                                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            @for($i = 0; $i < sizeof($imagenes4); $i++)
                                                @if($i == 0)
                                                    <div class="carousel-item active">
                                                        <img src="{{ url('/multimedia/'.$imagenes4[$i]->file_path.'/'.$imagenes4[$i]->file_name) }}" class="d-block  carousel" alt="...">

                                                    </div>
                                                @else
                                                    <div class="carousel-item ">
                                                        <img src="{{ url('/multimedia/'.$imagenes4[$i]->file_path.'/'.$imagenes4[$i]->file_name) }}" class="d-block  carousel" alt="...">
                                                    </div>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endfor
                <!--VIDEO -->

                    @if ($post->video_4 != null )
                        <div  class="col-6 justify-content-center align-items-center vimeo" style="padding: 0; height: 300px;">
                            <div id="" class="row justify-content-center align-items-center " style="height:300px; margin-bottom: 10px; padding: 0 10%; text-align: justify; " >

                                {!! html_entity_decode($post->video_4, ENT_QUOTES | ENT_XML1, 'UTF-8') !!}

                            </div>
                        </div>
                    @endif
                <!-- DESCRIPCION -->
                    <div  class="col-12 justify-content-center align-items-center " style="padding: 0; height: auto;">
                        <div id="" class="row justify-content-center align-items-center Height100" style="margin-bottom: 10px; padding: 0 10%; text-align: justify;" >

                            {!! html_entity_decode($post->body_4, ENT_QUOTES | ENT_XML1, 'UTF-8') !!}

                        </div>
                    </div>



            @endif

        <!-- Secccion5 -->
            @if ($post->body_5 != null || $post->video_5 != null)

                <!-- IMAGENES5 -->
                    @for($i = 0; $i < sizeof($imagenes5); $i++)
                        @if($i != 0)
                            <div  class="col-6 justify-content-center align-items-center Height40" style="padding: 0;">
                                <div id="" class="row justify-content-center align-items-center Height100" style="margin-bottom: 20px; padd0ing: 0 12%; text-align: justify;" >
                                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            @for($i = 0; $i < sizeof($imagenes5); $i++)
                                                @if($i == 0)
                                                    <div class="carousel-item active">
                                                        <img src="{{ url('/multimedia/'.$imagenes5[$i]->file_path.'/'.$imagenes5[$i]->file_name) }}" class="d-block  carousel" alt="...">

                                                    </div>
                                                @else
                                                    <div class="carousel-item ">
                                                        <img src="{{ url('/multimedia/'.$imagenes5[$i]->file_path.'/'.$imagenes5[$i]->file_name) }}" class="d-block  carousel" alt="...">
                                                    </div>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endif
                    @endfor
                <!--VIDEO5 -->

                    @if ($post->video_5 != null )
                        <div  class="col-6 justify-content-center align-items-center vimeo" style="padding: 0;height: 50%; min-height: 300px;">
                            <div id="" class="row justify-content-center align-items-center " style="height:300px; margin-bottom: 10px; padding: 0 10%; text-align: justify; " >

                                {!! html_entity_decode($post->video_5, ENT_QUOTES | ENT_XML1, 'UTF-8') !!}

                            </div>
                        </div>
                    @endif
                <!-- DESCRIPCION5 -->
                    <div  class="col-12 justify-content-center align-items-center" style="padding: 0; height: auto;">
                        <div id="" class="row justify-content-center align-items-center Height100" style="margin-bottom: 10px; padding: 0 10%; text-align: justify;" >

                            {!! html_entity_decode($post->body_5, ENT_QUOTES | ENT_XML1, 'UTF-8') !!}

                        </div>
                    </div>


            @endif


    </div>

@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $("#intro").addClass("backgroud_1");
    });

</script>
@endsection
