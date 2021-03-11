<div class="col-md-4 d-flex">
    <div class="container-fluid">
        <div class="panel shadow">

            <div class="header">
                <h2 class="title">
                    <i class="fab fa-uikit"></i>
                    Modulo kits
                </h2>
            </div>

            <div class="inside">
                <div class="form-check">
                    <input type="checkbox" value="true" name="kits" @if (kvfj($user->permissions, 'kits')) checked @endif>
                    <label for="kits">
                        Puede ver el listado.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="kits_add" @if (kvfj($user->permissions, 'kits_add')) checked @endif>
                    <label for="kits_add">
                        Puede agregar.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="kits_edit" @if (kvfj($user->permissions, 'kits_edit')) checked @endif>
                    <label for="kits_edit">
                        Puede editar.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="kits_delete" @if (kvfj($user->permissions, 'kits_delete')) checked @endif>
                    <label for="kits_delete">
                        Puede elimiar.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="kits_products_add" @if (kvfj($user->permissions, 'kits_products_add')) checked @endif>
                    <label for="kits_products_add">
                        Puede agregar productos.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="kits_products_edit" @if (kvfj($user->permissions, 'kits_products_edit')) checked @endif>
                    <label for="kits_products_edit">
                        Puede editar productos.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="kits_products_delete" @if (kvfj($user->permissions, 'kits_products_delete')) checked @endif>
                    <label for="kits_products_delete">
                        Puede elimiar productos.
                    </label>
                </div>
            </div>

        </div>
    </div>
</div>
