<?php

namespace App\Http\Controllers;
use App\Models\ProductsModel;
use App\Models\ImagesProductModel;
use DB;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function welcomePage(){
         $dataProduct=DB::table('products')
        ->where('products.status','active')
        ->get();

        return view('welcome')
        ->with('dataProduct',$dataProduct);
    }

    public function symlink(){
        Artisan::call('storage:link');
    }
}
