<div class="col-md-4 d-flex">
    <div class="container-fluid">
        <div class="panel shadow">

            <div class="header">
                <h2 class="title">
                    <i class="fas fa-globe"></i>
                    Modulo Subareas
                </h2>
            </div>

            <div class="inside">
                <div class="form-check">
                    <input type="checkbox" value="true" name="subareas" @if (kvfj($user->permissions, 'subareas')) checked @endif>
                    <label for="subareas">
                        Puede ver el listado.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="subareas_add" @if (kvfj($user->permissions, 'subareas_add')) checked @endif>
                    <label for="subareas_add">
                        Puede agregar.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="subareas_edit" @if (kvfj($user->permissions, 'subareas_edit')) checked @endif>
                    <label for="subareas_edit">
                        Puede editar.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="subareas_delete" @if (kvfj($user->permissions, 'subareas_delete')) checked @endif>
                    <label for="subareas_delete">
                        Puede elimiar.
                    </label>
                </div>
            </div>

        </div>
    </div>
</div>
