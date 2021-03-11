<div class="col-md-4 d-flex">
    <div class="container-fluid">
        <div class="panel shadow">

            <div class="header">
                <h2 class="title">
                    <i class="fas fa-layer-group"></i>
                    Modulo familias
                </h2>
            </div>

            <div class="inside">
                <div class="form-check">
                    <input type="checkbox" value="true" name="families" @if (kvfj($user->permissions, 'families')) checked @endif>
                    <label for="families">
                        Puede ver el listado.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="families_add" @if (kvfj($user->permissions, 'families_add')) checked @endif>
                    <label for="families_add">
                        Puede agregar.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="families_edit" @if (kvfj($user->permissions, 'families_edit')) checked @endif>
                    <label for="families_edit">
                        Puede editar.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="families_delete" @if (kvfj($user->permissions, 'families_delete')) checked @endif>
                    <label for="families_delete">
                        Puede elimiar.
                    </label>
                </div>

                <div class="form-check">
                    <input type="checkbox" value="true" name="families_kits_add" @if (kvfj($user->permissions, 'families_kits_add')) checked @endif>
                    <label for="families_kits_add">
                        Puede agregar kits.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="families_kits_edit" @if (kvfj($user->permissions, 'families_kits_edit')) checked @endif>
                    <label for="families_kits_edit">
                        Puede editar kits.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="families_kits_delete" @if (kvfj($user->permissions, 'families_kits_delete')) checked @endif>
                    <label for="families_kits_delete">
                        Puede elimiar kits.
                    </label>
                </div>

                <div class="form-check">
                    <input type="checkbox" value="true" name="families_products_add" @if (kvfj($user->permissions, 'families_products_add')) checked @endif>
                    <label for="families_products_add">
                        Puede agregar productos.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="families_products_edit" @if (kvfj($user->permissions, 'families_products_edit')) checked @endif>
                    <label for="families_products_edit">
                        Puede editar productos.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="families_products_delete" @if (kvfj($user->permissions, 'families_products_delete')) checked @endif>
                    <label for="families_products_delete">
                        Puede elimiar productos.
                    </label>
                </div>
            </div>

        </div>
    </div>
</div>
