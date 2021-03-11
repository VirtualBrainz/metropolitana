<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Subclassification;

class OpticsController extends Controller
{
    public function optica($slug)
    {

        $clasificaciones        = DB::table('classifications')->get();
        $subclasificaciones     = DB::table('subclassifications') ->orderBy   ('orden', 'ASC')->get();

        $clasificaciones1       = DB::table('classifications')->get();
        $subclasificaciones1    = DB::table('subclassifications')->where('slug', $slug)->get();
        $subclasi               = DB::table('subclassifications')           ->where('slug', $slug)->first();
        $subareas               = DB::table('subareas') ->where('subclassification_id', $subclasi->id)->orderBy   ('orden', 'ASC')->get();

        $kits                   = DB::table('families')->where('subclassification_id', $subclasi->id)->where('status', 'published') ->orderBy   ('orden', 'ASC')->get();

        $camaras                = Subclassification::  where('classification_id', 1)  ->orderBy   ('orden', 'ASC')-> first();
        $optica                 = Subclassification:: where('classification_id', 2) ->orderBy   ('orden', 'ASC')-> first();
        $filtros                = Subclassification::where('classification_id', 3)  ->orderBy   ('orden', 'ASC')-> first();
        $iluminacion            = Subclassification:: where('classification_id', 4)      ->orderBy   ('orden', 'ASC')-> first();
        $moviles                = Subclassification::where('classification_id', 5)  ->orderBy   ('orden', 'ASC')-> first();
        $gruas                  = Subclassification::where('classification_id', 6) ->orderBy   ('orden', 'ASC')-> first();



        $data = [
        'clasificaciones' => $clasificaciones,
        'subclasificaciones' => $subclasificaciones,
        'clasificaciones1' => $clasificaciones1,
        'subclasificaciones1' => $subclasificaciones1,
        'subareas' => $subareas,
        'kits' => $kits,
        'camaras' => $camaras,
        'optica' => $optica,
        'filtros' => $filtros,
        'iluminacion' => $iluminacion,
        'moviles' => $moviles,
        'gruas' => $gruas];

        return view('menu.optica.general', $data);


    }
}
