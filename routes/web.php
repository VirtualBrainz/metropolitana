<?php

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::bind('product', function($sku) {
    return App\Product::where('sku' ,$sku)->first();
});

Route::bind('product', function($sku) {
    return App\Kit::where('sku' ,$sku)->first();
});

Route::bind('noticia', function($slug) {
    return App\News::where('slug' ,$slug)->first();
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Route::get('/', 'Blog\HomeController@getHome');


//Routes Auth
Route::get('/login',                                'ConnectController@getLogin')                   ->name('login');
Route::post('/login',                               'ConnectController@postLogin')                  ->name('login');

Route::get('/recover',                              'ConnectController@getRecover')                 ->name('recovery');
Route::post('/recover',                             'ConnectController@postRecover')                ->name('recovery');

Route::get('/reset',                                'ConnectController@getReset')                   ->name('reset');
Route::post('/reset',                               'ConnectController@postReset')                  ->name('reset');

Route::get('/register',                             'ConnectController@getRegister')                ->name('register');
Route::post('/register',                            'ConnectController@postRegister')               ->name('register');

Route::get('/logout',                               'ConnectController@getLogout')                  ->name('logout');

Route::get('/user-profile/{id}',                    ['as'=> 'user-profile',                         'uses' => 'UserController@user_profile']);
Route::get('/user-edit/{id}',                       ['as'=> 'user-edit',                            'uses' => 'UserController@user_edit']);
Route::post('/user-edit/{id}',                      ['as'=> 'user-edit',                            'uses' => 'UserController@user_edit']);


Route::get('login/{driver}',                        'ConnectController@redirectToProvider')         ->name('redirectToProvider');
Route::get('login/{driver}/callback',               'ConnectController@handleProviderCallback')     ->name('handleProviderCallback');

Route::get('/verification',                              'ConnectController@getVerification')                 ->name('verification');
Route::post('/verification',                             'ConnectController@postVerification')                ->name('verification');

/*User-actions*/
Route::get('/account/edit',                         'UserController@getAccountEdit')                 ->name('account_edit');
Route::post('/account/avatar/edit',                 'UserController@postAccountAvatar')              ->name('account_avatar_edit');
Route::post('/account/password/edit',               'UserController@postPasswordEdit')               ->name('account_password_edit');
Route::post('/account/info/edit',                   'UserController@postInfoEdit')                   ->name('account_info_edit');


/*EFD*/
Route::get('/mision',                               'Blog\HomeController@mision')                   ->name('mision');
Route::get('/sedes',                                'Blog\HomeController@sedes')                    ->name('sedes');
Route::get('/directorio',                           'Blog\HomeController@directorio')               ->name('directorio');
Route::get('/contacto',                             'Blog\HomeController@contacto')                 ->name('contacto');

/*News*/
Route::get('/noticias',                             'Blog\HomeController@news')                     ->name('news');
Route::get('noticia/{id}',                          'Blog\HomeController@noticia')                  ->name('noticia');
Route::post('/news/search',                         'Blog\HomeController@noticiaSearch')            ->name('noticiaSearch');

/*Producto-Detalle*/
Route::get('producto/{slug}',                       'Blog\HomeController@producto')                  ->name('producto');
Route::get('product/{id}',                          'Blog\HomeController@product')                   ->name('product');
Route::post('product/name/{id}',                          'Blog\HomeController@productname')                   ->name('product.name');
Route::get('name/delete/{id}', 'Blog\HomeController@getProductNameDelete')->name('post.deleted3');

/*Filmografia*/
Route::get('/filmografia',                          'Blog\HomeController@filmografia')              ->name('filmografia');
Route::get('/descargar-filmografia',                'Blog\HomeController@pdf_filmografia')          ->name('products.pdf');
Route::post('/descargar-contacto',                  'Blog\HomeController@pdf_contacto')             ->name('pdf.contacto');

/*Buscador*/
Route::get('/pdfin',                                'Blog\HomeController@pdfin')                    ->name('pdfin');
Route::get('/nombres/buscador',                     'Blog\HomeController@getNombres')               ->name('getNombres');

Route::get('/pdfin',                                ['as'=>'pdfin',                                 'uses'=> 'Blog\HomeController@pdfin']);

Route::get('/family/buscador/producto',                 'Blog\HomeController@getProductos')->name('getProductos');
Route::get('/family/buscador/kits',                     'Blog\HomeController@getKits')->name('getProductos');
Route::get('/kit/buscador/producto',                     'Blog\HomeController@getKitProducts')->name('getKitProducts');
Route::get('/producto/buscador/producto',                     'Blog\HomeController@getProductoProducto')->name('getProductoProducto');

/*Add elents kis & families*/
Route::post('/family/add-product/{id}',                'Blog\HomeController@add_product')             ->name('add.product');
Route::get('/family/product/delete/{id}',              'Blog\HomeController@getFamilyProductDelete')->name('families.product.delete');
Route::delete('post/delete/{id}', 'Blog\HomeController@getFamilyProductDelete')->name('post.delete');


Route::post('/family/add-kit/{id}',                'Blog\HomeController@add_kit')             ->name('add.kit');
Route::get('/family/kit/delete/{id}',              'Blog\HomeController@getFamilyKitDelete')->name('families.kit.delete');
Route::delete('kit/delete/{id}', 'Blog\HomeController@getFamilyKitDelete')->name('kit.delete');
Route::get('post/delete/{id}', 'Blog\HomeController@getFamilyKitDelete')->name('post.delete1');

/*Add elements kits*/

Route::post('/kit/add-product/{id}',                'Blog\HomeController@add_product_kit')             ->name('add.product1');
Route::get('/kit/product/delete/{id}',              'Blog\HomeController@getKitProductDelete')->name('kit.product.delete');
Route::delete('post/delete/{id}', 'Blog\HomeController@getKitProductDelete')->name('post.delete2');

//Routes Auth
Route::get('/register',                             'ConnectController@getRegister')                ->name('register');
Route::post('/register',                            'ConnectController@postRegister')               ->name('register');
Route::get('/verification',                         'ConnectController@getVerification')            ->name('verification');
Route::post('/verification',                        'ConnectController@postVerification')           ->name('verification');
Route::get('/login',                                'ConnectController@getLogin')                   ->name('login');
Route::post('/login',                               'ConnectController@postLogin')                  ->name('login');
Route::get('/recover',                              'ConnectController@getRecover')                 ->name('recovery');
Route::post('/recover',                             'ConnectController@postRecover')                ->name('recovery');
Route::get('/reset',                                'ConnectController@getReset')                   ->name('reset');
Route::post('/reset',                               'ConnectController@postReset')                  ->name('reset');
Route::get('/logout',                               'ConnectController@getLogout')                  ->name('logout');
Route::get('login/{driver}',                        'ConnectController@redirectToProvider')         ->name('redirectToProvider');
Route::get('login/{driver}/callback',               'ConnectController@handleProviderCallback')     ->name('handleProviderCallback');

/*User-actions*/
Route::get('/account/edit',                         'UserController@getAccountEdit')                 ->name('account_edit');
Route::post('/account/avatar/edit',                 'UserController@postAccountAvatar')              ->name('account_avatar_edit');
Route::post('/account/password/edit',               'UserController@postPasswordEdit')               ->name('account_password_edit');
Route::post('/account/info/edit',                   'UserController@postInfoEdit')                   ->name('account_info_edit');
Route::get('/user-profile/{id}',                    ['as'=> 'user-profile',                         'uses' => 'UserController@user_profile']);
Route::get('/user-edit/{id}',                       ['as'=> 'user-edit',                            'uses' => 'UserController@user_edit']);
Route::post('/user-edit/{id}',                      ['as'=> 'user-edit',                            'uses' => 'UserController@user_edit']);

/*SERVICIES*/
Route::get('/camaras/{slug}',                       ['as'=> 'camaras',                              'uses' => 'Blog\CameraController@camaras']);
Route::get('/optica/{slug}',                        ['as'=> 'optica',                               'uses' => 'Blog\OpticsController@optica']);
Route::get('/accesorios-filtros/{slug}',            ['as'=> 'accesorios-filtros',                   'uses' => 'Blog\FilterController@filtros']);
Route::get('/iluminacion/{slug}',                   ['as'=> 'iluminacion',                          'uses' => 'Blog\IluminationController@iluminacion']);
Route::get('/moviles-plantas/{slug}',               ['as'=> 'moviles-plantas',                      'uses' => 'Blog\GeneratorController@moviles_plantas']);
Route::get('/gruas-dollies-cabezas-remotas/{slug}', ['as'=> 'gruas-dollies-cabezas-remotas',        'uses' => 'Blog\CraneController@gruas_dollies_cabezas_remotas']);
Route::get('/motion-control/',                      ['as'=> 'motion',                               'uses' => 'Blog\MotionController@motion']);
Route::get('/personal/',                            ['as'=> 'personal',                             'uses' => 'Blog\PersonalController@personal']);

/*Cart-Market*/
Route::get('/cart/show',                            ['as'=> 'cart-show',                            'uses' => 'Admin\CartController@show']);
Route::get('/cart/delete/{sku}',                    ['as'=> 'cart-delete',                          'uses' => 'Admin\CartController@delete']);
Route::post('/cart/add-form/',                      ['as'=> 'cart-add-form',                        'uses' => 'Admin\CartController@add_form']);
Route::get('order-detail',                          ['middleware' => 'auth','as' => 'order-detail', 'uses' => 'Admin\CartController@orderDetail']);
Route::post('/cart/finish',                         ['as'=>'cart-finish',                           'uses' => 'Blog\HomeController@pdf_cotizacion']);
Route::get('/finalizado',                           ['as'=>'finalizado',                            'uses' => 'Blog\HomeController@finalizado']);
Route::get('/cotizaciones/{file}',                  ['as'=>'cotizaciones',                          'uses' => 'Blog\HomeController@cotizaciones']);
Route::get('/finalizar-cotizacion',                 ['as'=>'finalizar-cotizacion',                  'uses' => 'Blog\HomeController@finalizar_cotizacion']);
Route::post('/cart/add-filter/',                    ['as'=> 'cart-add-filter',                      'uses' => 'Admin\CartController@add_filter']);

Route::post('/carousel/mobile/add/{id}',                'Blog\HomeController@postCarouselMobileAdd')->name('carousels_add');
Route::get('/carousel/mobile/{id}/delete',              'Blog\HomeController@getCarouselMobileDelete')->name('carousels_delete');

//Api EFD
Route::get('api/PostCotizacion',           'Blog\ApiController@postCotizacionEfd');

