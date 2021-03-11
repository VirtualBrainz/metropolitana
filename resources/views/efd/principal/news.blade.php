@extends('master')
@section('title', 'Noticias')

@section('content')
    <div   class="row justify-content-center align-items-center Height100" style="    padding-top: 4%;">
        <section id="noticias" data-index="noticias" class="col-lg-12 justify-content-center align-items-center" style=" z-index: 90; background: white; text-align: justify; padding: 0% 0 2% 3%; height: 80%;" >
            <div class="row justify-content-center align-items-center Height97">
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
                <div id="Videos" class="col-lg-12 justify-content-center align-items-center Height100" style=" z-index: 99; background-color: #ffffff; height: 95% !important;">
                    <div class="row justify-content-center align-items-center Height100">

                        <!--Noticia-Grande-->

                        <div class="col-lg-7 justify-content-center align-items-center Height100" style="padding: 0% 0% 0% 0%; z-index: 98; margin-top: 0px;">
                            <div class="row justify-content-center align-items-center Height100">


                                @foreach ($newsB as $big)

                                    <div class="col-lg-12 justify-content-center align-items-center Height100" style="padding: 0% ; z-index: 98; background-color: withe; margin-top: 0px;">
                                        <div class="row justify-content-center align-items-center Height100" >
                                            <div class="Height100" style="width: 100%;">
                                                <a href="{{ route('noticia', $big->id) }}" class="Link_Not"> 
                                                    <div class="Height100">

                                                        @if(substr($big->file, -4, 4) == ".mp4")

                                                            <video class="multi_noti imagen_noticia" controls>
                                                                <source src="{{ url('/multimedia/'.$big->file_path.'/'.$big->file) }}" type="video/mp4">
                                                                Your browser does not support HTML5 video.
                                                            </video>
                                                            <div class="info-news">
                                                                <div class="Height20 Title_Peq_Show Bold">
                                                                    <p style=" font-family: 'Montserrat-Bold'; font-size: 2.5rem;">{{ html_entity_decode($big->name, ENT_QUOTES | ENT_XML1, 'UTF-8') }}</p>
                                                                </div>
                                                                <div class="Height20 Title_Peq_Show Bold">
                                                                    <h4>{{ $big->date }}</h4>
                                                                </div>
                                                            </div>
                                                        @else

                                                            <img src="{{ url('/multimedia/'.$big->file_path.'/'.$big->file) }}" class="d-block w-100 imagen_noticia" alt="...">
                                                            <div class="info-news">
                                                                <div class="Height20 Title_Peq_Show Bold">
                                                                    <p style=" font-family: 'Montserrat-Bold'; font-size: 2.5rem;">{{ html_entity_decode($big->name, ENT_QUOTES | ENT_XML1, 'UTF-8') }}</p>
                                                                </div>
                                                                <div class="Height20 Title_Peq_Show Bold">
                                                                    <h4>{{ $big->date }}</h4>
                                                                </div>
                                                            </div>

                                                        @endif

                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>



                                @endforeach

                            </div>
                        </div>

                        <!--Noticias-medianas-->
                        <div class="col-lg-4 justify-content-center align-items-center Height100" style="padding-left: 2.5%; z-index: 98; margin-top: 0px;     overflow: hidden;">
                            <div class="row justify-content-center align-items-center Height100">

                                <div class="col-12 justify-content-center align-items-center Height50" style="padding: 1% 0%; z-index: 98;">
                                    <div class="row justify-content-center align-items-center Height100">

                                        @foreach ($mediana1 as $medi1)

                                            <div class="col-lg-12 justify-content-center align-items-center" style="height: 100%; padding: 0%; z-index: 98; background-color: withe; margin-bottom: 5px;">
                                                <div class="row justify-content-center align-items-center Height100" >
                                                    <div class="Height100" style="width: 100%;">
                                                        <a href="{{ route('noticia', $medi1->id) }}" class="Link_Not"> 
                                                            <div class="Height100">

                                                                @if(substr($medi1->file, -4, 4) == ".mp4")
                                                                    <div>
                                                                        <video class="multi_noti imagen_noticia" controls>
                                                                            <source src="{{ url('/multimedia/'.$medi1->file_path.'/t_'.$medi1->file) }}" type="video/mp4">
                                                                            Your browser does not support HTML5 video.
                                                                        </video>
                                                                    </div>
                                                                    <div class="info-news">
                                                                        <div class="Height20 Title_Peq_Show Bold">
                                                                            <p style=" font-family: 'Montserrat-Bold'; font-size: 1.5rem;">{{ html_entity_decode($medi1->name, ENT_QUOTES | ENT_XML1, 'UTF-8') }}</p>
                                                                        </div>
                                                                        <div class="Height20 Title_Peq_Show Bold">
                                                                            <h4>{{ $medi1->date }}</h4>
                                                                        </div>
                                                                    </div>
                                                                @else

                                                                    <div>
                                                                        <img style="position: absolute;" src="{{ url('/multimedia/'.$medi1->file_path.'/t_'.$medi1->file) }}" class="d-block w-100 imagen_noticia" alt="...">
                                                                    </div>
                                                                    <div class="info-news">
                                                                        <div class="Height20 Title_Peq_Show Bold">
                                                                             <p style=" font-family: 'Montserrat-Bold'; font-size: 1.5rem;">{{ html_entity_decode($medi1->name, ENT_QUOTES | ENT_XML1, 'UTF-8') }}</p>
                                                                        </div>
                                                                        <div class="Height20 Title_Peq_Show Bold">
                                                                            <h4>{{ $medi1->date }}</h4>
                                                                        </div>
                                                                    </div>
                                                                @endif

                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                        @endforeach

                                    </div>
                                </div>

                                <div class="col-12 justify-content-center align-items-center Height50" style="padding: 1% 0%; z-index: 98;">
                                    <div class="row justify-content-center align-items-center Height100">

                                        @foreach ($mediana2 as $medi2)

                                            <div class="col-lg-12 justify-content-center align-items-center" style="height: 100%; padding: 0%; z-index: 98; background-color: withe; margin-bottom: 5px;">
                                                <div class="row justify-content-center align-items-center Height100" >
                                                    <div class="Height100" style="width: 100%;">
                                                        <a href="{{ route('noticia', $medi2->id) }}" class="Link_Not"> 
                                                            <div class="Height100">

                                                                @if(substr($medi2->file, -4, 4) == ".mp4")
                                                                        <video class="multi_noti imagen_noticia" controls>
                                                                            <source src="{{ url('/multimedia/'.$medi2->file_path.'/t_'.$medi2->file) }}" type="video/mp4">
                                                                            Your browser does not support HTML5 video.
                                                                        </video>
                                                                        <div class="info-news">
                                                                            <div class="Height20 Title_Peq_Show Bold">
                                                                                <p style=" font-family: 'Montserrat-Bold'; font-size: 1.5rem;">{{ html_entity_decode($medi2->name, ENT_QUOTES | ENT_XML1, 'UTF-8') }}</p>
                                                                            </div>
                                                                            <div class="Height20 Title_Peq_Show Bold">
                                                                                <h4>{{ $medi2->date }}</h4>
                                                                            </div>
                                                                        </div>
                                                                @else

                                                                        <img  style="position: absolute;"src="{{ url('/multimedia/'.$medi2->file_path.'/t_'.$medi2->file) }}" class="d-block w-100 imagen_noticia" alt="...">
                                                                        <div class="info-news">
                                                                            <div class="Height20 Title_Peq_Show Bold">
                                                                                <p style=" font-family: 'Montserrat-Bold'; font-size: 1.5rem;">{{ html_entity_decode($medi2->name, ENT_QUOTES | ENT_XML1, 'UTF-8') }}</p>
                                                                            </div>
                                                                            <div class="Height20 Title_Peq_Show Bold">
                                                                                <h4>{{ $medi2->date }}</h4>
                                                                            </div>
                                                                        </div>

                                                                @endif

                                                            </div>
                                                        </a>    
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                  
                </div>

            </div>
            
        </section>
        <section style="width: 100%;">
            <div class="row justify-content-center align-items-center Height3" style="width: 100%;">
                <div class="col-lg-12 justify-content-center align-items-center Height100" style="padding: 1% 7%; text-align: center;">
                    __________________________________________________________________________________________________
                </div> 
            </div>   
              <!--Noticias-peuqeñas-->
             
              <div class="row justify-content-center align-items-center" style="padding: 0% 15%; z-index: 98; background-color: white; margin-top:20px; height: 100vh;">
                @foreach ($news as $small)
                
                    <div class="col-4 justify-content-center align-items-center" style="height: 45%; padding: 0 4%; margin-bottom: 3%;">
    
                        <div class="row justify-content-center align-items-center Height100" >
                            <div class="Height100" style="width: 100%;">
                                <a href="{{ route('noticia', $small->id) }}" class="Link_Not"> 
                                <div class="Height100">

                                    @if(substr($small->file, -4, 4) == ".mp4")
                                        <div>
                                            <video style="position: relative !important;" class="multi_noti imagen_noticia" controls>
                                                <source src="{{ url('/multimedia/'.$small->file_path.'/t_'.$small->file) }}" type="video/mp4">
                                                Your browser does not support HTML5 video.
                                            </video>
                                        </div>
                                        <div class="Height20 Title_Peq_Show Bold">
                                            <p style=" font-family: 'Montserrat-Bold'; font-size: 1.1rem; text-align: left;">{{ html_entity_decode($small->name, ENT_QUOTES | ENT_XML1, 'UTF-8') }}</p>
                                        </div>
                                        <div class="Height20 Title_Peq_Show Bold">
                                            <h6>{{ $small->date }}</h6>
                                        </div>
                                    @else

                                        <div>
                                            <img style="position: relative !important;"  src="{{ url('/multimedia/'.$small->file_path.'/t_'.$small->file) }}" class="d-block w-100 imagen_noticia" alt="...">
                                        </div>
                                        <div class="Height20 Title_Peq_Show Bold">
                                            <p style=" font-family: 'Montserrat-Bold'; font-size: 1.1rem; text-align: left;">{{ html_entity_decode($small->name, ENT_QUOTES | ENT_XML1, 'UTF-8') }}</p>
                                        </div>
                                        <div class="Height20 Title_Peq_Show Bold">
                                            <h6>{{ $small->date }}</h6>
                                        </div>

                                    @endif

                                </div>
                            </a>   
                            </div>
                        </div>
    
                    </div>
                
                @endforeach
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
    <script>
        var reproductor = videojs('small-v',{
            fluid: true
        });
    </script>
@endsection
