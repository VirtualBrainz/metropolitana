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
use App\NGallery;
use App\News;

class NewsController extends Controller
{
    public function __Construct()
    {
        $this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('user.permissions');
        $this->middleware('isadmin');
    }

    public function getHome($status)
    {

        switch ($status) {

            case '1':
                $products = News::where('status', '1')->orderBy('id', 'DESC')->paginate(20);
                break;
            case '0':
                $products = News::where('status', '0')->orderBy('id', 'DESC')->paginate(20);
                break;
            case 'trash':
                $products = News::onlyTrashed()->orderBy('id', 'DESC')->paginate(20);
                break;

            default:
                # code...
                break;
        }
        $data = ['news' => $products];
        return view('admin.news.home', $data);

    }


    public function getNewAdd()
    {
        $cats = News::where('module', 0)->pluck('name', 'id');
        $data = ['cats' => $cats];
        return view('admin.news.add', $data);

    }


    public function postNewAdd(Request $request)
    {
        $rules = [
    		'name'                              => 'required',
            'file'                              => 'required',
            'body_1'                              => 'required',
            'date'                              => 'required'
        ];

        $messages = [
            'name.required'                     => 'El nombre de la noticia es requerido.',
            'file.required'                     => 'Seleccione una imagen destacada de noticia.',
            'body_1.required'                     => 'La descripción de la noticia es requerida.',
            'date.required'                     => 'La fecha de la noticia es requerida.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();

        else:

            $path = '/News';
            $fileExt = trim($request->file('file')->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disks.uploads.root');
            $name = Str::slug(str_replace($fileExt, '', $request->file('file')->getClientOriginalName()));
            $filename = rand(1,999).'-'.$name.'.'.$fileExt;
            $file_absolute = $upload_path.'/'.$path.'/'.$filename;




            $product = new News;
            $product->status                = '0';
            $product ->name                 = e($request->input('name'));
            $product ->slug                 = Str::slug($request->input('name'));
            $product ->file_path            = $path;
            $product ->file                 = $filename;

            $product ->date                 = e($request->input('date'));

            $product ->video_1                 = e($request->input('video_1'));

            $product ->body_1                 = e($request->input('body_1'));


            if($product->save()):

                if($request->hasFile('file')):
                    $fl = $request->file->storeAs($path, $filename, 'uploads');
                    $imag0 = Image::make($file_absolute, function($constraint){
                        $constraint->upsize();
                    });
                    $imag = Image::make($file_absolute, function($constraint){
                        $constraint->upsize();
                    });
                    $imag->fit(256, 256, function($constraint){
                        $constraint->upsize();
                    });
                    $imag0->save($upload_path.'/'.$path.'/'.$filename);
                    $imag->save($upload_path.'/'.$path.'/t_'.$filename);
                endif;

                return redirect('/admin/news/1')->with('message', ' Noticía guardada con éxito.')->with('typealert', 'success');

            endif;

        endif;
    }


    public function getNewsEdit($id)
    {
        $product        = News::findOrFail($id);
        $galerias        =NGallery::where('news_id', $product->id)->get();

        $data           = ['product' => $product, 'galeria' => $galerias];
        //dd($galerias);
        return view('admin.news.edit', $data);
    }


    public function postNewsEdit(Request $request, $id)
    {
        $rules = [
    		'name'                              => 'required'
        ];

        $messages = [
            'name.required'                     => 'El nombre del producto es requerido.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();

        else:



            $product                        = News::findOrFail( $id);
            $imagepp                        = $product->file_path;
            $imagep                         = $product->file;
            $product->status                = e($request->input('status'));
            $product ->name                 = e($request->input('name'));
            $product ->slug                 = Str::slug($request->input('name'));
            $product ->video_1                 = e($request->input('video_1'));
            $product ->video_2                 = e($request->input('video_2'));
            $product ->video_3                 = e($request->input('video_3'));
            $product ->video_4                 = e($request->input('video_4'));
            $product ->video_5                 = e($request->input('video_5'));

            $product ->date                 = e($request->input('date'));

            $product ->body_1                 = e($request->input('body_1'));
            $product ->body_2                 = e($request->input('body_2'));
            $product ->body_3                = e($request->input('body_3'));
            $product ->body_4                 = e($request->input('body_4'));
            $product ->body_5                = e($request->input('body_5'));


            if($request->hasFile('file')):

                $path = '/News';
                $fileExt = trim($request->file('file')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');
                $name = Str::slug(str_replace($fileExt, '', $request->file('file')->getClientOriginalName()));
                $filename = rand(1,999).'-'.$name.'.'.$fileExt;
                $file_absolute = $upload_path.'/'.$path.'/'.$filename;

                $product ->file_path            = $path;
                $product ->file                 = $filename;

            endif;

            if($product->save()):

                if($request->hasFile('file')):
                    $fl = $request->file->storeAs($path, $filename, 'uploads');
                    $imag = Image::make($file_absolute, function($constraint){
                        $constraint->upsize();
                    });
                    $imag->fit(256, 256, function($constraint){
                        $constraint->upsize();
                    });
                    $imag->save($upload_path.'/'.$path.'/t_'.$filename);
                    Storage::disk('uploads')->delete('/'.$imagepp.'/'.$imagep);
                    Storage::disk('uploads')->delete('/'.$imagepp.'/t_'.$imagep);
                endif;

                return back()->with('message', ' Notícia actualizada con éxito.')->with('typealert', 'success');

            endif;


        endif;

    }


    public function getNewsDelete($id)
    {
        $product = News::find( $id);

        if($product->delete()):

            return back()->with('message', ' Notícia enviada con éxito a la papeplera.')->with('typealert', 'success');

        endif;
    }


    public function getNewsRestore($id)
    {
        $product = News::onlyTrashed()->where('id', $id)->first();
        $product ->deleted_at   = null;

            if ($product->save()):

                return redirect('/admin/news/'.$product->id.'/edit')->with('message', ' La notícia se restauro correctamente.')->with('typealert', 'success')->withInput();

            else:

                return redirect('/admin/news/'.$product->id.'/edit')->with('message', ' La notícia se restauro correctamente.')->with('typealert', 'success')->withInput();

            endif;

    }

    public function postNewsGalleryAdd($id, $gallery, Request $request)
    {

        $rules = [
    		'file_image'                        => 'required',
        ];

        $messages = [
            'file_image.required'               => 'Seleccione una imagen.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();

        else:
            if($request->hasFile('file_image')):
                $path = '/News/'.$id;
                $fileExt = trim($request->file('file_image')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');

                $name = Str::slug(str_replace($fileExt, '', $request->file('file_image')->getClientOriginalName()));

                $filename = rand(1,999).'-'.$name.'.'.$fileExt;
                $file_absolute = $upload_path.'/'.$path.'/'.$filename;

                switch ($gallery):
                    case '1':
                        $g =new NGallery;
                        $g->news_id = $id;
                        $g->after = $gallery;
                        $g->file_path = $path;
                        $g->file_name = $filename;
                        break;
                    case '2':
                        $g =new NGallery;
                        $g->news_id = $id;
                        $g->after = $gallery;
                        $g->file_path = $path;
                        $g->file_name = $filename;
                        break;
                    case '3':
                        $g =new NGallery;
                        $g->news_id = $id;
                        $g->after = $gallery;
                        $g->file_path = $path;
                        $g->file_name = $filename;
                        break;
                    case '4':
                        $g =new NGallery;
                        $g->news_id = $id;
                        $g->after = $gallery;
                        $g->file_path = $path;
                        $g->file_name = $filename;
                        break;
                    case '5':
                        $g =new NGallery;
                        $g->news_id = $id;
                        $g->after = $gallery;
                        $g->file_path = $path;
                        $g->file_name = $filename;
                        break;
                endswitch;





               if($g->save()):

                    if($request->hasFile('file_image')):
                        $fl = $request->file_image->storeAs($path, $filename, 'uploads');
                        $imag = Image::make($file_absolute, function($constraint){
                            $constraint->upsize();
                        });
                        $imag->fit(256, 256, function($constraint){
                            $constraint->upsize();
                        });
                        $imag->save($upload_path.'/'.$path.'/t_'.$filename);
                    endif;

                    return back()->with('message', ' Archivo multimedia guardado con éxito.')->with('typealert', 'success')->withInput();

                endif;
            endif;
        endif;

    }

    public function getNewsGalleryDelete($id, $gid)
    {
        $g = NGallery::findOrFail( $gid);
        $path = $g->file_path;
        $file = $g->file_name;
        $upload_path = Config::get('filesystems.disks.uploads.root');

        if($g->news_id != $id):

            return back()->with('message', 'La imagen no se puede eliminar.')->with('typealert', 'danger')->withInput();

        else:

            if($g->delete()):

                Storage::disk('uploads')->delete('/'.$path.'/'.$file);
                Storage::disk('uploads')->delete('/'.$path.'/t_'.$file);
                return back()->with('message', 'Imagen borrada con éxito.')->with('typealert', 'success')->withInput();

            endif;

        endif;
    }

    public function postNewsSearch (Request $request)
    {

        $rules = [
    		'search'                              => 'required'
        ];

        $messages = [
            'search.required'                     => 'Se requiere infomacion para buscar.'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();

        else:

            $products = News::where('name', 'LIKE', '%'.$request->input('search').'%')->where('status', $request->input('status'))->orderBy('id', 'DESC')->get();


            $data = ['news' => $products];
            return view('admin.news.search', $data);

        endif;
    }




}
