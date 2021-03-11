
<div class="col-lg-12 justify-content-center align-items-center Height100" style="max-height: 450px;">

    <div class="row justify-content-center align-items-center">

        @foreach ($productos as $product)


                <div class="col-lg-12 justify-content-center align-items-center Height100" style="padding: 0%; margin-right: 5px;">

                    
                    <p><input style="vertical-align: middle;" id="producto" name="productokit" type="checkbox" value="{{ $product->product_id  }}"/> {{ $product->name }}</p>

                </div>

            

        @endforeach

    </div>
</div>



