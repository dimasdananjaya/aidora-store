@extends('layouts.app')

@section('content')
    <section id="links">
        <div class="container">
            <h3 class="text-center mt-4"><b>Find Our Shop In Here</b></h3>
            <div class="row">
                <div class="col-lg-6">
                    <a class="text-center" href="https://meet.google.com/linkredirect?authuser=0&dest=https%3A%2F%2Fshopee.co.id%2Faidorafashion">
                        <div class="card">
                            <div class="card-body">
                                <img class="card-img-top img-responsive pb-5 d-block mx-auto" src="{{URL::asset('resources/logo/shopee.png')}}">
                                <a class="text-center" href="https://shp.ee/jzpnrfk"><p><b>Shopee</b></p></a>
                            </div><!--card-body-->
                        </div><!--card-->
                    </a>
                </div><!--col-->

                <div class="col-lg-6">
                    <a class="text-center" href="https://www.instagram.com/aidora.fashion/">
                        <div class="card">
                            <div class="card-body">
                                <img class="card-img-top img-responsive pb-5 d-block mx-auto resize-logo" src="{{URL::asset('resources/logo/instagram.png')}}">
                                <a class="text-center" href="https://www.instagram.com/aidora.fashion/"><p><b>Instagram Shop</b></p></a>
                            </div><!--card-body-->
                        </div><!--card-->
                    </a>
                </div><!--col-->

                <div class="col-lg-6">
                    <a class="text-center" href="https://meet.google.com/linkredirect?authuser=0&dest=https%3A%2F%2Fwww.facebook.com%2Faidora.fashion">
                        <div class="card">
                            <div class="card-body">
                                <img class="card-img-top img-responsive pb-5 d-block mx-auto resize-logo" src="{{URL::asset('resources/logo/facebook.png')}}">
                                <a class="text-center" href="https://meet.google.com/linkredirect?authuser=0&dest=https%3A%2F%2Fwww.facebook.com%2Faidora.fashion"><p><b>Facebook Page</b></p></a>
                            </div><!--card-body-->
                        </div><!--card-->
                    </a>
                </div><!--col-->

            </div><!--row-->
        </div><!--container-->
    </section>
@endsection