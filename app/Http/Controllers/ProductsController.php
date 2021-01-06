<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductsModel;
use App\Models\ProductType;
use DB;
use Validator;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dataType=ProductType::all();
        $dataProduct=DB::table('products')
        ->join('product_type', 'product_type.id_type', '=', 'products.id_type')
        ->select('products.*','product_type.type')  
        ->orderBy('id_type','ASC')->get();

        return view('admin.products')
        ->with('dataType',$dataType)
        ->with('dataProduct',$dataProduct);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $rules = array(

        );
        $validator = Validator::make($request->all(), [$rules]);

        // update barang
        if ($validator->fails()) {
            alert()->error('Gagal Disimpan !', $validator);
            return redirect()->back();
        } else {
            // store
            $dataProduct = new ProductsModel;
            $dataProduct->id_type = $request->input('id_type');
            $dataProduct->product_name = $request->input('product_name');
            $dataProduct->sell_price = preg_replace('/\D/','',$request->input('sell_price'));
            $dataProduct->base_price = preg_replace('/\D/','',$request->input('base_price'));
            $dataProduct->description = $request->input('description');
            $dataProduct->instagram = $request->input('instagram');
            $dataProduct->whatsapp = $request->input('whatsapp');
            
            $dataProduct->save();

            // redirect
            alert()->success('Data Tersimpan !', '');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate
        $rules = array(

        );
        $validator = Validator::make($request->all(), [$rules]);

        // update barang
        if ($validator->fails()) {
            alert()->error('Gagal Disimpan !', $validator);
            return redirect()->back();
        } else {
            // store
            $dataProduct = ProductsModel::find($id);

            $dataProduct->id_type = $request->input('id_type');
            $dataProduct->product_name = $request->input('product_name');
            $dataProduct->sell_price = preg_replace('/\D/','',$request->input('sell_price'));
            $dataProduct->base_price = preg_replace('/\D/','',$request->input('base_price'));
            $dataProduct->description = $request->input('description');
            $dataProduct->instagram = $request->input('instagram');
            $dataProduct->whatsapp = $request->input('whatsapp');
            
            $dataProduct->save();

            // redirect
            alert()->success('Data Diupdate !', '');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
