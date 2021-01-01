<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductsMode;
use App\Models\ProductType;
use DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dataTipe=ProductType::all();
        $dataProduct=DB::table('products')
        ->join('product_type', 'product_type.id_type', '=', 'products.id_type')
        ->select('products.*','product_type.type')  
        ->orderBy('id_type','ASC')->get();

        return view('admin.products')
        ->with('dataTipe',$dataTipe)
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
        $validator = Validator::make($request->all(), [
            'id_user'=> 'required',
            'id_periode'=> 'required',
            'tanggal' => 'required',
            'mata_kuliah'=> 'required',
            'jam'=> 'required',
            'sks'=> 'required',
            'materi'=> 'required',
            'file'=> 'required',
        ]);


        if ($validator->fails()) {
            Alert::error('Data BAP Gagal Disimpan!', 'Isi Formulir Dengan Benar');
            return back();
        }
        elseif($request->hasFile('file')){
            $image = $request->file('file');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $id_periode=$request->input('id_periode');
            $id_user=$request->input('id_user');

            $destinationPath = storage_path('app/public/file/'.$id_periode.'/'.$id_user);

            if(!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath);
                Image::make($image->getRealPath())->resize(320,440)->save($destinationPath . '/' . $image_name);
            }

            else{
                Image::make($image->getRealPath())->resize(320,440)->save($destinationPath . '/' . $image_name);
            }

            //$destinationPath = public_path('/resources/file');
            //$path = $resize_image->storeAs(
             //   'public/file', $name
            //);
            //$file->move($destinationPath, $name);

            $bap = BAPModel::create([
                'id_user' => $request->input('id_user'),
                'id_periode' => $request->input('id_periode'),
                'tanggal' => $request->input('tanggal'),
                'mata_kuliah' => $request->input('mata_kuliah'),
                'jam' => $request->input('jam'),
                'sks' => $request->input('sks'),
                'materi' => $request->input('materi'),
                'jumlah_mahasiswa'=>$request->input('jumlah_mahasiswa'),
                'file' => $image_name,
            ]);

            $bap->save();
            Alert::success('Data BAP Berhasil Disimpan!');
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
        //
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
