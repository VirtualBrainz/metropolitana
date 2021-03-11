<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Subclassification;


class PersonalController extends Controller
{
    public function personal()
    {
        $clasificaciones        = DB::table('classifications')->get();
        $subclasificaciones     = DB::table('subclassifications')           ->orderBy   ('orden', 'ASC') ->get();

        $camaras                = Subclassification::  where('classification_id', 1)  ->orderBy   ('orden', 'ASC')-> first();
        $optica                 = Subclassification:: where('classification_id', 2) ->orderBy   ('orden', 'ASC')-> first();
        $filtros                = Subclassification::where('classification_id', 3)  ->orderBy   ('orden', 'ASC')-> first();
        $iluminacion            = Subclassification:: where('classification_id', 4)      ->orderBy   ('orden', 'ASC')-> first();
        $moviles                = Subclassification::where('classification_id', 5)  ->orderBy   ('orden', 'ASC')-> first();
        $gruas                  = Subclassification::where('classification_id', 6) ->orderBy   ('orden', 'ASC')-> first();

        return view('menu.personal.personal', compact('clasificaciones', 'subclasificaciones', 'camaras','optica','filtros','iluminacion','moviles','gruas'));


    }
}
