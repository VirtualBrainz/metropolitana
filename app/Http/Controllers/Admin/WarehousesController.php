<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;
use App\User;
use App\Warehouse;

class WarehousesController extends Controller
{
    public function __Construct()
    {
        $this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('user.permissions');
        $this->middleware('isadmin');
    }

    public function getHome()
    {
        $cats = Warehouse::orderBy('name', 'ASC')->get();
        $data = ['cats' => $cats];
        return view('admin.warehouses.home', $data);

    }
    public function postWarehouseAdd(Request $request)
    {
        $rules = [
            'name'                              => 'required',
            'direction'                         => 'required',
            'phone_1'                           => 'required',
            'phone_2'                           => 'required',
            'email'                             => 'required'
        ];

        $messages = [
            'name.required'                     => 'Se requiere un nombre para crear un almacén.',
            'direction.required'                => 'Se requiere una direcciíon para crear un almacén.',
            'phone_1.required'                  => 'Se requiere un telefono para crear un almacén.',
            'phone_2.required'                  => 'Se requiere una telefono para crear un almacén.',
            'email.required'                    => 'Se requiere una email para crear un almacén.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');

        else:

            $c = new Warehouse;
            $c ->name                       = e($request->input('name'));
            $c ->slug                       = Str::slug($request->input('name'));
            $c ->direction                  = e($request->input('direction'));
            $c ->phone_1                    = e($request->input('phone_1'));
            $c ->phone_2                    = e($request->input('phone_2'));
            $c ->email                      = e($request->input('email'));

            if($c->save()):

                return back()->with('message', ' Almacén guardado con éxito.')->with('typealert', 'success');

            endif;

        endif;

    }

    public function getWarehouseEdit($id)
    {

        $cat = Warehouse::find( $id);
        $data = ['cat' => $cat];
        return view('admin.warehouses.edit', $data);
    }


    public function postWarehouseEdit(Request $request, $id)
    {
        $rules = [
            'name'                              => 'required',
            'direction'                         => 'required',
            'phone_1'                           => 'required',
            'phone_2'                           => 'required',
            'email'                             => 'required',
        ];

        $messages = [
            'name.required'                     => 'Se requiere un nombre para editar un almacén.',
            'direction.required'                => 'Se requiere una direcciíon para editar un almacén.',
            'phone_1.required'                  => 'Se requiere un telefono para editar un almacén.',
            'phone_2.required'                  => 'Se requiere una telefono para editar un almacén.',
            'email.required'                    => 'Se requiere una email para editar un almacén.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');

        else:

            $c = Warehouse::findOrFail( $id);
            $c ->name                       = e($request->input('name'));
            $c ->slug                       = Str::slug($request->input('name'));
            $c ->direction                  = e($request->input('direction'));
            $c ->phone_1                    = e($request->input('phone_1'));
            $c ->phone_2                    = e($request->input('phone_2'));
            $c ->email                      = e($request->input('email'));

            if($c->save()):

                return redirect('/admin/warehouses')->with('message', ' Almacén guardado con éxito.')->with('typealert', 'success');

            endif;

        endif;

    }


    public function getWarehouseDelete($id)
    {
        $c = Warehouse::find( $id);
        $c->slug   = null;

        if($c->save()):
            $c->delete();
            return back()->with('message', ' Almacén elminado con éxito.')->with('typealert', 'success');

        endif;

    }
}
