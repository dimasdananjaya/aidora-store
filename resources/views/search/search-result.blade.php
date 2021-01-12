@extends('layouts.app')

@section('content')
    <section id="search-result">
        <div class="container pt-3 pl-3 pr-3">
            <h3 class="text-center"><b>Search Result For : {{$term}}</b></h3>
            <div class="row">
                <div class="col-lg-12 mt-4">
                    <h4 class="text-center"></h4>
                    {{ Form::open(['id'=>'main-search','route' => 'searchResult','method'=>'GET']) }}
                    {{Form::text('term','',['class'=>'form-control mx-2 main-search text-center search-box-shadow','required','placeholder'=>'Find Your Style Here'])}}
                    {{Form::submit('Search Again',['class'=>'btn main-btn-search btn-sm mx-auto d-block mt-3'])}}
                    {!!Form::close()!!}
                </div><!--col-lg-12-->
                @foreach ($searchResult as $sr)
                <div class="col-lg-4">
                    <div class="card" style="width: 18rem;">
                        @php
                            $productThumbnail=DB::select(DB::raw("SELECT * FROM product_images WHERE product_images.id_product=$sr->id_product
                            and product_images.orders=1 LIMIT 1"));
                        @endphp
                        @foreach ($productThumbnail as $pt)
                            <img class="card-img-top img-responsive" src="{{ asset('storage/product_images/'.$sr->id_product.'/'.$pt->file) }}" alt="{{$pt->file}}"></td>
                        @endforeach
                        <div class="card-body">
                            <h5 class="card-title"><b>{{$sr->product_name}}</b></h5>
                            @if ($sr->discount_price == 0)
                            <p class="card-text">Price : Rp. {{ number_format($sr->sell_price, 0, ',', '.') }}</p>
                            @else
                            <div class="d-flex">
                              <p class="card-text p-2" style="text-decoration: line-through;">Price : <br>Rp. {{ number_format($sr->sell_price, 0, ',', '.') }}</p>
                              <p class="card-text ml-auto p-2"><b>Discount Price : <br> Rp. {{ number_format($sr->discount_price, 0, ',', '.') }}</b></p>
                            </div><!--flex--> 
                          @endif   
                        </div><!--card-body-->
                    </div><!--end card-->
                </div><!--col-lg-4-->
                @endforeach
            </div><!--row-->
        </div><!--container-->
    </section>
@endsection