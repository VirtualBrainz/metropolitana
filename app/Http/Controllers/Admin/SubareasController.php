<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;
use App\User;
use App\Classification;
use App\Subclassification;
use App\Subarea;


class SubareasController extends Controller
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
        $clasi              = Classification::orderBy('name', 'ASC')->get();
        $subclasi           = Subclassification::orderBy('name', 'ASC')->get();
        $cats               = Subarea::orderBy('name', 'ASC')->get();
        $data               = ['cats' => $cats, 'clasi' => $clasi, 'subclasi' => $subclasi];
        return view('admin.subareas.home', $data);

    }

    public function postSubareaAdd(Request $request)
    {
        $rules = [
            'name'                              => 'required',
            'classification'                    => 'required',
            'subclassification'                 => 'required'
        ];

        $messages = [
            'name.required'                     => 'Se requiere un nombre para crear la subclasificación.',
            'classification.required'           => 'Se requiere una clasificación para crear la subclasificación.',
            'subclassification.required'        => 'Se requiere una subclasificación para crear la subclasificación.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();

        else:

            $c = new Subarea;
            $c ->classification_id          = e($request->input('classification'));
            $c ->subclassification_id       = e($request->input('subclassification'));
            $c ->name                       = e($request->input('name'));
            $c ->slug                       = Str::slug($request->input('name'));

            if($c->save()):

                return back()->with('message', ' Subclasificación guardada con éxito.')->with('typealert', 'success');

            endif;

        endif;

    }

    public function getSubareaEdit($id)
    {
        $clas = DB::table('classifications')->select(DB::raw('name, id'));
        $clasi = array() + $clas->pluck('name', 'id')->toArray();
        $subclas = DB::table('subclassifications')->select(DB::raw('name, id'));
        $subclasi = array() + $subclas->pluck('name', 'id')->toArray();
        $cat                = Subarea::find( $id);
        $data               = ['cat' => $cat, 'clasi' => $clasi, 'subclasi' => $subclasi];
        return view('admin.subareas.edit', $data);
    }


    public function postSubareaEdit(Request $request, $id)
    {
        $rules = [
            'name'                              => 'required',
            'classification'                    => 'required',
            'subclassification'                 => 'required'
        ];

        $messages = [
            'name.required'                     => 'Se requiere un nombre para crear la subclasificación.',
            'classification.required'           => 'Se requiere una clasificación para crear la subclasificación.',
            'subclassification.required'        => 'Se requiere una subclasificación para crear la subclasificación.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();

        else:

            $c = Subarea::findOrFail( $id);
            $c ->classification_id          = e($request->input('classification'));
            $c ->subclassification_id       = e($request->input('subclassification'));
            $c ->name                       = e($request->input('name'));
            $c ->slug                       = Str::slug($request->input('name'));

            if($c->save()):

                return redirect('/admin/subareas')->with('message', ' Subarea guardada con éxito.')->with('typealert', 'success');

            endif;

        endif;

    }


    public function getSubareaDelete($id)
    {
        $c = Subarea::find( $id);

        if($c->delete()):

            return back()->with('message', ' Subarea elminada con éxito.')->with('typealert', 'success');

        endif;
    }


}
