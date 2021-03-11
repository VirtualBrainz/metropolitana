@extends('master')
@section('title', 'Noticias')

@section('content')
<div   class="row justify-content-center align-items-center Height100" style="    padding-top: 4%;">
    <section id="noticias" data-index="noticias" class="col-lg-12 justify-content-center align-items-center Height100 " style=" z-index: 90; background: white; text-align: justify; margin-bottom: 4%; padding: 0% 0 0 0;" >
        <div class="row justify-content-center align-items-center Height100">

            <div class="form_search" id="form_search">

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

            <div id="Videos" class="col-lg-12 justify-content-center align-items-center Height100" style=" z-index: 99; background-color: #ffffff; height: 95% !important;">
                <div class="row justify-content-center align-items-center Height60">

                    <!--Noticia-Search-->
                    @foreach ($news as $big)
                        <div class="col-lg-4 justify-content-center align-items-center Height100" style="padding: 0% 2% 0% 2%; z-index: 98; margin-top: 0px;">
                            <div class="row justify-content-center align-items-center Height100" >

                                <div class="col-lg-12 justify-content-center align-items-center Height50" style="padding: 0%; ">
                                    <div class="row justify-content-center align-items-center Height100" >
                                        <div class="Height100" style="width: 100%;">
                                            <div class="Height100">

                                                @if(substr($big->file, -4, 4) == ".mp4")

                                                    <video class="multi_noti imagen_noticia" controls>
                                                        <source src="{{ url('/multimedia/'.$big->file_path.'/'.$big->file) }}" type="video/mp4">
                                                        Your browser does not support HTML5 video.
                                                    </video>

                                                @else

                                                    <img src="{{ url('/multimedia/'.$big->file_path.'/'.$big->file) }}" class="d-block w-100 imagen_noticia" alt="...">


                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class=" col-lg-12 justify-content-center align-items-center Height40" style="padding: 0%; overflow: hidden;">
                                    <div class="row justify-content-center align-items-center Height20" style="    margin-bottom: 5px;">
                                        <p class="Titulo_Not_Big" style="font-size: 1.1rem; text-align: left;     width: 100%;">
                                            {{ html_entity_decode($big->name, ENT_QUOTES | ENT_XML1, 'UTF-8') }}
                                        </p>
                                    </div>
                                    <div class="row justify-content-center align-items-center Height80" >
                                        <div class="p-not">
                                            <p>{{ html_entity_decode($big->body, ENT_QUOTES | ENT_XML1, 'UTF-8') }}</p>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-12 justify-content-center align-items-center Height10" style="padding: 0%; z-index: 98;">
                                    <div class="row  Height100" >
                                        <a href="{{ route('noticia', $big->id) }}" class="Link_Not">+ Leer Más</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>
    </section>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $("#intro").addClass("backgroud_1");
    });

</script>
<script src="https://vjs.zencdn.net/7.3.0/video.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js"></script>
    <script src="{{ asset('js/animate-scroll.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/skrollr.min.js') }}"></script>

    <script type="text/javascript">
        $(document).animateScroll();
    </script>
    <script>
        (function() {
            $(document).ready(function() {

                $('.poste-wrappere').slick({
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 2000,
                    nextArrow: $('.next'),
                    prevArrow: $('.prev'),
                });

            });
        })();
    </script>
@endsection
