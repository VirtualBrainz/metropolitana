@extends('master')
@section('title', 'inicio')

@section('content')
    <div class="row justify-content-center align-items-center roww__mobil" style="height: 100%; max-height:">

        <!--ImagenSplash-->
        <div id="ImagenSplash" class="Splash col-lg-12 justify-content-center align-items-center Height100" style="overflow: hidden; z-index: 999;">
            <div id="Fondo_splash" class="row justify-content-center align-items-center Height100" style="position: relative;">
                <div class="Fondo_splash">
                    <div class="Logo_splash" data-animate-scroll='{"alpha": "0", "y":"50", "duration": "7.5", "scaleX": "0",  "scaleY": "0", "ease": "Elastic.easeIn"}'>
                    </div>
                </div>
            </div>
        </div>

        <!--Carusell-->
        <section id="Slider" data-index="Slider" class="col-lg-12 justify-content-center align-items-center Height100" >
            <div class="row justify-content-center align-items-center row__mobil" style="width: 100%" >
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                    <ol class="carousel-indicators">

                        @for($i = 0; $i < sizeof($carrousels); $i++)
                            @if($i == 0)
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            @else
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>
                            @endif
                        @endfor

                    </ol>

                    <div class="carousel-inner">

                        @for($i = 0; $i < sizeof($carrousels); $i++)
                            @if($i == 0)

                                <div class="carousel-item active">

                                    <img src=" {{ url('/multimedia/'.$carrousels[$i]->file_path.'/'.$carrousels[$i]->file) }}" class="d-block w-100 Height100" alt="..." s>

                                </div>

                            @else
                                <div class="carousel-item">

                                    <img src=" {{ url('/multimedia/'.$carrousels[$i]->file_path.'/'.$carrousels[$i]->file) }}" class="d-block w-100 Height100" alt="..." s>

                                </div>
                            @endif
                        @endfor

                    </div>

                </div>
            </div>
        </section>

        <section id="Slider-mobile" data-index="Slider" class="col-lg-12 justify-content-center align-items-center Height100" style="padding: 0;">
            <div class="row justify-content-center align-items-center row__mobil" >
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                    <ol class="carousel-indicators">

                        @for($i = 0; $i < sizeof($carrousels); $i++)
                            @if($i == 0)
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            @else
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>
                            @endif
                        @endfor

                    </ol>

                    <div class="carousel-inner">

                        @for($i = 0; $i < sizeof($carrouselsmob); $i++)
                            @if($i == 0)

                                <div class="carousel-item active">

                                    <img src=" {{ url('/multimedia/'.$carrouselsmob[$i]->file_path.'/'.$carrouselsmob[$i]->file) }}" class="d-block w-100 Height100" alt="..." s>

                                </div>

                            @else
                                <div class="carousel-item">

                                    <img src=" {{ url('/multimedia/'.$carrouselsmob[$i]->file_path.'/'.$carrouselsmob[$i]->file) }}" class="d-block w-100 Height100" alt="..." s>

                                </div>
                            @endif
                        @endfor

                    </div>

                </div>
            </div>
        </section>


    </div>
@endsection

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js"></script>
    <script src="{{ asset('js/animate-scroll.js') }}"></script>
    <script type="text/javascript">
        $(document).animateScroll();
    </script>
    <script>
        setTime2r();

        function setTime2r(){
            $('#Fondo_splash').show();
            $('#Logo_splash').show();
            timer2 = setInterval(function () {
                $("#ImagenSplash").addClass("ran_none");

            }, 6500);
            $("#ann").hide();
                $("#heade").addClass("BHE");
                $("#noti").addClass("M_p_1");
                $("#expe").addClass("M_p_1");
                $("#lup").addClass("M_p_1");
                $("#map").addClass("M_p_1");
                $("#truck").addClass("M_p_1");
                $("#use").addClass("M_p_1");
                $("#menu_bur").addClass("M_p_1");

        }
    </script>

@endsection

