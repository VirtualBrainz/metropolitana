<div class="col-md-4 d-flex">
    <div class="container-fluid">
        <div class="panel shadow">

            <div class="header">
                <h2 class="title">
                    <i class="far fa-file-image"></i>
                    Modulo Filmografías
                </h2>
            </div>

            <div class="inside">
                <div class="form-check">
                    <input type="checkbox" value="true" name="filmographies" @if (kvfj($user->permissions, 'filmographies')) checked @endif>
                    <label for="filmographies">
                        Puede ver el listado.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="filmographies_add" @if (kvfj($user->permissions, 'filmographies_add')) checked @endif>
                    <label for="filmographies_add">
                        Puede agregar.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="filmographies_edit" @if (kvfj($user->permissions, 'filmographies_edit')) checked @endif>
                    <label for="filmographies_edit">
                        Puede editar.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="filmographies_delete" @if (kvfj($user->permissions, 'filmographies_delete')) checked @endif>
                    <label for="filmographies_delete">
                        Puede elimiar.
                    </label>
                </div>
            </div>

        </div>
    </div>
</div>
