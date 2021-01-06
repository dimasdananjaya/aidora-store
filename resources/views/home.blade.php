@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="col-lg-6 text-center">
                    <img class="d-block mx-auto" src="{{asset('resources/logo/manage-products.svg')}}">
                    <h4>Manage Product</h4>
                    <p><a class="btn btn-primary mb-5 mb-md-0" href="/products">Pilih</a></p>
                </div><!--col-->
            </div><!--card-->
        </div><!--col-lg-8-->
    </div><!--row-->
</div>
@endsection
