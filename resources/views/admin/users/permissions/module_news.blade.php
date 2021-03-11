<div class="col-md-4 d-flex">
    <div class="container-fluid">
        <div class="panel shadow">

            <div class="header">
                <h2 class="title">
                    <i class="fas fa-newspaper"></i>
                    Modulo Noticias
                </h2>
            </div>

            <div class="inside">
                <div class="form-check">
                    <input type="checkbox" value="true" name="news" @if (kvfj($user->permissions, 'news')) checked @endif>
                    <label for="news">
                        Puede ver el listado.
                    </label>
                </div>

                <div class="form-check">
                    <input type="checkbox" value="true" name="news_search" @if (kvfj($user->permissions, 'news_search')) checked @endif>
                    <label for="news_search">
                        Puede buscar.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="news_add" @if (kvfj($user->permissions, 'news_add')) checked @endif>
                    <label for="news_add">
                        Puede agregar productos.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="news_edit" @if (kvfj($user->permissions, 'news_edit')) checked @endif>
                    <label for="news_edit">
                        Puede editar.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="news_delete" @if (kvfj($user->permissions, 'news_delete')) checked @endif>
                    <label for="news_delete">
                        Puede eliminar.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="news_gallery_add" @if (kvfj($user->permissions, 'news_gallery_add')) checked @endif>
                    <label for="news_gallery_add">
                        Puede agregar imagenes a galeria.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="news_gallery_delete" @if (kvfj($user->permissions, 'news_gallery_delete')) checked @endif>
                    <label for="news_gallery_delete">
                        Puede eliminar imagenes a galeria.
                    </label>
                </div>
            </div>

        </div>
    </div>
</div>
