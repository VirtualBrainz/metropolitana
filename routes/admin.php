<?php

Route::prefix('/admin')->group(function(){

    Route::get('/',                                         'Admin\DashboardController@getDashboard')->name('dashboard');

    //Module Users
    Route::get('/users/{status}',                           'Admin\UserController@getUsers')->name('user_list');
    Route::get('/user/{id}/edit',                           'Admin\UserController@getUserEdit')->name('users_edit');
    Route::post('/user/{id}/edit',                          'Admin\UserController@postUserEdit')->name('users_edit');
    Route::get('/user/{id}/banned',                         'Admin\UserController@getUserBanned')->name('users_banned');
    Route::get('/user/{id}/permissions',                    'Admin\UserController@getUserPermissions')->name('users_permissions');
    Route::post('/user/{id}/permissions',                   'Admin\UserController@postUserPermissions')->name('users_permissions');


    //Module Subclassifications
    Route::get('/subclassifications',                       'Admin\SubclassificationsController@getHome')->name('subclassifications');
    Route::post('/subclassification/add',                   'Admin\SubclassificationsController@postSubclassificationAdd')->name('subclassifications_add');
    Route::get('/subclassification/{id}/edit',              'Admin\SubclassificationsController@getSubclassificationEdit')->name('subclassifications_edit');
    Route::post('/subclassification/{id}/edit',             'Admin\SubclassificationsController@postSubclassificationEdit')->name('subclassifications_edit');
    Route::get('/subclassification/{id}/delete',            'Admin\SubclassificationsController@getSubclassificationDelete')->name('subclassifications_delete');


    //Module Subareas
    Route::get('/subareas',                                 'Admin\SubareasController@getHome')->name('subareas');
    Route::post('/subarea/add',                             'Admin\SubareasController@postSubareaAdd')->name('subareas_add');
    Route::get('/subarea/{id}/edit',                        'Admin\SubareasController@getSubareaEdit')->name('subareas_edit');
    Route::post('/subarea/{id}/edit',                       'Admin\SubareasController@postSubareaEdit')->name('subareas_edit');
    Route::get('/subarea/{id}/delete',                      'Admin\SubareasController@getSubareaDelete')->name('subareas_delete');


    //Module Warehouses
    Route::get('/warehouses',                              'Admin\WarehousesController@getHome')->name('warehouses');
    Route::post('/warehouse/add',                          'Admin\WarehousesController@postWarehouseAdd')->name('warehouses_add');
    Route::get('/warehouse/{id}/edit',                     'Admin\WarehousesController@getWarehouseEdit')->name('warehouses_edit');
    Route::post('/warehouse/{id}/edit',                    'Admin\WarehousesController@postWarehouseEdit')->name('warehouses_edit');
    Route::get('/warehouse/{id}/delete',                   'Admin\WarehousesController@getWarehouseDelete')->name('warehouses_delete');


    //Module Products
    Route::get('/products/{status}',                        'Admin\ProductsController@getHome')->name('products');
    Route::get('/product/add',                              'Admin\ProductsController@getProductAdd')->name('products_add');
    Route::post('/product/add',                             'Admin\ProductsController@postProductAdd')->name('products_add');
    Route::get('/product/{id}/edit',                        'Admin\ProductsController@getProductEdit')->name('products_edit');
    Route::post('/product/{id}/edit',                       'Admin\ProductsController@postProductEdit')->name('products_edit');
    Route::get('/product/{id}/delete',                      'Admin\ProductsController@getProductDelete')->name('products_delete');
    Route::get('/product/{id}/restore',                     'Admin\ProductsController@getProductRestore')->name('products_delete');
    Route::post('/product/search',                          'Admin\ProductsController@postProductSearch')->name('products_search');
    Route::get('/products/name/',                           'Admin\ProductsController@getHomeName')->name('products_names');
    Route::get('/product/{id}/names',                       'Admin\ProductsController@getProductName')->name('products_names_add');
    Route::post('/product/{id}/names',                      'Admin\ProductsController@postProductName')->name('products_names_add');
    Route::get('/product/{id}/names/edit',                  'Admin\ProductsController@getProductNameEdit')->name('products_names_edit');
    Route::post('/product/{id}/names/edit',                 'Admin\ProductsController@postProductNameEdit')->name('products_names_edit');
    Route::get('/product/{id}/names/delete',                'Admin\ProductsController@getProductNameDelete')->name('products_names_delete');


    //Module Families
    Route::get('/families',                                 'Admin\FamiliesController@getHome')->name('families');
    Route::post('/family/add',                              'Admin\FamiliesController@postFamilyAdd')->name('families_add');
    Route::get('/family/{id}/edit',                         'Admin\FamiliesController@getFamilyEdit')->name('families_edit');
    Route::post('/family/{id}/edit',                        'Admin\FamiliesController@postFamilyEdit')->name('families_edit');
    Route::get('/family/{id}/delete',                       'Admin\FamiliesController@getFamilyDelete')->name('families_delete');



    //Module Kits
    Route::get('/kits',                                     'Admin\KitsController@getHome')->name('kits');
    Route::post('/kit/add',                                 'Admin\KitsController@postKitAdd')->name('kits_add');
    Route::get('/kit/{id}/edit',                            'Admin\KitsController@getKitEdit')->name('kits_edit');
    Route::post('/kit/{id}/edit',                           'Admin\KitsController@postKitEdit')->name('kits_edit');
    Route::get('/kit/{id}/delete',                          'Admin\KitsController@getKitDelete')->name('kits_delete');


    //Module Carousels
    Route::get('/carousels',                                'Admin\CarouselsController@getHome')->name('carousels');
    Route::post('/carousel/add',                            'Admin\CarouselsController@postCarouselAdd')->name('carousels_add');
    Route::get('/carousel/{id}/edit',                       'Admin\CarouselsController@getCarouselEdit')->name('carousels_edit');
    Route::post('/carousel/{id}/edit',                      'Admin\CarouselsController@postCarouselEdit')->name('carousels_edit');
    Route::get('/carousel/{id}/delete',                     'Admin\CarouselsController@getCarouselDelete')->name('carousels_delete');
  

    //Module Filmographies
    Route::get('/filmographies',                            'Admin\FilmographiesController@getHome')->name('filmographies');
    Route::post('/filmography/add',                         'Admin\FilmographiesController@postFilmographyAdd')->name('filmographies_add');
    Route::get('/filmography/{id}/edit',                    'Admin\FilmographiesController@getFilmographyEdit')->name('filmographies_edit');
    Route::post('/filmography/{id}/edit',                   'Admin\FilmographiesController@postFilmographyEdit')->name('filmographies_edit');
    Route::get('/filmography/{id}/delete',                  'Admin\FilmographiesController@getFilmographyDelete')->name('filmographies_delete');


    //Module News
    Route::get('/news/{status}/',                           'Admin\NewsController@getHome')->name('news');
    Route::get('/new/add',                                  'Admin\NewsController@getNewAdd')->name('news_add');
    Route::post('/new/add/',                                'Admin\NewsController@postNewAdd')->name('news_add');
    Route::get('/news/{id}/edit',                           'Admin\NewsController@getNewsEdit')->name('news_edit');
    Route::post('/news/{id}/edit',                          'Admin\NewsController@postNewsEdit')->name('news_edit');
    Route::get('/news/{id}/delete',                         'Admin\NewsController@getNewsDelete')->name('news_delete');
    Route::get('/news/{id}/restore',                        'Admin\NewsController@getNewsRestore')->name('news_delete');
    Route::post('/news/search',                             'Admin\NewsController@postNewsSearch')->name('news_search');
    Route::post('/news/{id}/gallery/add/{gallery}',                   'Admin\NewsController@postNewsGalleryAdd')->name('news_gallery_add');
    Route::get('/news/{id}/gallery/{gid}/delete',           'Admin\NewsController@getNewsGalleryDelete')->name('news_gallery_delete');


    //Module Categories
    Route::get('/categories/{module}',                      'Admin\CategoriesController@getHome')->name('categories');
    Route::post('/category/add',                            'Admin\CategoriesController@postCategoryAdd')->name('categories_add');
    Route::get('/category/{id}/edit',                       'Admin\CategoriesController@getCategoryEdit')->name('categories_edit');
    Route::post('/category/{id}/edit',                      'Admin\CategoriesController@postCategoryEdit')->name('categories_edit');
    Route::get('/category/{id}/delete',                     'Admin\CategoriesController@getCategoryDelete')->name('categories_delete');

    //Module Quotes
    Route::get('/quotes/{status}',                         'Admin\QuotesController@getQuotes')->name('quotes');
    Route::get('/quotes/{id}/finalizar',                   'Admin\QuotesController@getQuoteDelete')->name('quotes_finish');
    Route::post('/quotes/search',                          'Admin\QuotesController@postQuotesSearch')->name('quotes_search');

     
  
});
