@extends('layouts.app')

@section('content')
<section id="hero">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12 col-lg-8 col-xl-6 text-center">
        <img alt="image" width="200" src="resources/logo/aidora-logo.png">
        <h1>Fashion and Beauty Products</h1>
      </div><!--end col-->
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
        <div class="row">
          <div class="col-lg-3 col-sm-6 col-xs-6">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top img-responsive" src="resources/products/product1.jpg" alt="Card image cap">
              <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Price : Rp 10.000</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div><!--end card-->
          </div><!--col-->

          <div class="col-lg-3 col-sm-6 col-xs-6">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top img-responsive" src="resources/products/product2.jpg" alt="Card image cap">
              <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Price : Rp 10.000</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div><!--end card-->
          </div><!--col-->

          <div class="col-lg-3">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top img-responsive" src="resources/products/product1.jpg" alt="Card image cap">
              <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Price : Rp 10.000</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div><!--end card-->
          </div><!--col-->

          <div class="col-lg-3">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top img-responsive" src="resources/products/product2.jpg" alt="Card image cap">
              <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Price : Rp 10.000</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div><!--end card-->
          </div><!--col-->

          <div class="col-lg-3">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top img-responsive" src="resources/products/product1.jpg" alt="Card image cap">
              <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Price : Rp 10.000</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div><!--end card-->
          </div><!--col-->

          <div class="col-lg-3">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top img-responsive" src="resources/products/product2.jpg" alt="Card image cap">
              <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Price : Rp 10.000</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div><!--end card-->
          </div><!--col-->

          <div class="col-lg-3">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top img-responsive" src="resources/products/product1.jpg" alt="Card image cap">
              <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Price : Rp 10.000</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div><!--end card-->
          </div><!--col-->

          <div class="col-lg-3">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top img-responsive" src="resources/products/product2.jpg" alt="Card image cap">
              <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Price : Rp 10.000</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div><!--end card-->
          </div><!--col-->
        </div><!--row-->

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