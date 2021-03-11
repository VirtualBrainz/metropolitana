<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Family;
use App\Product;
use App\FamilyProduct;
use App\Name;
use App\Subclassification;




class FilterController extends Controller
{
    public function filtros($slug)
    {
        $clasificaciones        = DB::table('classifications') ->get();
        $subclasificaciones     = DB::table('subclassifications')  ->orderBy   ('orden', 'ASC')->get();

        $clasificaciones1       = DB::table('classifications')->get();
        $subclasificaciones1    = DB::table('subclassifications')->where('slug', $slug)->get();
        $subclas                = DB::table('subclassifications')->where('slug', $slug)->first();
        $subareas               = DB::table('subareas') ->where('subclassification_id', $subclas->id)->orderBy   ('orden', 'ASC')->get();

        $familias               = Family::where('subclassification_id', $subclas->id)->where('status', 'published')->orderBy   ('orden', 'ASC')->get();

        $kits                   = Family::where('status', 'published')-> orderBy   ('orden', 'ASC')->get();

//dd($familias);
        $productos = DB::table('family_products')
            ->join('names', 'family_products.product_id', '=', 'names.product_id')
            ->join('products', 'family_products.product_id', '=', 'products.id')
            ->orderBy   ('name', 'ASC')->get();
        //dd($productos);
        //Consultas Mobil
        $camaras                = Subclassification::  where('classification_id', 1)  ->orderBy   ('orden', 'ASC')-> first();
        $optica                 = Subclassification:: where('classification_id', 2) ->orderBy   ('orden', 'ASC')-> first();
        $filtros                = Subclassification::where('classification_id', 3)  ->orderBy   ('orden', 'ASC')-> first();
        $iluminacion            = Subclassification:: where('classification_id', 4)      ->orderBy   ('orden', 'ASC')-> first();
        $moviles                = Subclassification::where('classification_id', 5)  ->orderBy   ('orden', 'ASC')-> first();
        $gruas                  = Subclassification::where('classification_id', 6) ->orderBy   ('orden', 'ASC')-> first();



        return view('menu.filtros.accesorios', compact('clasificaciones', 'subclasificaciones' , 'clasificaciones1', 'subclasificaciones1' , 'subareas', 'familias', 'kits', 'nombres', 'productos', 'camaras','optica','filtros','iluminacion','moviles','gruas'));


    }
}
