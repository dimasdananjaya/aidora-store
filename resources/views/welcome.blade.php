@extends('layouts.app')

@section('content')
<section id="hero">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12 col-lg-8 col-xl-6 text-center">
        <img alt="image" width="200" src="resources/logo/aidora-logo.png">
        <h1><b>Fashion and Beauty Products</b></h1>
      </div><!--end col-->
      <div class="col-lg-12 mt-4">
        <h4 class="text-center"></h4>
        {{ Form::open(['id'=>'main-search','route' => 'searchResult','method'=>'GET']) }}
          {{Form::text('term','',['class'=>'form-control mx-2 main-search text-center search-box-shadow ','required','placeholder'=>'Find Your Style Here'])}}
          {{Form::submit('Search',['class'=>'btn main-btn-search btn-sm mx-auto d-block mt-3'])}}
        {!!Form::close()!!}
      </div><!--col-lg-12-->
    </div><!--end row-->
  </div><!--end container-->
</section>

<section id="featured">
    <div class="row text-center justify-content-center mt-5 pr-3 pl-3">
      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
        <div class="layer card-bg-image-clothes">
          <a href="#">
            <div class="card">
              <h3><strong>Woman Fashion</strong></h3>
            </div><!--card-->
          </a><!--end link-->
        </div><!--layer-->
      </div><!--col-->

      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
        <div class="layer card-bg-image-bags">
          <a href="#">
            <div class="card">
              <h3><strong>Woman Bags</strong></h3>
            </div><!--card-->
          </a><!--end link-->
        </div><!--layer-->
      </div><!--col-->

      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
        <div class="layer card-bg-image-acc">
          <a href="#">
            <div class="card">
              <h3><strong>Accessories</strong></h3>
            </div><!--card-->
          </a><!--end link-->
        </div><!--layer-->
      </div><!--col-->

    </div><!--row-->
</section>

<section id="newly-arrived">
    <div class="container-fluid">
        <h3 class="text-center"><b>All Products</b></h3>
        <hr>

          <div class="products">
            @foreach ($dataProduct as $dp)
                <div class="card" style="width: 18rem;">
                  @php
                    $product_id=$dp->id_product;
                    $productThumbnail=DB::select(DB::raw("SELECT * FROM product_images WHERE product_images.id_product=$product_id
                    and product_images.orders=1 LIMIT 1"));
                  @endphp
                  @foreach ($productThumbnail as $pt)
                    <img class="card-img-top img-responsive" src="{{ asset('storage/product_images/'.$dp->id_product.'/'.$pt->file) }}" alt="{{$pt->file}}"></td>
                  @endforeach
                  <div class="card-body">
                      <h5 class="card-title"><b>{{$dp->product_name}}</b></h5>
                      @if ($dp->discount_price == 0)
                        <p class="card-text">Price : Rp. {{ number_format($dp->sell_price, 0, ',', '.') }}</p>
                        @else
                        <div class="d-flex">
                          <p class="card-text p-2" style="text-decoration: line-through;">Price : <br>Rp. {{ number_format($dp->sell_price, 0, ',', '.') }}</p>
                          <p class="card-text ml-auto p-2"><b>Discount Price : <br> Rp. {{ number_format($dp->sell_price, 0, ',', '.') }}</b></p>
                        </div><!--flex--> 
                      @endif

                      <div class="d-flex">
                        <a href="{{$dp->whatsapp}}" class="btn btn-sm ml-1 p-2">Order Via Whatsapp</a>
                        <a href="{{$dp->instagram}}" class="btn btn-sm ml-1 ml-auto p-2">Order Via Instagram</a>
                      </div><!--flex-->                      
                  </div>
                </div><!--end card-->
            @endforeach
          </div><!--carousel-->

    </div><!--end container-->
</section>

{{--
<section id="most-popular">
  <div class="container">
      <h3>Most Popular</h3>
      <hr>
      <div class="most-popular-carousel">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top img-responsive" src="resources/products/product1.jpg" alt="Card image cap">
          <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Price : Rp 10.000</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div><!--end card-->

        <div class="card" style="width: 18rem;">
          <img class="card-img-top img-responsive" src="resources/products/product2.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Price : Rp 10.000</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div><!--end card-->
        <div class="card" style="width: 18rem;">
          <img class="card-img-top img-responsive" src="resources/products/product1.jpg" alt="Card image cap">
          <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Price : Rp 10.000</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div><!--end card-->

        <div class="card" style="width: 18rem;">
          <img class="card-img-top img-responsive" src="resources/products/product2.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Price : Rp 10.000</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div><!--end card-->
        <div class="card" style="width: 18rem;">
          <img class="card-img-top img-responsive" src="resources/products/product1.jpg" alt="Card image cap">
          <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Price : Rp 10.000</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div><!--end card-->

        <div class="card" style="width: 18rem;">
          <img class="card-img-top img-responsive" src="resources/products/product2.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Price : Rp 10.000</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div><!--end card-->
      </div><!--end carousel-->
      <a href="#" class="btn-view-all btn btn-primary">View All</a>
  </div><!--end container-->
</section>
--}}
@endsection