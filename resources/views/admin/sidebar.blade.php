<div class="sidebar shadow">

    <div class="section-top">
        <div class="logo">
            <a href="/">
                <img src="{{ url('media/imagenes/logo.png') }}" alt="" class="img-fluid">
            </a>
        </div>
        <div class="user">
            <span class="subtitle">Hola:</span>
            <div class="name">
                {{ Auth::user()->name }} {{ Auth::user()->lastname }}
                <a href="{{ url('/logout') }}" data-toggle="tooltip" data-placement="top" title="Salir">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
            <div class="email">
                {{ Auth::user()->email }}
            </div>
        </div>
    </div>

    <div class="main" style="height: 450px; overflow: auto;" >
        <ul>
                @if (kvfj(Auth::user()->permissions, 'dashboard'))
                <li>
                    <a href="{{ url('/admin') }}" class="lk-dashboard">
                        <i class="fas fa-home"></i>
                        Dashboard
                    </a>
                </li>
                @endif

                @if (kvfj(Auth::user()->permissions, 'user_list'))
                <li>
                    <a href="{{ url('/admin/users/all') }}" class="lk-user_list lk-users_edit lk-users_permissions">
                        <i class="fas fa-user-friends"></i>
                        Usuarios
                    </a>
                </li>
                @endif

                @if (kvfj(Auth::user()->permissions, 'quotes'))
                <li>
                    <a href="{{ url('/admin/quotes/0') }}" class="lk-quotes">
                        <i class="fas fa-clipboard-list"></i>
                        Cotizaciones
                    </a>
                </li>
                @endif

                @if (kvfj(Auth::user()->permissions, 'subclassifications'))
                <li>
                    <a href="{{ url('/admin/subclassifications') }}" class="lk-subclassifications lk-subclassifications_add lk-subclassifications_edit lk-subclassifications_search">
                        <i class="fas fa-globe"></i>
                        Subclasificaciones
                    </a>
                </li>
                @endif

                @if (kvfj(Auth::user()->permissions, 'subareas'))
                <li>
                    <a href="{{ url('/admin/subareas') }}" class="lk-subareas lk-subareas_add lk-subareas_edit lk-subareas_search">
                        <i class="fas fa-globe"></i>
                        Subareas
                    </a>
                </li>
                @endif

                @if (kvfj(Auth::user()->permissions, 'warehouses'))
                <li>
                    <a href="{{ url('/admin/warehouses') }}" class="lk-warehouses lk-warehouses_add lk-warehouses_edit lk-warehouses_search">
                        <i class="fas fa-warehouse"></i>
                        Almacénes
                    </a>
                </li>
                @endif

                @if (kvfj(Auth::user()->permissions, 'products'))
                <li>
                    <a href="{{ url('/admin/products/1') }}" class="lk-products lk-products_add lk-products_edit lk-products_search lk-product_gallegy_add">
                        <i class="fas fa-boxes"></i>
                        Productos
                    </a>
                </li>
                @endif

                @if (kvfj(Auth::user()->permissions, 'families'))
                <li>
                    <a href="{{ url('/admin/families') }}" class="lk-families lk-families_add lk-families_edit lk-families_search ">
                        <i class="fas fa-layer-group"></i>
                        Familias
                    </a>
                </li>
                @endif

                @if (kvfj(Auth::user()->permissions, 'kits'))
                <li>
                    <a href="{{ url('/admin/kits') }}" class="lk-kits lk-kits_add lk-kits_edit lk-kits_search">
                        <i class="fab fa-uikit"></i>
                        Kits
                    </a>
                </li>
                @endif

                @if (kvfj(Auth::user()->permissions, 'carousels'))
                <li>
                    <a href="{{ url('/admin/carousels') }}" class="lk-carousels lk-carousels_add lk-carousels_edit lk-carousels_search">
                        <i class="far fa-object-group"></i>
                        Carousel
                    </a>
                </li>
                @endif

                @if (kvfj(Auth::user()->permissions, 'filmographies'))
                <li>
                    <a href="{{ url('/admin/filmographies') }}" class="lk-filmographies lk-filmographies_add lk-filmographies_edit lk-filmographies_search">
                        <i class="far fa-file-image"></i>
                        Filmografía
                    </a>
                </li>
                @endif

                @if (kvfj(Auth::user()->permissions, 'news'))
                <li>
                    <a href="{{ url('/admin/news/1') }}" class="lk-news lk-news_add lk-news_edit lk-news_search">
                        <i class="fas fa-newspaper"></i>
                        Notícias
                    </a>
                </li>
                @endif

                @if (kvfj(Auth::user()->permissions, 'categories'))
                <li>
                    <a href="{{ url('/admin/categories/0') }}" class="lk-categories lk-categories_add lk-categories_edit lk-categories_delete">
                        <i class="far fa-folder-open"></i>
                        Categorias
                    </a>
                </li>
                @endif


        </ul>
    </div>

</div>
