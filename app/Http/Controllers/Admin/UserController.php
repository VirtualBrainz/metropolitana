<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Category;
use App\PGallery;
use App\Product;
use App\User;
use Config;
use Str;
use Image;

class UserController extends Controller
{
    public function __Construct()
    {
        $this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('user.permissions');
        $this->middleware('isadmin');
    }

    public function getUsers($status)
    {

        if($status == 'all'):

            $users = User::orderBy('id', 'Desc')->paginate(25);

        else :

            $users = User::where('status', $status)->orderBy('id', 'Desc')->paginate(25);

        endif;

        $data           = ['users' => $users];
        return view('admin.users.home', compact('users'));

    }

    public function getUserEdit($id)
    {
        $user           = User::findOrFail($id);
        $data           = ['user' => $user];
        return view('admin.users.users_edit', $data);

    }

    public function postUserEdit(Request $request, $id)
    {
        $user           = User::findOrFail($id);

        $user->role = $request->input('user_type');
        if($request->input('user_type') == "1"):
            if(is_null($user->permissions)):
                $permissions = [

                    'dashboard'                     => true,

                ];
                $permissions = json_encode($permissions);
                $user->permissions = $permissions;
            endif;
        else:
            $user->permissions = null;
        endif;

        if ($user->save()):

            if($request->input('user_type') == "1"):
                return redirect('/admin/user/'.$user->id.'/permissions')->with('message', 'El rango del usuario se actualizo con éxito.')->with('typealert', 'success');
            else:
                return back()->with('message', 'El rango del usuario se actualizo con éxito.')->with('typealert', 'danger');
            endif;

        endif;

    }

    public function getUserBanned($id)
    {
        $user    = User::findOrFail($id);
        if($user->status == "100"):

            $user->status = "1";
            $msg = "Usuario activado con éxito.";

        else :

            $user->status = "100";
            $msg = "Usuario suspendido con éxito.";

        endif;

        if($user->save()):

            return back()->with('message', $msg)->with('typealert', 'success');

        endif;

        $data           = ['user' => $user];
        return view('admin.users.users_edit', $data);

    }

    public function getUserPermissions($id)
    {
        $user    = User::findOrFail($id);

        $data           = ['user' => $user];
        return view('admin.users.users_permissions', $data);

    }


    //validations
    public function postUserPermissions(Request $request, $id)
    {
        $user    = User::findOrFail($id);

        $permissions = [

                    'dashboard'                     => $request->input('dashboard'),
                    'dashboard_small_stats'         => $request->input('dashboard_small_stats'),

                    'user_list'                     => $request->input('user_list'),
                    'users_edit'                    => $request->input('users_edit'),
                    'users_banned'                  => $request->input('users_banned'),
                    'users_permissions'             => $request->input('users_permissions'),

                    'quotes'                        => $request->input('quotes'),
                    'quotes_search'                 => $request->input('quotes_search'),
                    'quotes_download'               => $request->input('quotes_download'),
                    'quotes_finish'                 => $request->input('quotes_finish'),

                    'subclassifications'            => $request->input('subclassifications'),
                    'subclassifications_add'        => $request->input('subclassifications_add'),
                    'subclassifications_edit'       => $request->input('subclassifications_edit'),
                    'subclassifications_delete'     => $request->input('subclassifications_delete'),

                    'subareas'                      => $request->input('subareas'),
                    'subareas_add'                  => $request->input('subareas_add'),
                    'subareas_edit'                 => $request->input('subareas_edit'),
                    'subareas_delete'               => $request->input('subareas_delete'),

                    'warehouses'                    => $request->input('warehouses'),
                    'warehouses_add'                => $request->input('warehouses_add'),
                    'warehouses_edit'               => $request->input('warehouses_edit'),
                    'warehouses_delete'             => $request->input('warehouses_delete'),

                    'products'                      => $request->input('products'),
                    'products_add'                  => $request->input('products_add'),
                    'products_edit'                 => $request->input('products_edit'),
                    'products_delete'               => $request->input('products_delete'),
                    'products_search'               => $request->input('products_search'),
                    'product_gallery_add'           => $request->input('product_gallery_add'),
                    'product_gallery_delete'        => $request->input('product_gallery_delete'),
                    'products_names_add'            => $request->input('products_names_add'),
                    'products_names_edit'           => $request->input('products_names_edit'),
                    'products_names_delete'         => $request->input('products_names_delete'),

                    'families'                      => $request->input('families'),
                    'families_add'                  => $request->input('families_add'),
                    'families_edit'                 => $request->input('families_edit'),
                    'families_delete'               => $request->input('families_delete'),
                    'families_kits_add'             => $request->input('families_kits_add'),
                    'families_kits_edit'            => $request->input('families_kits_edit'),
                    'families_kits_delete'          => $request->input('families_kits_delete'),
                    'families_products_add'         => $request->input('families_products_add'),
                    'families_products_edit'        => $request->input('families_products_edit'),
                    'families_products_delete'      => $request->input('families_products_delete'),

                    'kits'                          => $request->input('kits'),
                    'kits_add'                      => $request->input('kits_add'),
                    'kits_edit'                     => $request->input('kits_edit'),
                    'kits_delete'                   => $request->input('kits_delete'),
                    'kits_products_add'             => $request->input('kits_products_add'),
                    'kits_products_edit'            => $request->input('kits_products_edit'),
                    'kits_products_delete'          => $request->input('kits_products_delete'),

                    'carousels'                     => $request->input('carousels'),
                    'carousels_add'                 => $request->input('carousels_add'),
                    'carousels_edit'                => $request->input('carousels_edit'),
                    'carousels_delete'              => $request->input('carousels_delete'),

                    'filmographies'                 => $request->input('filmographies'),
                    'filmographies_add'             => $request->input('filmographies_add'),
                    'filmographies_edit'            => $request->input('filmographies_edit'),
                    'filmographies_delete'          => $request->input('filmographies_delete'),

                    'news'                          => $request->input('news'),
                    'news_add'                      => $request->input('news_add'),
                    'news_edit'                     => $request->input('news_edit'),
                    'news_delete'                   => $request->input('news_delete'),
                    'news_search'                   => $request->input('news_search'),
                    'news_gallery_add'              => $request->input('news_gallery_add'),
                    'news_gallery_delete'           => $request->input('news_gallery_delete'),

                    'categories'                    => $request->input('categories'),
                    'categories_add'                => $request->input('categories_add'),
                    'categories_edit'               => $request->input('categories_edit'),
                    'categories_delete'             => $request->input('categories_delete'),

                    ];
        $permissions = json_encode($permissions);
        $user->permissions = $permissions;

        if ($user->save()):
            return back()->with('message', 'Los permisos de ususario fueron actualizados con exito')->with('typealert', 'success');
        endif;

    }





}

