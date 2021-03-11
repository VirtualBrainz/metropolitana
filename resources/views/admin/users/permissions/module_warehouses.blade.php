<div class="col-md-4 d-flex">
    <div class="container-fluid">
        <div class="panel shadow">

            <div class="header">
                <h2 class="title">
                    <i class="fas fa-warehouse"></i>
                    Modulo Almacenes
                </h2>
            </div>

            <div class="inside">
                <div class="form-check">
                    <input type="checkbox" value="true" name="warehouses" @if (kvfj($user->permissions, 'warehouses')) checked @endif>
                    <label for="warehouses">
                        Puede ver el listado.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="warehouses_add" @if (kvfj($user->permissions, 'warehouses_add')) checked @endif>
                    <label for="warehouses_add">
                        Puede agregar.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="warehouses_edit" @if (kvfj($user->permissions, 'warehouses_edit')) checked @endif>
                    <label for="warehouses_edit">
                        Puede editar.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="warehouses_delete" @if (kvfj($user->permissions, 'warehouses_delete')) checked @endif>
                    <label for="warehouses_delete">
                        Puede elimiar.
                    </label>
                </div>
            </div>

        </div>
    </div>
</div>
