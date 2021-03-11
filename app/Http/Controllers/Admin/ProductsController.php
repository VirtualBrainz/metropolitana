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
use App\Name;
use App\Family;
use Config;
use Str;
use Image;

class ProductsController extends Controller
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

        $products = DB::table('names')
        ->join('products', 'names.product_id', '=', 'products.id')->get();

        //dd($products);
        //$products = Product::orderBy('id', 'DESC')->get();
        $names  = Name::get();
                
         
        $data = ['cats' => $products, 'names' => $names];
        return view('admin.products.home', $data);

    }

    public function getProductAdd()
    {
        return view('admin.products.add');
    }

    public function postProductAdd(Request $request)
    {
        $rules = [
            'sku'                                   => 'required',
        ];

        $messages = [
            'sku.required'                          => 'El Sku del producto es requerido.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput() ;

        else:

            $product = new Product;
            $product ->status               = '1';
            $product ->sku                  = 'P-'.e($request->input('sku'));
            $product ->sku_product          = e($request->input('sku'));


            if($product->save()):

                return redirect('/admin/products/1')->with('message', ' Prodcuto guardado con éxito.')->with('typealert', 'success');

            endif;

        endif;
    }

    public function getProductEdit($id)
    {
        $product        = Product::findOrFail($id);
        $names  = Name::where('product_id', $id)->get();
        $data           = ['cat' => $product, 'names' => $names];
         return view('admin.products.edit', $data);
    }

    public function postProductEdit(Request $request, $id)
    {
        $rules = [
            'sku'                                   => 'required'
        ];

        $messages = [
            'sku.required'                          => 'El Sku del producto es requerido.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput() ;

        else:

            $product                        = Product::findOrFail( $id);
            $product ->status               = '1';
            $product ->sku                  = e($request->input('sku'));
            $product ->sku_product          = e($request->input('sku'));

            if($product->save()):

                return back()->with('message', ' Prodcuto actualizado con éxito.')->with('typealert', 'success')->withInput();

            endif;


        endif;

    }

    public function getProductDelete($id)
    {
        $product = Product::find( $id);

        if($product->delete()):

            return back()->with('message', ' Producto enviado con éxito a la papeplera.')->with('typealert', 'success')->withInput();

        endif;
    }

    public function postProductSearch (Request $request)
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
            switch ($request->input('filter')) :
                case '0':
                    $products = Product::with(['cat'])->where('name', 'LIKE', '%'.$request->input('search').'%')->where('status', $request->input('status'))->orderBy('id', 'DESC')->get();
                    break;
                case '1':
                    $products = Product::with(['cat'])->where('sku', $request->input('search'))->orderBy('id', 'DESC')->get();
                    break;
            endswitch;

            $data = ['products' => $products];
            return view('admin.products.search', $data);

        endif;
    }


    public function getProductRestore($id)
    {
        $product = Product::onlyTrashed()->where('id', $id)->first();
        $product ->deleted_at   = null;

            if ($product->save()):

                return redirect('/admin/product/'.$product->id.'/edit')->with('message', ' El producto se restauro correctamente.')->with('typealert', 'success')->withInput();

            else:
                return back()->with('message','Se ha producido un error')->with('typealert','danger')->withInput();
            endif;

    }

    public function getHomeName()
    {
        # code...
    }
    public function getProductName()
    {
        # code...
    }
    public function postProductName()
    {
        # code...
    }
    public function getProductNameEdit()
    {
        # code...
    }
    public function postProductNameEdit()
    {
        # code...
    }
    public function getProductNameDelete()
    {
        # code...
    }
}

