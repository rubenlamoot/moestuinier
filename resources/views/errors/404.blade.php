@extends('layouts.master')

@section('content')
    <div class="col-lg-9 col-xl-10">
        <main id="maincontent">
            <div id="shop_menu" class="d-flex justify-content-end my-3 pr-5 w-100">
                <a href="{{route('cart')}}"><i class="fas fa-shopping-cart pt-1 pr-2 text-secondary"></i></a>
                <p class="pr-2">Producten: </p>
                <p id="aantal" class="pr-3">{{Cart::count()}}</p>
                <p class="subTotal">€ {{Cart::total()}}</p>
            </div>
            <nav aria-label="breadcrumb" id="myBreadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">404</li>
                </ol>
            </nav>
            <div class="row">
                <div id="pageNotFound">
                    <div class="col-12">
                        <img src="{{asset('images/home/404.png')}}" alt="404" class="img-fluid">
                    </div>
                    <div class="col-12 my-3 text-center">
                        <a class="btn btn-secondary text-uppercase" onclick="goBack()">terug</a>
                    </div>
                </div>
            </div>
        </main>
    </div>
@stop
