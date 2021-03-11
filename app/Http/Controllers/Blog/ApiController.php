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


class ApiController extends Controller
{

    //FUNCTION APIS

    public function GetClassifications(){

        //$BtnDiccionario = Diccionario::all()->sortBy('title');

        $GetClassification = Classification::select('id','name','slug','mobile','orden')
        ->orderBy('orden', 'ASC')
        ->get();


        return response()->json(compact('GetClassification'));

    }

    public function GetCarusels(){

        //$BtnDiccionario = Diccionario::all()->sortBy('title');

        $GetCarusels = CMobile::select('id','mobile')
        ->orderBy('id', 'ASC')
        ->get();


        return response()->json(compact('GetCarusels'));

    }

    public function GetCamarasBySlug(Request $request){
         $subareassBySlug = Subarea::select('id','classification_id','subclassification_id','orden','name','slug')
        ->where('subclassification_id',$request->id)
        ->get();

        $camarasBySlug = Kit::select('id','classification_id','subclassification_id','subarea_id','orden','sku','sku_paquete','name','slug','status','technical_specifications','file')
        ->where('subclassification_id',$request->id)
        ->get();



        return response()->json(compact('subareassBySlug','camarasBySlug'));
      }


    // API EFD
    public function postCotizacionEfd()
    {
        $cart = \Session::get('cart');
        dd($cart);


    }

}
