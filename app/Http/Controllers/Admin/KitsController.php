<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Config, Str, Image;
use App\User;
use App\Classification;
use App\Subclassification;
use App\Subarea;
use App\Warehouse;
use App\Product;
use App\Kit;

class KitsController extends Controller
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
        $subarea            = Subarea::orderBy('name', 'ASC')->get();
        $wareh              = Warehouse::orderBy('name', 'ASC')->get();
        $cats               = Kit::orderBy('name', 'ASC')->get();
        $data = ['cats' => $cats, 'clasi' => $clasi, 'subarea' => $subarea, 'subclasi' => $subclasi, 'warehouses' => $wareh];
        return view('admin.kits.home', $data);

    }

    public function postKitAdd(Request $request)
    {
        $rules = [
            'sku'                               => 'required',
            'name'                              => 'required',
            'file'                              => 'required',
            'classification'                    => 'required',

        ];

        $messages = [
            'sku.required'                      => 'Se requiere un sku para crear una familia',
            'name.required'                     => 'Se requiere un nombre para crear una familia.',
            'file.required'                     => 'Seleccione una imagen destacada una familia.',
            'file.image'                        => 'El archivo no es una imagen.',
            'classification.required'           => 'Se requiere una clasificación para crear una familia.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');

        else:

            $path = '/kits';
            $fileExt = trim($request->file('file')->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disks.uploads.root');
            $name = Str::slug(str_replace($fileExt, '', $request->file('file')->getClientOriginalName()));
            $filename = rand(1,999).'-'.$name.'.'.$fileExt;
            $file_absolute = $upload_path.'/'.$path.'/'.$filename;

            $c = new Kit;
            $c ->sku                        = e($request->input('sku'));
            $c ->status                     = '0';
            $c ->name                       = e($request->input('name'));
            $c ->file_path                  = $path;
            $c ->file                       = $filename;
            $c ->classification_id          = e($request->input('classification'));
            $c ->subclassification_id       = e($request->input('subclassification'));
            $c ->subarea_id                 = e($request->input('subarea'));
            $c ->warehouse_id               = $request->input('warehouses');

            if($c->save()):

                if($request->hasFile('file')):
                    $fl = $request->file->storeAs($path, $filename, 'uploads');
                    $imag = Image::make($file_absolute);
                    $imag->fit(256, 256, function($constraint){
                        $constraint->upsize();
                    });
                    $imag->save($upload_path.'/'.$path.'/t_'.$filename);
                endif;

                return back()->with('message', ' Kit guardado con éxito.')->with('typealert', 'success');

            endif;

        endif;

    }

    public function getKitEdit($id)
    {
        $clas = DB::table('classifications')->select(DB::raw('name, id'));
        $clasi = array() + $clas->pluck('name', 'id')->toArray();

        $subclas = DB::table('subclassifications')->select(DB::raw('name, id'));
        $subclasi = array() + $subclas->pluck('name', 'id')->toArray();

        $subareas = DB::table('subareas')->select(DB::raw('name, id'));
        $subarea = array() + $subareas->pluck('name', 'id')->toArray();

        $wareh = DB::table('warehouses')->select(DB::raw('name, id'));
        $ware = array() + $wareh->pluck('name', 'id')->toArray();

        $cat                = Kit::find( $id);
        $names = DB::table('names')->get();

        $incluidos = DB::table('kit_products')->where('kit_id',$id)->where('type', 'Obligatorio')->get(); 
        $extras = DB::table('kit_products')->where('kit_id',$id)->where('type', 'Extra')->get(); 

        $kits = DB::table('family_kits')->where('family_id', $cat->id)->get();
        //dd($incluidos);
        $data               = [
            'cat' => $cat, 
            'clasi' => $clasi, 
            'subclasi' => $subclasi, 
            'subarea' => $subarea, 
            'warehouses' => $ware,
            'incluidos' => $incluidos,
            'extras' => $extras,
            'names' => $names
             ];
        return view('admin.kits.edit', $data);
    }


    public function postKitEdit(Request $request, $id)
    {
        $rules = [
            'sku'                               => 'required',
            'name'                              => 'required',
            'classification'                    => 'required',

        ];

        $messages = [
            'sku.required'                      => 'Se requiere un sku para editar una familia',
            'name.required'                     => 'Se requiere un nombre para editar una familia.',
            'classification.required'           => 'Se requiere una clasificación para editar una familia.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();

        else:

            $c = Kit::findOrFail( $id);
            $imagepp                        = $c->file_path;
            $imagep                         = $c->file;
            $c ->status                     = e($request->input('status'));
            $c ->sku                        = e($request->input('sku'));
            $c ->name                       = e($request->input('name'));
            if($request->hasFile('file')):

                $path = '/kits';
                $fileExt = trim($request->file('file')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');
                $name = Str::slug(str_replace($fileExt, '', $request->file('file')->getClientOriginalName()));
                $filename = rand(1,999).'-'.$name.'.'.$fileExt;
                $file_absolute = $upload_path.'/'.$path.'/'.$filename;

                $c ->file_path            = $path;
                $c ->file                 = $filename;

            endif;
            $c ->classification_id          = e($request->input('classification'));
            $c ->subclassification_id       = e($request->input('subclassification'));
            $c ->subarea_id                 = e($request->input('subarea'));
            $c ->warehouse_id               = e($request->input('warehouses'));


            if($c->save()):

                if($request->hasFile('file')):
                    $fl = $request->file->storeAs($path, $filename, 'uploads');
                    $imag = Image::make($file_absolute);
                    $imag->fit(256, 256, function($constraint){
                        $constraint->upsize();
                    });
                    $imag->save($upload_path.'/'.$path.'/t_'.$filename);
                    Storage::disk('uploads')->delete('/'.$imagepp.'/'.$imagep);
                    Storage::disk('uploads')->delete('/'.$imagepp.'/t_'.$imagep);
                endif;

                return redirect('/admin/kits')->with('message', ' Kit guardado con éxito.')->with('typealert', 'success');

            endif;

        endif;

    }


    public function getKitDelete($id)
    {
        $c = Kit::find( $id);

        if($c->delete()):

            return back()->with('message', ' Kit elminado con éxito.')->with('typealert', 'success');

        endif;
    }

}

