<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ProductsModel;
use DB;

class SearchResultController extends Controller
{
    public function searchResult(Request $request){
        $term=$request->input('term');

        $searchResult = DB::table('products')
        ->where('product_name','like',"%".$term."%")
        ->get();
        
        return view('search.search-result')
        ->with('searchResult',$searchResult)
        ->with('term',$term);
    }
}
