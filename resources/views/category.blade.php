@extends('layouts.master')

@section('content')
    <div class="col-lg-9 col-xl-10">
        <main id="maincontent">
            <div id="shop_menu" class="d-flex justify-content-end my-3 pr-5 w-100">
                <a href="{{route('cart')}}"><i class="fas fa-shopping-cart pt-1 pr-2 text-secondary"></i></a>
                <p class="pr-2">Producten: </p>
                <p id="aantal" class="pr-3">3</p>
                <p class="subTotal">€ 12.48</p>
            </div>
            <nav aria-label="breadcrumb" id="myBreadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$level2Cat->name}}</li>
                </ol>
            </nav>

            <h2 class="text-success mb-5">{{$level2Cat->name}}</h2>

            <section id="pageNumberUp">
                <div class="row mt-3">
                    <div class="col-12 col-sm-1 d-flex align-items-center">
                        {{--@php($page = !empty($_GET['pageSelect']) ? (int)$_GET['pageSelect'] : 8)--}}
                        <form action="{{route('showProducts', [$level2Cat->id, !empty($_GET['pageSelect']) ? (int)$_GET['pageSelect'] : 8])}}" method="GET" name="prodForm">

                            <div class="form-group">
                                <label for="pageSelect">Toon:</label>
                                <select id="pageSelect" name="pageSelect" onchange="document.prodForm.submit()">
                                    <option value="0">Kies:</option>
                                    <option value="4">4</option>
                                    <option value="8">8</option>
                                    <option value="12">12</option>
                                    <option value="16">16</option>
                                    <option value="20">20</option>
                                    <option value="24">24</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-12">
                        {{$products->links()}}
                    </div>
                </div>
                {{--<div class="row mb-3">--}}
                    {{--<div class="col-12 col-sm-1 d-flex align-items-center">--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="selectAantal">Toon:</label>--}}
                            {{--<select id="selectAantal">--}}
                                {{--<option value="1">4</option>--}}
                                {{--<option value="2" selected>8</option>--}}
                                {{--<option value="3">12</option>--}}
                                {{--<option value="4">16</option>--}}
                                {{--<option value="5">20</option>--}}
                                {{--<option value="6">24</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-12 col-sm-11">--}}
                        {{--<div class="d-inline-block">--}}
                            {{--<p class="text-center">Aantal: 8 van 24</p>--}}
                            {{--<nav aria-label="pagina navigatie">--}}
                                {{--<ul class="pagination">--}}
                                    {{--<li class="page-item disabled"><a class="page-link" href="category.html#myBreadcrumb" tabindex="-1">Vorige</a></li>--}}
                                    {{--<li class="page-item active"><a class="page-link" href="category.html#myBreadcrumb">1 <span class="sr-only">(current)</span></a></li>--}}
                                    {{--<li class="page-item"><a class="page-link" href="category.html#myBreadcrumb">2</a></li>--}}
                                    {{--<li class="page-item"><a class="page-link" href="category.html#myBreadcrumb">3</a></li>--}}
                                    {{--<li class="page-item"><a class="page-link" href="category.html#myBreadcrumb">Volgende</a></li>--}}
                                {{--</ul>--}}
                            {{--</nav>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </section>

            <section id="categoryList">
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-sm-6 col-lg-3 category_blok">
                        <div class="card h-100">
                            <img class="card-img-top img-fluid" src="{{asset('images/products/' . $product->photo)}}" alt="{{$product->name}}">
                            <div class="card-body pb-0">
                                <h3 class="card-title">{{$product->name}}</h3>
                                <p class="card-text">{{$product->description}}</p>
                            </div>
                            <div class="card-footer border-0 bg-white">
                                <p class="prijs float-right">{{$product->price}}</p>
                                <a href="{{route('product', $product->id)}}" class="btn btn-primary">Bestellen</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>

            <section id="pageNumberDown">
                <div class="row mt-3">
                    <div class="col-12">
                        {{$products->links()}}
                    </div>
                </div>
                {{--<p class="text-center">Aantal: 8 van 24</p>--}}
                {{--<nav aria-label="pagina navigatie">--}}
                    {{--<ul class="pagination justify-content-center">--}}
                        {{--<li class="page-item disabled"><a class="page-link" href="category.html#myBreadcrumb" tabindex="-1">Vorige</a></li>--}}
                        {{--<li class="page-item active"><a class="page-link" href="category.html#myBreadcrumb">1 <span class="sr-only">(current)</span></a></li>--}}
                        {{--<li class="page-item"><a class="page-link" href="category.html#myBreadcrumb">2</a></li>--}}
                        {{--<li class="page-item"><a class="page-link" href="category.html#myBreadcrumb">3</a></li>--}}
                        {{--<li class="page-item"><a class="page-link" href="category.html#myBreadcrumb">Volgende</a></li>--}}
                    {{--</ul>--}}
                {{--</nav>--}}
            </section>

        </main>
    @include('includes.footer')
    </div>
@stop
