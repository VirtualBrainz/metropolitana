<div class="col-md-4 d-flex">
    <div class="container-fluid">
        <div class="panel shadow">

            <div class="header">
                <h2 class="title">
                    <i class="fas fa-clipboard-list"></i>
                    Modulo cotizaciones
                </h2>
            </div>

            <div class="inside">
                <div class="form-check">
                    <input type="checkbox" value="true" name="quotes" @if (kvfj($user->permissions, 'quotes')) checked @endif>
                    <label for="quotes">
                        Puede ver el listado.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="quotes_search" @if (kvfj($user->permissions, 'quotes_search')) checked @endif>
                    <label for="quotes_search">
                        Puede buscar.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="quotes_download" @if (kvfj($user->permissions, 'quotes_download')) checked @endif>
                    <label for="quotes_download">
                        Puede descargar.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="quotes_finish" @if (kvfj($user->permissions, 'quotes_finish')) checked @endif>
                    <label for="quotes_finsh">
                        Puede finalizar.
                    </label>
                </div>
            </div>

        </div>
    </div>
</div>
