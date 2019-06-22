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
                    <li class="breadcrumb-item active" aria-current="page">Oeps</li>
                </ol>
            </nav>

            <h2 class="text-secondary mb-5">Er is iets fout gelopen met de betaling, gelieve <a href="{{route('step3')}}">opnieuw</a> te proberen.</h2>




        </main>
        @include('includes.footer')
    </div>
@stop
