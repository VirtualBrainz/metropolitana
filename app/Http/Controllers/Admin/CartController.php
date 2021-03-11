<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Eastwest\Json\Json;

use App\Classification;
use App\Subclassification;
use App\Subarea;
use App\Kit;
use App\Product;
use App\Name;

class CartController extends Controller
{
    public function __construct() {

        if (!\Session::has('cart'))\Session::put('cart', array());
    }

    // Show Cart
    public function show() {

        $clasificaciones = DB::table('classifications')->get();
        $subclasificaciones     = DB::table     ('subclassifications')          ->orderBy   ('orden', 'ASC')->get();

        $clasificaciones1 = DB::table('classifications')->get();
        $subclasificaciones1 = DB::table('subclassifications')->get();

        $kits = DB::table('kits')->get();
        $productos = DB::table('products')->get();
        $names = DB::table('names')->get();
       // $incluidos = DB::table('kit_products')->get();
        $extras = DB::table('kit_products')->where('type', 'EXTRA')->get();
        $incluidos = DB::table('kit_products')
       ->join('names', 'kit_products.product_id', '=', 'names.product_id')
       ->join('products', 'kit_products.product_id', '=', 'products.id')
       ->get();
        $cart = \Session::get('cart');
       //dd($cart);

        $total = $this->total();


        return view('market.car', compact('cart', 'total', 'clasificaciones', 'subclasificaciones' , 'clasificaciones1', 'subclasificaciones1' , 'kits',  'productos', 'names', 'incluidos', 'extras'));
    }



    // Delete Item
    public function delete($item) {

        $cart = \Session::get('cart');
        $key = count($cart);
        $sku_sub = Str::substr( $item, 0, 2);

        if ($sku_sub == 'K-' ) {

            $sku_k = $item;

            //$product =  DB::table('kits')->where('sku',$sku_k)->get();
            foreach($cart as $subKey => $subArray){
                if($subArray[0]->sku == $sku_k){
                        unset($cart[$subKey]);
                    \Session::put('cart', $cart);
                }
            }

        } else if  ($sku_sub == 'P-' ) {

            $sku_p = $item;

            //$product =  DB::table('products')->where('sku',$sku_p)->get();
            foreach($cart as $subKey => $subArray){
                if($subArray[0]->sku == $sku_p){
                        unset($cart[$subKey]);
                    \Session::put('cart', $cart);
                }
            }
        }

        return redirect()->route('cart-show');
    }

    // Update Item
    public function update(Kit $sku, $quantity) {

        $cart = \Session::get('cart');
            $cart[$sku->sku]->quantity = $quantity;
        \Session::put('cart', $cart);

        return redirect()->route('cart-show')   ;
    }

    // Trash Item
    public function total() {


    }

    public function add_form(Request $request)
    {

        $contacto =  request()->validate([

            'extra'=>'required',

        ]);
            //dd($contacto);
        foreach($contacto as $clave=> $valor){
            for($indice=0;$indice<count($contacto[$clave]);$indice++){
                $sku_sub = Str::substr( $contacto[$clave][$indice], 0, 2);

                if ($sku_sub == 'K-' ) {

                    $sku_k = $contacto[$clave][$indice];
                    $product =  DB::table('kits')->where('sku',$sku_k)->get();

                    $cart = \Session::get('cart');
                        $product[0]->quantity = $request->input('quantity_'.$sku_k);
                        $product[0]->day =  $request->input('day_'.$sku_k);
                        $cart[] = $product[0];

                    \Session::put('cart', $cart);

                } else if  ($sku_sub == 'P-' ) {

                   $sku_p = $contacto[$clave][$indice];


                    $product =  DB::table('products')->where('sku',$sku_p)->get();
                    $cart = \Session::get('cart');
                        $product[0]->quantity = $request->input('quantity_'.$sku_p);
                        $product[0]->day =  $request->input('day_'.$sku_p);
                        $cart[] = $product[0];

                    \Session::put('cart', $cart);

                }
            }
        }

        sleep(2);
        return \App::make('redirect')->back();

    }

    public function orderDetail() {

        $clasificaciones = DB::table('classifications')->get();
        $subclasificaciones     = DB::table     ('subclassifications')          ->orderBy   ('orden', 'ASC')->get();

        $clasificaciones1 = DB::table('classifications')->get();
        $subclasificaciones1 = DB::table('subclassifications')->get();

        $kits = DB::table('kits')->get();
        $productos = DB::table('products')->get();
        $names = DB::table('names')->get();
       // $incluidos = DB::table('kit_products')->get();
       $incluidos = DB::table('kit_products')
       ->join('names', 'kit_products.product_id', '=', 'names.product_id')
       ->join('products', 'kit_products.product_id', '=', 'products.id')
       ->get();
        $extras = DB::table('kit_products')->where('type', 'EXTRA')->get();

        $cart = \Session::get('cart');
        //dd($cart);

        $total = $this->total();


        return view('market.detalle', compact('cart', 'total', 'clasificaciones', 'subclasificaciones' , 'clasificaciones1', 'subclasificaciones1' , 'kits',  'productos', 'names', 'incluidos', 'extras'));
    }

    public function add_filter(Request $request)
    {

        $contacto =  request()->validate([

            'extra'=>'required'

        ]);
           // dd($contacto);
        foreach($contacto as $clave=> $valor){

           // dd($contacto[$clave]);
            for($indice=0;$indice<count($contacto[$clave]);$indice++){


                $sku_sub = Str::substr( $contacto[$clave][$indice], 0, 2);
                if  ($sku_sub == 'P-' ) {

                   $sku_p = Str::substr( $contacto[$clave][$indice], 0, -1);


                    $product =  DB::table('products')->where('sku',$sku_p)->get();
                   // dd($product);
                    $cart = \Session::get('cart');
                        $product->quantity = $request->input('quantity_'.$sku_p);
                        $product->day =  $request->input('day_'.$sku_p);
                        $cart[] = $product;

                    \Session::put('cart', $cart);

                }
            }
        }

        sleep(2);
        return \App::make('redirect')->back();

    }




}
