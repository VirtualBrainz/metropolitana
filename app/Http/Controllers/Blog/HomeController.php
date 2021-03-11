<?php

namespace App\Http\Controllers\Blog;

use App\Carousel;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
Use App\Mail\UserSendQuote;
Use App\Mail\EFDSendQuote;
use Config, Str, Image;
use App\User;
use App\Mail\MessageReceived;
use App\Proyect;
use App\Family;
use App\Kit;
use App\Mail\EFDmail;
use App\News;
use App\Name;
use App\Classification;
use App\Subclassification;
use App\Subarea;
use App\Product;
use App\FamilyProduct;
use App\FamilyKit;
use App\KitProduct;
use App\CMobile;
use Dompdf\Dompdf;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getHome()
    {
        $clasificaciones        = DB::table     ('classifications')             ->get();
        $subclasificaciones     = DB::table     ('subclassifications')          ->orderBy   ('orden', 'ASC')->get();

        $carrousels             = DB::table     ('carousels') ->orderBy   ('name', 'ASC')                   ->where('deleted_at', null)->get();
        $carrouselsmob          = DB::table      ('c_mobiles') ->orderBy ('carousel_id', 'ASC')->get();

        $camaras                = Subclassification::  where('classification_id', 1)  ->orderBy   ('orden', 'ASC')-> first();
        $optica                 = Subclassification:: where('classification_id', 2) ->orderBy   ('orden', 'ASC')-> first();
        $filtros                = Subclassification::where('classification_id', 3)  ->orderBy   ('orden', 'ASC')-> first();
        $iluminacion            = Subclassification:: where('classification_id', 4)      ->orderBy   ('orden', 'ASC')-> first();
        $moviles                = Subclassification::where('classification_id', 5)  ->orderBy   ('orden', 'ASC')-> first();
        $gruas                  = Subclassification::where('classification_id', 6) ->orderBy   ('orden', 'ASC')-> first();


        //dd($camaras);
        return view('efd.principal.home', compact( 'clasificaciones', 'subclasificaciones', 'carrousels','camaras','optica','filtros','iluminacion','moviles','gruas', 'carrouselsmob'));
    }

    /**
    * Buscador.
    */
    public function getNombres (Request $request)
    {

        $clasificaciones        = DB::table     ('classifications')             ->get();
        $subclasificaciones     = DB::table     ('subclassifications')          ->orderBy   ('orden', 'ASC')->get();

        $familias = Family::where('name', 'like', '%'.$request->input('texto').'%')->orderBy('name', 'ASC')->get();
        $kits = Kit::where('name', 'like', '%'.$request->input('texto').'%')->orderBy('name', 'ASC')->get();

        $data = ['familias' => $familias, 'kits' => $kits, 'clasificaciones' => $clasificaciones, 'subclasificaciones' => $subclasificaciones];

        return view('efd.principal.search', $data);

    }
    public function getProductos(Request $request){

        $familias = Name::where('name', 'like', '%'.$request->input('texto').'%')->orderBy('name', 'ASC')->get();

        $data = [
            'productos' => $familias,
         ];

        return view('efd.principal.product', $data);
    }

    public function getKits(Request $request){

        $kits = Kit::where('name', 'like', '%'.$request->input('texto').'%')->orderBy('name', 'ASC')->get();

        $data = ['kits' => $kits];
        //dd($kits);
        return view('efd.principal.kit', $data);
    }

    public function getKitProducts (Request $request){

        $productos = Name::where('name', 'like', '%'.$request->input('texto').'%')->orderBy('name', 'ASC')->get();

        $data = ['productos' => $productos];
        //dd($kits);
        return view('efd.principal.kitproducto', $data);
    }

    public function getProductoProducto (Request $request){

        $productos = Product::where('sku', 'like', '%'.$request->input('texto').'%')->orderBy('sku', 'ASC')->get();

        $data = ['cats' => $productos];
        //dd($kits);
        return view('efd.principal.productoproducto', $data);
    }

    /**
    * Noticias.
    */
    public function news()
    {
        $clasificaciones        = DB::table     ('classifications')             ->get();
        $subclasificaciones     = DB::table     ('subclassifications')          ->orderBy   ('orden', 'ASC')->get();

        $news                   = DB::table     ('news')                      ->get();
        
        $newsB                  = DB::table     ('news')                        ->orderBy   ('id', 'DESC')   ->paginate(1);

        $mediana1               = DB::table     ('news')                        ->orderBy('id', 'desc')->skip(1)->take(1)->get();
        $mediana2               = DB::table     ('news')                        ->orderBy('id', 'desc')->skip(2)->take(1)->get();
        $imagen                 = DB::table     ('n_galleries')                 ->get();
        return view('efd.principal.news', compact('clasificaciones', 'subclasificaciones' ,  'news', 'newsB', 'mediana1', 'mediana2', 'imagen' ));
    }

    public function noticiaSearch (Request $request)
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
            $clasificaciones        = DB::table     ('classifications')             ->get();
            $subclasificaciones     = DB::table     ('subclassifications')          ->orderBy   ('orden', 'ASC')->get();

            $news = News::where('name', 'LIKE', '%'.$request->input('search').'%')->orderBy('id', 'DESC')->get();

            $data = ['news' => $news, 'clasificaciones' => $clasificaciones, 'subclasificaciones' => $subclasificaciones];
            return view('efd.principal.searchnews', $data);
        endif;
    }


    public function noticia($id)
    {
        $clasificaciones        = DB::table     ('classifications')             ->get();
        $subclasificaciones     = DB::table     ('subclassifications')          ->orderBy   ('orden', 'ASC')->get();

        $small                  = DB::table     ('news')                        ->get();
        $post                   = DB::table     ('news')                        ->where     ('id',       $id)                   ->first();
        //dd($post);
        $imagenes1               = DB::table     ('n_galleries')                ->where     ('after',  1)   ->where     ('news_id',  $id)->whereNull('deleted_at')->get();
        $imagenes2               = DB::table     ('n_galleries')                ->where     ('after',  2 )   ->where     ('news_id',  $id)->whereNull('deleted_at')->get();
        $imagenes3               = DB::table     ('n_galleries')                ->where     ('after',  3 )   ->where     ('news_id',  $id)->whereNull('deleted_at')->get();
        $imagenes4               = DB::table     ('n_galleries')                ->where     ('after',  4 )   ->where     ('news_id',  $id)->whereNull('deleted_at')->get();
        $imagenes5               = DB::table     ('n_galleries')                ->where     ('after',  5 )   ->where     ('news_id',  $id)->whereNull('deleted_at')->get();

        
        return view('web.noticia', compact('clasificaciones', 'subclasificaciones' , 'post', 'small', 'imagenes1', 'imagenes2', 'imagenes3', 'imagenes4', 'imagenes5'));
    }



    //EFD Info

    public function mision()
    {
        $clasificaciones        = DB::table     ('classifications')             ->get();
        $subclasificaciones     = DB::table     ('subclassifications')          ->orderBy   ('orden', 'ASC')->get();

        return view('efd.mision', compact( 'clasificaciones', 'subclasificaciones'));

    }
    public function sedes()
    {
        $clasificaciones        = DB::table     ('classifications')             ->get();
        $subclasificaciones     = DB::table     ('subclassifications')          ->orderBy   ('orden', 'ASC')->get();

        return view('efd.sedes', compact( 'clasificaciones', 'subclasificaciones'));

    }
    public function directorio()
    {
        $clasificaciones        = DB::table     ('classifications')             ->get();
        $subclasificaciones     = DB::table     ('subclassifications')          ->orderBy   ('orden', 'ASC')->get();

        return view('efd.directorio', compact( 'clasificaciones', 'subclasificaciones'));

    }
    public function contacto()
    {
        $clasificaciones        = DB::table     ('classifications')             ->get();
        $subclasificaciones     = DB::table     ('subclassifications')          ->orderBy   ('orden', 'ASC')->get();

        return view('efd.contacto', compact( 'clasificaciones', 'subclasificaciones'));

    }


    public function filmografia()
    {


        $clasificaciones        = DB::table     ('classifications')             ->get();
        $subclasificaciones     = DB::table     ('subclassifications')          ->orderBy   ('orden', 'ASC')->get();

        $years                   = DB::table     ('years')                       ->orderBy('name','DESC')->get();
        $filmografias           = DB::table     ('filmographies')               ->get();


        return view('experience.experiencia', compact( 'clasificaciones', 'subclasificaciones', 'years', 'filmografias' ));

    }


    public function pdf_filmografia()
    {
        /**
         * toma en cuenta que para ver los mismos
         * datos debemos hacer la misma consulta
        **/
        $products               = DB::table     ('years')                       ->orderBy('name','DESC')->get();
        $filmografias           = DB::table     ('filmographies')               ->get();

        $pdf                    = PDF::loadView ('pdf.filmografia', compact('products', 'filmografias'));

        return $pdf->download('filmografias.pdf');
    }

    public function pdf_cotizacion(Request $request)
    {
        $date1 = $request->input('date-init');
        $date2 = $request->input('date-finish');
        $house = $request->input('house');
        $loca = $request->input('loca');
        $proyectoname = $request->input('name');

        $clasificaciones = DB::table('classifications')->get();
        $subclasificaciones = DB::table('subclassifications')->get();

        $clasificaciones1 = DB::table('classifications')->get();
        $subclasificaciones1 = DB::table('subclassifications')->get();

        $kits = DB::table('kits')->get();
        $productos = DB::table('products')->get();
        $names = DB::table('names')->get();
        $incluidos = DB::table('kit_products')->get();
        $extras = DB::table('kit_products')->where('type', 'EXTRA')->get();

        $cart = \Session::get('cart');
      //  dd($cart);
       
       // $cartjson = json_encode($cart);
        //dd($cartjson);
        $filename = rand(1,99999);
        $ctz = 'CTZ-'.$filename;

        $pdf    = PDF::loadView ('market.pdf', compact('cart', 'total', 'clasificaciones', 'subclasificaciones' , 'clasificaciones1', 'subclasificaciones1' , 'kits',  'productos', 'names', 'incluidos', 'extras', 'filename','date1', 'date2', 'house', 'loca','proyectoname'))->setPaper('a4', 'portrait');
        $jsonefd = response()->json(compact('ctz', 'date1', 'date2', 'house', 'loca','proyectoname', 'cart'));
         
        $name = e($request->input('name'));

       


        $path2 = '/PDF';
        $upload_path = Config::get('filesystems.disks.uploads.root');
        $file_absolute = $upload_path.'/'.$path2.'/'.$name.'.pdf';


        $rules = [
            'name'                              => 'required'
        ];

        $messages = [
            'name.required'                     => 'Se requiere un nombre para crear una cotización.',
        ];



        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');

        else:

            $c = new Proyect;
            $c ->user_id                   = Auth::user()->id;
            $c->name                      = e($request->input('name'));
            $c ->slug                       = Str::slug($request->input('name'));
            $c ->file_path                      =  $path2;
            $c ->file                      =  $name.'.pdf';
            $c ->sku                        = $ctz;
            $c ->json                        = Str::substr( $jsonefd, 130);

             

            $user1 = User::where('id', Auth::user()->id)->first();
            $data = ['name' => $c->name   , 'sku' => $c ->sku, 'users1'=>$user1];
            $sku = $c->sku;
            if($c->save()):

                $user = User::where('id', Auth::user()->id)->first();
                $ctz = Proyect::where('sku', $sku)->first();
             /*  Mail::send('emails.userquote', $data, function($message)use($user1, $pdf, $sku) {

                    $message->to($user1["email"], $user1["email"])
                            ->subject('Consulta de:'.$user1["name"])
                            ->attachData($pdf->output(), $sku.'.pdf');
                });

                Mail::send('emails.efd_quote', $data, function($message)use($user1, $pdf, $sku) {
                    $message->to('ernesto.mej.cam@gmail.com','ernesto.mej.cam@gmail.com')
                            ->subject('Consulta de:'.$user1["name"])
                            ->attachData($pdf->output(), $sku.'.pdf');
                });*/

                $path = Storage::disk('uploads')->put('PDF/'.$name.'.pdf', $pdf->output());

                
                return $pdf->download($name.'.pdf');
                
                 //$pdf->download($name.'.pdf');
                 //return $pdf->stream();


            endif;


        endif;



    }

    public function finalizar_cotizacion()
    {
        \Session::forget('cart');

        return redirect('/');
    }

    public function pdf_contacto()
    {

       $contacto =  request()->validate([
            'name'=>'required',
            'lastname'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'Business_Type'=>'required',
            'tema'=>'required',

         ]);

         Mail::to('ernesto.mej.cam@gmail.com')->queue(new EFDmail($contacto));

         $clasificaciones       = DB::table     ('classifications')             ->get();
         $subclasificaciones    = DB::table     ('subclassifications')          ->get();

         return view('emails.send', compact('clasificaciones', 'subclasificaciones'));

    }

    public function producto($slug)
    {

        $clasificaciones                = DB::table     ('classifications')             ->get();
        $subclasificaciones     = DB::table('subclassifications')           ->orderBy   ('orden', 'ASC') ->get();

        $clasificaciones1               = DB::table('classifications')->get();
        $subclasificaciones1            = DB::table('subclassifications')->get();
        $subareas                       = DB::table('subareas')->orderBy   ('orden', 'ASC')->get();


        $product                        = Kit::where     ('slug', $slug)   ->first();

        $kits                           = DB::table     ('kits')                        ->get();
        $productos                      = DB::table     ('products')                    ->get();
        $names                          = DB::table     ('names')                       ->get();
        //$incluidos                      = DB::table     ('kit_products')->orderBy('orden', 'ASC')             ->get();
        $incluidos = DB::table('kit_products')->where     ('kit_id',  $product->id)
            ->join('names', 'kit_products.product_id', '=', 'names.product_id')
            ->join('products', 'kit_products.product_id', '=', 'products.id')
            ->orderBy   ('orden', 'ASC')
            ->where     ('type', 'Obligatorio')
            ->get();

        $extras = DB::table('kit_products')->where     ('kit_id',  $product->id)
            ->join('names', 'kit_products.product_id', '=', 'names.product_id')
            ->join('products', 'kit_products.product_id', '=', 'products.id')
            ->where     ('type', 'Extra')->get();
            //dd($extras);
        //$extras                         = DB::table     ('kit_products')                ->where     ('type', 'Extra')->orderBy('orden', 'ASC')->get();

        $camaras     = Subclassification::  where('classification_id', 1)  ->orderBy   ('orden', 'ASC')-> first();

        $optica     = Subclassification:: where('classification_id', 2) ->orderBy   ('orden', 'ASC')-> first();
        $filtros     = Subclassification::where('classification_id', 3)  ->orderBy   ('orden', 'ASC')-> first();
        $iluminacion     = Subclassification:: where('classification_id', 4)      ->orderBy   ('orden', 'ASC')-> first();
        $moviles     = Subclassification::where('classification_id', 5)  ->orderBy   ('orden', 'ASC')-> first();
        $gruas     = Subclassification::where('classification_id', 6) ->orderBy   ('orden', 'ASC')-> first();


        return view('web.producto', compact('clasificaciones', 'subclasificaciones' , 'clasificaciones1', 'subclasificaciones1' , 'subareas', 'kits',  'productos', 'names', 'incluidos', 'product', 'extras','camaras','optica','filtros','iluminacion','moviles','gruas'));

    }

    public function product($slug)
    {

        $clasificaciones                = DB::table     ('classifications')             ->get();
        $subclasificaciones     = DB::table('subclassifications')           ->orderBy   ('orden', 'ASC') ->get();

        $clasificaciones1               = DB::table('classifications')->get();
        $subclasificaciones1            = DB::table('subclassifications')->get();
        $subareas                       = DB::table('subareas')->orderBy   ('orden', 'ASC')->get();
        $product                = DB::table     ('families')                        ->where     ('slug', $slug)   ->first();

        $kit                   = DB::table     ('family_kits')->where('family_id', $product->id)->get();

        $kits                   = DB::table     ('kits')                        ->get();
        $productos              = DB::table     ('products')                    ->get();
        $names                  = DB::table     ('names')                       ->get();

        $incluidos              = DB::table     ('family_kits')   ->where('family_id', $product->id)
        ->join('kits', 'family_kits.kit_id', '=', 'kits.id')
        ->orderBy('orden', 'ASC')     ->get();
        //dd($incluidos);
        $extras                 = DB::table     ('family_products')->where('family_id', $product->id)
        ->join('names', 'family_products.product_id', '=', 'names.product_id')
        ->join('products', 'family_products.product_id', '=', 'products.id')
        ->orderBy('orden', 'ASC')              ->get();

        $camaras     = Subclassification::  where('classification_id', 1)  ->orderBy   ('orden', 'ASC')-> first();

        $optica     = Subclassification:: where('classification_id', 2) ->orderBy   ('orden', 'ASC')-> first();
        $filtros     = Subclassification::where('classification_id', 3)  ->orderBy   ('orden', 'ASC')-> first();
        $iluminacion     = Subclassification:: where('classification_id', 4)      ->orderBy   ('orden', 'ASC')-> first();
        $moviles     = Subclassification::where('classification_id', 5)  ->orderBy   ('orden', 'ASC')-> first();
        $gruas     = Subclassification::where('classification_id', 6) ->orderBy   ('orden', 'ASC')-> first();

        return view('web.producto', compact('clasificaciones', 'subclasificaciones' , 'clasificaciones1', 'subclasificaciones1' , 'subareas', 'kits',  'productos', 'names', 'incluidos', 'product', 'extras', 'kit','camaras','optica','filtros','iluminacion','moviles','gruas'));

    }

    public function finalizado()
    {


        $extras                 = DB::table     ('proyects')              ->get();

        return view('market.finalizado', compact('extras'));

    }

    public function cotizaciones($file)
    {
        $proyecto = DB::table('proyects')->where('file', $file)->first();
        return $proyecto;

    }

    public function user_profile($id)
    {

        $clasificaciones                = DB::table     ('classifications')             ->get();
        $subclasificaciones     = DB::table     ('subclassifications')          ->orderBy   ('orden', 'ASC')->get();

        $clasificaciones1               = DB::table('classifications')->get();
        $subclasificaciones1            = DB::table('subclassifications')->get();
        $proyectos                      = DB::table('proyects')->get();

        return view('efd.usuario.user-profile', compact('clasificaciones', 'subclasificaciones' , 'clasificaciones1', 'subclasificaciones1', 'proyectos'));
    }

    public function user_edit($id)
    {

        $usuario                        = DB::table('users')->where('id', $id)->first();

        $clasificaciones                = DB::table     ('classifications')             ->get();
        $subclasificaciones     = DB::table     ('subclassifications')          ->orderBy   ('orden', 'ASC')->get();

        $clasificaciones1               = DB::table('classifications')->get();
        $subclasificaciones1            = DB::table('subclassifications')->get();

        return view('efd.usuario.user-edit', compact('clasificaciones', 'subclasificaciones' , 'clasificaciones1', 'subclasificaciones1', 'usuario'));
    }

    public function pdfin()
    {

            $kits = DB::table('kits')->get();
            $productos = DB::table('products')->get();
            $names = DB::table('names')->get();
            $incluidos = DB::table('kit_products')->get();
            $extras = DB::table('kit_products')->where('type', 'EXTRA')->get();

            $cart = \Session::get('cart');

            return view('market.pdf', compact('kits', 'productos', 'names', 'incluidos', 'extras', 'cart'));
    }

    public function add_product(Request $request, $id)
    {
        $c = new FamilyProduct;
        $c ->family_id                  = $id;
        $c ->product_id                 = $request->input('producto');
        $c ->type                       = e($request->input('type'));
        $c ->orden                      = e($request->input('orden'));
        if($c->save()):

            return back()->with('message', ' Familia actualizada con éxito.')->with('typealert', 'success');

        endif;
    }
    public function getFamilyProductDelete($id)
    {
        $c = FamilyProduct::find( $id);

        if($c->delete()):

            return back()->with('message', ' Producto eliminado con éxito.')->with('typealert', 'success');

        endif;
    }

    public function add_kit(Request $request, $id)
    {
        $c = new FamilyKit;
        $c ->family_id                  = $id;
        $c ->kit_id                 = $request->input('kit');

        if($c->save()):

            return back()->with('message', ' Familia actualizada con éxito.')->with('typealert', 'success');

        endif;
    }
    public function getFamilyKitDelete($id)
    {
        $c = FamilyKit::find( $id);

        if($c->delete()):

            return back()->with('message', ' Producto eliminado con éxito.')->with('typealert', 'success');

        endif;
    }

    public function add_product_kit(Request $request, $id)
    {
        $c = new KitProduct();
        $c ->kit_id                  = $id;
        $c ->product_id                     = $request->input('productokit');
        $c ->type                       = e($request->input('type'));
        $c ->orden                      = e($request->input('orden'));
        $c ->quantity                      = e($request->input('quantity'));
        if($c->save()):

            return back()->with('message', ' Familia actualizada con éxito.')->with('typealert', 'success');

        endif;
    }
    public function getKitProductDelete($id)
    {
        $c = KitProduct::find( $id);

        if($c->delete()):

            return back()->with('message', ' Producto eliminado con éxito.')->with('typealert', 'success');

        endif;
    }

    public function productname(Request $request, $id )
    {
        $c = new Name();
        $c ->product_id                  = $id;
        $c ->warehouse_id                     = $request->input('almacen');
        $c ->name                       = e($request->input('name'));

        if($c->save()):

            return back()->with('message', ' Producto actualizado con éxito.')->with('typealert', 'success');

        endif;
    }

    public function getProductNameDelete($id)
    {
        $c = Name::find( $id);

        if($c->delete()):

            return back()->with('message', ' Producto actualizado con éxito.')->with('typealert', 'success');

        endif;
    }

    public function postCarouselMobileAdd(Request $request, $id)
    {


        $path = '/Carousels';
        $fileExt = trim($request->file('file')->getClientOriginalExtension());
        $upload_path = Config::get('filesystems.disks.uploads.root');
        $name = Str::slug(str_replace($fileExt, '', $request->file('file')->getClientOriginalName()));
        $filename = rand(1,999).'-'.$name.'.'.$fileExt;
        $file_absolute = $upload_path.'/'.$path.'/'.$filename;
        $file_url = 'multimedia'.$path.'/'.$filename;

            $c = new CMobile;
            $c ->carousel_id                = $id;
            $c ->file_path                  = $path;
            $c ->file                       = $filename;
            $c ->mobile                     = asset($file_url);
            if($c->save()):

                if($request->hasFile('file')):
                    $fl = $request->file->storeAs($path, $filename, 'uploads');
                    $imagT = Image::make($file_absolute);
                    $imagT->resize(256, 256, function($constraint){
                        $constraint->upsize();
                    });
                    $imagW = Image::make($file_absolute);
                    $imagW->resize(480, 850, function($constraint){
                        $constraint->upsize();
                    });
                    $imagT->save($upload_path.'/'.$path.'/t_'.$filename);
                    $imagW->save($upload_path.'/'.$path.'/'.$filename);

                endif;

                return back()->with('message', ' Carousel Mobile actualizado con éxito.')->with('typealert', 'success');

            endif;


    }
    public function getCarouselMobileDelete($id)
    {
        $c = CMobile::find( $id);

        if($c->delete()):

            return back()->with('message', ' Carousel Mobile elminado con éxito.')->with('typealert', 'success');

        endif;
    }

}

