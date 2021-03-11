
<div class="col-lg-12 justify-content-center align-items-center Height100" style="max-height: 450px;">

    <div class="row justify-content-center align-items-center">

        @foreach ($kits as $kit)


                <div class="col-lg-12 justify-content-center align-items-center Height100" style="padding: 0%; margin-right: 5px;">

                    <p><input style="vertical-align: middle;" id="{{ $kit->id  }}" name="kit" type="checkbox" value="{{ $kit->id  }}"/> {{ $kit->name }}</p>


                </div>

            

        @endforeach

    </div>
</div>



