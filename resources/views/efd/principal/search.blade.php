<div class="col-lg-8 justify-content-center align-items-center Height100" >
    <div class="row justify-content-center align-items-center Height100 buscador">
        <div class="col-lg-12 justify-content-center align-items-center Height100" style="max-height: 450px;">
            <div class="row justify-content-center align-items-center">

                @foreach ($familias as $product)

                    <a href="{{ route('product', "$product->id" )}}">

                        <div class="col-lg-2 justify-content-center align-items-center Height100" style="padding: 0%; margin-right: 5px;">

                            <div class="card">

                                <div class="face face1">

                                    <div class="content" style="text-align: center; width: 100%;">

                                        <img class="vidd_2" src="{{ strip_tags($product->file) }}" />

                                        <div class="t_v justify-content-center align-items-center" style="text-align: center;">
                                            <h4 class="C_N" style="color: #fff !important;">{{ strip_tags($product->name) }}</h4>
                                        </div>

                                    </div>

                                </div>

                                <div class="face face2 justify-content-center align-items-center" style="text-align: center;">

                                    <div class="content justify-content-center align-items-center" style="width: 100%">
                                        <div class="BTN_CAM BTN_Show">
                                            <a href="{{ route('product', "$product->id" )}}"></a>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </a>

                @endforeach

            </div>

            <div class="row justify-content-center align-items-center">

                @foreach ($kits as $product2)

                    <a href="{{ route('producto', "$product2->slug" )}}">

                        <div class="col-lg-2 justify-content-center align-items-center Height100" style="padding: 0%; margin-right: 5px;">

                            <div class="card">

                                <div class="face face1">

                                    <div class="content" style="text-align: center; width: 100%;">

                                        <img class="vidd_2" src="{{ strip_tags($product2->file) }}" />

                                        <div class="t_v justify-content-center align-items-center" style="text-align: center;">
                                            <h4 class="C_N" style="color: #fff !important;">{{ strip_tags($product2->name) }}</h4>
                                        </div>

                                    </div>

                                </div>

                                <div class="face face2 justify-content-center align-items-center" style="text-align: center;">

                                    <div class="content justify-content-center align-items-center" style="width: 100%">
                                        <div class="BTN_CAM BTN_Show">
                                            <a href="{{ route('producto', "$product2->slug" )}}"></a>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </a>

                @endforeach

            </div>
        </div>
    </div>
</div>



