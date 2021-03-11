<div class="col-md-4 d-flex">
    <div class="container-fluid">
        <div class="panel shadow">

            <div class="header">
                <h2 class="title">
                    <i class="fas fa-boxes"></i>
                    Modulo Productos
                </h2>
            </div>

            <div class="inside">
                <div class="form-check">
                    <input type="checkbox" value="true" name="products" @if (kvfj($user->permissions, 'products')) checked @endif>
                    <label for="products">
                        Puede ver el listado.
                    </label>
                </div>

                <div class="form-check">
                    <input type="checkbox" value="true" name="products_search" @if (kvfj($user->permissions, 'products_search')) checked @endif>
                    <label for="products_search">
                        Puede buscar.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="products_add" @if (kvfj($user->permissions, 'products_add')) checked @endif>
                    <label for="products_add">
                        Puede agregar productos.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="products_edit" @if (kvfj($user->permissions, 'products_edit')) checked @endif>
                    <label for="products_edit">
                        Puede editar.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="products_delete" @if (kvfj($user->permissions, 'products_delete')) checked @endif>
                    <label for="products_delete">
                        Puede eliminar.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="products_names_add" @if (kvfj($user->permissions, 'products_names_add')) checked @endif>
                    <label for="products_names_add">
                        Puede agregar nombres.
                    </label>
                </div>

                <div class="form-check">
                    <input type="checkbox" value="true" name="products_names_edit" @if (kvfj($user->permissions, 'products_names_edit')) checked @endif>
                    <label for="products_names_edit">
                        Puede editar nombres.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="products_names_delete" @if (kvfj($user->permissions, 'products_names_delete')) checked @endif>
                    <label for="products_names_delete">
                        Puede eliminar nombres.
                    </label>
                </div>
            </div>

        </div>
    </div>
</div>
