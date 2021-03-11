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
use App\Proyect;
use App\Family;
use App\Kit;
use App\Subclassification;
use App\Subarea;
use App\User;
use App\Warehouse;
use App\News;
use App\Carousel;
use App\Filmography;
use Config;
use Str;
use Image;

class DashboardController extends Controller
{
    public function __Construct()
    {
        $this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('user.permissions');
        $this->middleware('isadmin');
    }

    public function getDashboard()
    {
        $users = User::count();
        $categories = Category::count();
        $subclasificaciones = Subclassification::count();
        $subarea = Subarea::count();
        $products = Product::where('status', 'published')->count();
        $cotizaciones =Proyect::where('deleted_at', null)->count();
        $cotizacionesall =Proyect::onlyTrashed()->count();
        $familias = Family::get()->count();
        $kits = Kit::get()->count();
        $warehouse = Warehouse::get()->count();
        $news = News::get()->count();
        $carousel = Carousel::get()->count();
        $filmografia = Filmography::get()->count();
        $data           = ['news'=> $news, 'carousel'=> $carousel, 'filmografia'=> $filmografia,'warehouse'=> $warehouse, 'users' => $users, 'categories' => $categories, 'products' => $products, 'cotizaciones' => $cotizaciones, 'cotizacionesall' => $cotizacionesall, 'familias' => $familias, 'kits' => $kits, 'subclasificaciones' => $subclasificaciones, 'subarea' => $subarea];
        return view('admin.dashboard', $data);

    }

}
