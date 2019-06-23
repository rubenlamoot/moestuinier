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
                    <li class="breadcrumb-item active" aria-current="page">{{$level2Cat->name}}</li>
                </ol>
            </nav>

            <h2 class="text-success mb-5">@if ($level2Cat->id == 0) Nieuwe artikelen @else {{$level2Cat->name}} @endif</h2>

            <section id="pageNumberUp">
                <div class="row mt-3">
                    <div class="col-12 col-sm-1 @if ($level2Cat->id == 0) d-none @else d-flex align-items-center @endif">
                        <form action="{{route('showProducts', $level2Cat->id)}}" name="prodForm">
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
            </section>

        </main>
    @include('includes.footer')
    </div>
@stop
