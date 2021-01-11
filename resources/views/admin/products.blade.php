@extends('layouts.admin')

@section('content')
<section id="barang-dashboard">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4><b>Kelola Product</b></h4>
            </div><!--card-header-->
            <div class="card-body">

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success mb-3"  data-toggle="modal" data-target="#modalTambahProduct">
                Tambah Product
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="modalTambahProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><b>Tambah Product</b></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ Form::open(['id'=>'formTambahProduct','route' => 'products.store']) }}
                                {{Form::label('Product Name :')}}
                                {{Form::text('product_name','',['class'=>'form-control form-group','placeholder'=>'','required'])}}
                                {{Form::label('id_type','Tipe :')}}
                                <select name="id_type" class="form-control form-group">
                                    @foreach ($dataType as $dtt)
                                        <option value="{{$dtt->id_type}}" class="form-control">{{$dtt->type}}</option>
                                    @endforeach
                                </select>
                                {{Form::label('Base Price :')}}
                                {{Form::text('base_price','',['class'=>'form-control form-group uangBarang','placeholder'=>'','required'])}}
                                {{Form::label('Sell Price :')}}
                                {{Form::text('sell_price','',['class'=>'form-control form-group uangBarang','placeholder'=>'','required'])}}
                                {{Form::label('Discount Price :')}}
                                {{Form::text('discount_price','',['class'=>'form-control form-group uangBarang','placeholder'=>'','required'])}}
                                {{Form::label('Description :')}}
                                {{Form::textarea('description','',['class'=>'form-control form-group','placeholder'=>'','required'])}}
                                {{Form::label('Instagram Link :')}}
                                {{Form::text('instagram','',['class'=>'form-control form-group','placeholder'=>'','required'])}}
                                {{Form::label('Whatsapp Link :')}}
                                {{Form::text('whatsapp','',['class'=>'form-control form-group','placeholder'=>'','required'])}}
                                {{Form::submit('Simpan',['class'=>'btn btn-success btn-block'])}}
                            {{ Form::close() }}
                        </div>
                    </div><!--modal-content-->
                </div><!--modal-dialog-->
            </div><!--modal-fade-->

                <table id="tabel-products" class="table table-bordered dt-responsive nowrap table-responsive" style="width:100%">
                    <thead>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Type</th>
                        <th>Base Price</th>
                        <th>Sell Price</th>
                        <th>Discount Price</th>
                        <th>Instagram</th>
                        <th>Whatsapp</th>
                        <th>Description</th>
                        <th>Aksi</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($dataProduct as $dp)
                            <tr>
                                <td>{{$dp->id_product}}</td>
                                <td>{{$dp->product_name}}</td>
                                <td>{{$dp->type}}</td>
                                <td>{{ number_format($dp->sell_price, 2) }}</td>
                                <td>{{ number_format($dp->base_price, 2) }}</td>
                                <td>{{ number_format($dp->discount_price, 2) }}</td>
                                <td>{{$dp->instagram}}</td>
                                <td>{{$dp->whatsapp}}</td>
                                <td>{{$dp->description}}</td>
                                <td>
                                    <a class="btn btn-success btn-sm" style="color:#fff;" data-toggle="modal" data-target="#edit-product-modal{{$dp->id_product}}">Edit</a>
                                </td>
                                <td>
                                    {!!Form::open(['route'=>['manage.product-images', $dp->id_product], 'method'=>'GET'])!!}
                                        {{Form::hidden('id_product',"$dp->id_product")}}
                                        {{Form::submit('Kelola Gambar',['class'=>'btn btn-success btn-block btn-sm'])}}
                                    {!!Form::close()!!}
                                </td>          
                            </tr>
                            <!-- Modal Edit Products-->
                            <div class="modal fade" id="edit-product-modal{{$dp->id_product}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2>Form Edit Product</h2>   
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        {!!Form::open(['route'=>['products.update', $dp->id_product], 'method'=>'PUT'])!!}
                                            {{Form::label('id_product','Id Product : ')}}
                                            <p><b>{{$dp->id_product}}</b></p>
                                            {{Form::label('Product Name :')}}
                                            {{Form::text('product_name',$dp->product_name,['class'=>'form-control form-group','placeholder'=>'','required'])}}
                                            {{Form::label('id_type','Tipe :')}}
                                            <select name="id_type" class="form-control form-group">
                                                @foreach ($dataType as $dtt)
                                                    @if ($dtt->id_type == $dp->id_type)
                                                        <option value="{{$dtt->id_type}}" class="form-control" selected>{{$dtt->type}}</option>
                                                    @else
                                                        <option value="{{ $dtt->id_type }}" class="form-control">{{ $dtt->type }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            {{Form::label('Base Price :')}}
                                            {{Form::text('base_price',$dp->base_price,['class'=>'form-control form-group','placeholder'=>'','required'])}}
                                            {{Form::label('Sell Price :')}}
                                            {{Form::text('sell_price',$dp->sell_price,['class'=>'form-control form-group','placeholder'=>'','required'])}}
                                            {{Form::label('Discount Price :')}}
                                            {{Form::text('discount_price',$dp->discount_price,['class'=>'form-control form-group','placeholder'=>'','required'])}}
                                            {{Form::label('Desciption: ')}}
                                            {{Form::textarea('description','',['class'=>'form-control form-group','placeholder'=>'','required'])}}
                                            {{Form::label('Instagram Link :')}}
                                            {{Form::text('instagram',$dp->instagram,['class'=>'form-control form-group','placeholder'=>'','required'])}}
                                            {{Form::label('Whatsapp Link :')}}
                                            {{Form::text('whatsapp',$dp->whatsapp,['class'=>'form-control form-group','placeholder'=>'','required'])}}
                                            {{Form::submit('Simpan',['class'=>'btn btn-success btn-block'])}}
                                        {{ Form::close() }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Modal Edit Tagihan Pembayaran-->   
                        @endforeach
                    </tbody>
                </table>
            </div><!--card-body-->
        </div><!--card-->
    </div><!--container-->
    <script>
        $(document).ready(function() {
            $('#tabel-products').DataTable();
        } );
    </script>
</section>
@endsection