@extends('layouts.admin')

@section('content')
    <section id="manage-product-images">
        <div class="container">
            <div class="card pb-4 pt-4 pl-4 pr-4">
                <h4 class="text-center"><b>Product : {{$dataProduct->product_name}}</b></h4>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-3 d-block mx-auto"  data-toggle="modal" data-target="#modalTambahProduct">
                    Add Product Image
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="modalTambahProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><b>Add Product Image</b></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                {{ Form::open(['id'=>'formTambahProduct','route' => 'product-images.store','files' => true]) }}
                                    {{Form::label('File :')}}
                                    {{Form::file('file',['class'=>'form-control-file form-group'])}}
                                    {{Form::label('Image Order :')}}
                                    {{Form::number('orders','',['class'=>'form-control form-group','placeholder'=>'','required'])}}
                                    {{Form::hidden('id_product', $dataProduct->id_product) }}
                                    {{Form::submit('Simpan',['class'=>'btn btn-success btn-block'])}}
                                {{ Form::close() }}
                            </div>
                        </div><!--modal-content-->
                    </div><!--modal-dialog-->
                </div><!--modal-fade-->

                <div class="row">
                    @foreach ($dataProductImages as $dpi)
                    <div class="col-lg-3">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top img-responsive" src="{{ asset('storage/product_images/'.$dpi->id_product.'/'.$dpi->file) }}" alt="{{$dpi->file}}"></td>
                            <div class="card-body">
                                <p>Image Order : {{$dpi->orders}}</p>
                                <div class="d-flex flex-row">
                                    <div class="p-2">
                                        <a class="btn btn-primary mb-3 d-block mx-auto btn-sm"  data-toggle="modal" data-target="#modalEditProduct{{$dpi->id_image}}">
                                            Edit
                                        </a>
                                    </div><!--p2-->    
                                    <div class="p-2">
                                        {!! Form::open(['route' => ['product-images.destroy', $dpi->id_image],'method' => 'POST']) !!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit("Delete", ['class'=>'btn btn-danger btn-sm'])}} 
                                        {!! Form::close() !!}
                                    </div><!--p2-->
                                </div>
                            </div>
                        </div><!--card-->

                        <!-- Modal -->
                        <div class="modal fade" id="modalEditProduct{{$dpi->id_image}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>Edit Product Image</b></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {!!Form::open(['route'=>['product-images.update', $dpi->id_image], 'method'=>'PUT', 'files'=>true])!!}
                                            {{Form::label('File :')}}
                                            {{Form::file('file',['class'=>'form-control-file form-group'])}}
                                            {{Form::label('Image Order :')}}
                                            {{Form::number('orders',$dpi->orders,['class'=>'form-control form-group','required'])}}
                                            {{Form::hidden('id_image', $dpi->id_image) }}
                                            {{Form::hidden('id_product', $dpi->id_product) }}
                                            {{Form::hidden('file_lama', $dpi->file) }}
                                            {{Form::submit('Simpan',['class'=>'btn btn-success btn-block'])}}
                                        {{ Form::close() }}
                                    </div>
                                </div><!--modal-content-->
                            </div><!--modal-dialog-->
                        </div><!--modal-fade-->
                    </div><!--col-->
                    @endforeach
                </div><!--carousel-->
            </div><!--card-->
        </div><!--container-->
    </section>
@endsection