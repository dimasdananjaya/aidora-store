<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchResultController extends Controller
{
    public function categorySearch(){
        $categoryResult = DB::table('products')
        ->where('id_type', '=', 1)
        ->get();
        
        return view
    }
}
