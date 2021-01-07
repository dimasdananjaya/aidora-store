<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductsModel;
use App\Models\ImagesProductModel;
use DB;
use Validator;
use Image;
use Alert;
use File;
use Storage;

class ImagesProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
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
        $validator = Validator::make($request->all(), [
            'id_product'=> 'required',
            'orders'=> 'required',
            'file'=> 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Gambar Gagal Disimpan!', 'Isi Formulir Dengan Benar');
            return back();
        }
        elseif($request->hasFile('file')){
            $image = $request->file('file');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $id_product=$request->input('id_product');

            $destinationPath = storage_path('app/public/product_images/'.$id_product);

            if(!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath);
                Image::make($image->getRealPath())->save($destinationPath . '/' . $image_name);
            }

            else{
                Image::make($image->getRealPath())->save($destinationPath . '/' . $image_name);
            }

            //$destinationPath = public_path('/resources/file');
            //$path = $resize_image->storeAs(
             //   'public/file', $name
            //);
            //$file->move($destinationPath, $name);

            $productImage = ImagesProductModel::create([
                'orders' => $request->input('orders'),
                'file' => $image_name,
                'id_product' => $request->input('id_product')
            ]);

            $productImage->save();
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
        $productImages=ImagesProductModel::find($id);
        
        $validator = Validator::make($request->all(), [
            'id_product'=> 'required',
            'orders'=> 'required',
            'file'=> 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Gambar Gagal Disimpan!', 'Isi Formulir Dengan Benar');
            return back();
        }
        elseif($request->hasFile('file')){
            $delete = $request->input('file_lama'); //cari nama file
            $image = $request->file('file');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $id_product=$request->input('id_product');

            Storage::delete('public/product_images/'.$id_product.'/'.$delete); //hapus file

            $destinationPath = storage_path('app/public/product_images/'.$id_product);

            if(!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath);
                Image::make($image->getRealPath())->save($destinationPath . '/' . $image_name);
            }

            else{
                Image::make($image->getRealPath())->save($destinationPath . '/' . $image_name);
            }

            //$destinationPath = public_path('/resources/file');
            //$path = $resize_image->storeAs(
             //   'public/file', $name
            //);
            //$file->move($destinationPath, $name);

            $productImages->orders=$request->input('orders');
            $productImages->file = $image_name;
            $productImages->save();
            Alert::success('Image Updated!');
            return back();
        }
        else{
            $productImages->orders=$request->input('orders');    
            $productImages->save();
            Alert::success('Image Updated !');
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
        $productImages=ImagesProductModel::find($id);

        Storage::delete('public/product_images/'.$productImages->id_product.'/'.$productImages->file); //hapus file

        ImagesProductModel::find($id)->delete();

        alert()->success('Gambar Berhasil Dihapus!', '');
        return back();
    }

    public function manageProductImages(Request $request){
        $id_product=$request->input('id_product');

        //$dataProduct=DB::select(DB::raw("SELECT*FROM products where id_product=$id_product"));
        $dataProduct = ProductsModel::where('id_product', $id_product)->first();
        $dataProductImages=DB::select(DB::raw("SELECT*FROM product_images where id_product=$id_product"));

        return view('admin.manage-product-images')
        ->with('dataProduct',$dataProduct)
        ->with('dataProductImages',$dataProductImages);
    }
}
