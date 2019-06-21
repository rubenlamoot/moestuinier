@extends('layouts.master')

@section('content')
    <div  class="col-lg-9 col-xl-10">
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
                    <li class="breadcrumb-item"><a href="{{route('showProducts', [$product->level2_category_id, 8])}}">{{$product->level2->name}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
                </ol>
            </nav>

            <section id="product" class="row mb-5">
                <div class="col-sm-4">

                    <img src="{{asset('images/products/' . $product->photo)}}" width="150%" height="150%" alt="{{$product->name}}" class="img-fluid">
                </div>
                <div class="col-sm-8 ml-sm-0">
                    <h2>{{$product->name}}</h2>
                    <p>{{$product->description}}</p>

                    <form class="mb-3" action="{{route('cart_add', $product->id)}}" method="POST">
                        @csrf

                        <div class="input-group d-flex flex-column">
                            @foreach ($product->types as $type)
                                <div class="input-group-prepend d-flex flex-column">
                                    <div class="input-group-text d-flex inputZakje">
                                        <input type="checkbox" aria-label="checkbox" name="type" value="{{$type->id}}">
                                        <p class="mb-0 w-100 text-left pl-2">{{$type->name}}</p>
                                        <p class="prijs mb-0 flex-shrink-1">@if ($type->discount == 1) € {{number_format(($product->price * 2) - (($product->price * 2) * $type->percentage / 100), 2)}} @else  € {{$product->price}} @endif</p>
                                    </div>
                                    @if ($type->discount == 1)<p class="mb-0 text-right text-warning pKorting">{{$type->percentage}}% korting op {{$type->name}}</p>@endif
                                </div>
                            @endforeach
                                @if (session('alert'))
                                    <div class="alert alert-danger w-50">
                                        {{ session('alert') }}
                                    </div>
                                @endif
                                @if ($product->stock == 0)
                                    <p><br>Product tijdelijk uitverkocht</p>
                                @else
                                    <p><br>Geschatte levertijd : vandaag voor 22u besteld, morgen in huis.</p>
                                @endif
                        </div>

                        <div class="kiesWinkel d-flex flex-row">
                            <select class="custom-select kiesAantal mr-2" name="pieces">
                                @for ($i = 1; $i < $product->stock + 1; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            <button class="btn btn-primary" type="submit" @if($product->stock == 0) disabled @endif>Toevoegen aan winkelwagen</button>
                        </div>
                    </form>

                    <div id="zaaiOogst" class="border border-secondary">
                        <div class="d-flex flex-row mt-3">
                            <p class="pZaai mr-2 pl-2">Zaaien = &nbsp;</p>
                            <p class="pOogst">Oogsten = &nbsp;</p>
                        </div>
                        <div class="container">
                            <div class="row d-flex pt-2 pl-md-2 border-top border-secondary" id="maanden">
                                <div class="col-1 px-0">jan</div>
                                <div class="col-1 px-0">feb</div>
                                <div class="col-1 px-0">mrt</div>
                                <div class="col-1 px-0">apr</div>
                                <div class="col-1 px-0">mei</div>
                                <div class="col-1 px-0">jun</div>
                                <div class="col-1 px-0">jul</div>
                                <div class="col-1 px-0">aug</div>
                                <div class="col-1 px-0">sep</div>
                                <div class="col-1 px-0">okt</div>
                                <div class="col-1 px-0">nov</div>
                                <div class="col-1 px-0">dec</div>
                            </div>
                            <div class="row d-flex pl-md-2" id="divZaai">
                                <div class="col-1 px-0 @if($product->sow->jan == 1) zaaien @endif">&nbsp;</div>
                                <div class="col-1 px-0 @if($product->sow->feb == 1) zaaien @endif">&nbsp;</div>
                                <div class="col-1 px-0 @if($product->sow->mar == 1) zaaien @endif">&nbsp;</div>
                                <div class="col-1 px-0 @if($product->sow->apr == 1) zaaien @endif">&nbsp;</div>
                                <div class="col-1 px-0 @if($product->sow->mai == 1) zaaien @endif">&nbsp;</div>
                                <div class="col-1 px-0 @if($product->sow->jun == 1) zaaien @endif">&nbsp;</div>
                                <div class="col-1 px-0 @if($product->sow->jul == 1) zaaien @endif">&nbsp;</div>
                                <div class="col-1 px-0 @if($product->sow->aug == 1) zaaien @endif">&nbsp;</div>
                                <div class="col-1 px-0 @if($product->sow->sep == 1) zaaien @endif">&nbsp;</div>
                                <div class="col-1 px-0 @if($product->sow->okt == 1) zaaien @endif">&nbsp;</div>
                                <div class="col-1 px-0 @if($product->sow->nov == 1) zaaien @endif">&nbsp;</div>
                                <div class="col-1 px-0 @if($product->sow->dec == 1) zaaien @endif">&nbsp;</div>
                            </div>
                            <div class="row d-flex mb-3 pl-md-2" id="divOogst">
                                <div class="col-1 px-0 @if($product->harvest->jan == 1) oogsten @endif">&nbsp;</div>
                                <div class="col-1 px-0 @if($product->harvest->feb == 1) oogsten @endif">&nbsp;</div>
                                <div class="col-1 px-0 @if($product->harvest->mar == 1) oogsten @endif">&nbsp;</div>
                                <div class="col-1 px-0 @if($product->harvest->apr == 1) oogsten @endif">&nbsp;</div>
                                <div class="col-1 px-0 @if($product->harvest->mai == 1) oogsten @endif">&nbsp;</div>
                                <div class="col-1 px-0 @if($product->harvest->jun == 1) oogsten @endif">&nbsp;</div>
                                <div class="col-1 px-0 @if($product->harvest->jul == 1) oogsten @endif">&nbsp;</div>
                                <div class="col-1 px-0 @if($product->harvest->aug == 1) oogsten @endif">&nbsp;</div>
                                <div class="col-1 px-0 @if($product->harvest->sep == 1) oogsten @endif">&nbsp;</div>
                                <div class="col-1 px-0 @if($product->harvest->okt == 1) oogsten @endif">&nbsp;</div>
                                <div class="col-1 px-0 @if($product->harvest->nov == 1) oogsten @endif">&nbsp;</div>
                                <div class="col-1 px-0 @if($product->harvest->dec == 1) oogsten @endif">&nbsp;</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="related_products" class="row">
                <div class="col-12">
                    <header class="d-flex flex-row">
                        <a class="my_product_carousel pl-lg-5" href="#carouselProduct" role="button" data-slide="prev">
                            <span class="fas fa-angle-left fa-2x text-secondary" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <h2 class="mb-3 text-center flex-grow-1">Gerelateerde producten</h2>
                        <a class="my_product_carousel pr-lg-5" href="#carouselProduct" role="button" data-slide="next">
                            <span class="fas fa-angle-right fa-2x text-secondary" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </header>
                </div>
                <div class="col-12">
                    <div id="carouselProduct" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">
                                        @php($total = count($related_products))
                                        @if($total < 4)
                                            @for ($i = 0; $i < $total; $i++)
                                            <div class="col-sm-6 col-lg-3 mb-2">
                                                <div class="card d-flex flex-row flex-lg-column card_product">
                                                    <img class="card-img-top img-product img-fluid" src="{{asset('images/products/' . $related_products[$i]['photo'])}}" alt="{{$related_products[$i]['name']}}">
                                                    <div class="card-body">
                                                        <h3 class="card-title productName">{{$related_products[$i]['name']}}</h3>
                                                        <p class="card-text prijs">€ {{$related_products[$i]['price']}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endfor
                                        @else
                                            @for ($i = 0; $i < 4; $i++)
                                                <div class="col-sm-6 col-lg-3 mb-2">
                                                    <div class="card d-flex flex-row flex-lg-column card_product">
                                                        <img class="card-img-top img-product img-fluid" src="{{asset('images/products/' . $related_products[$i]['photo'])}}" alt="{{$related_products[$i]['name']}}">
                                                        <div class="card-body">
                                                            <h3 class="card-title productName">{{$related_products[$i]['name']}}</h3>
                                                            <p class="card-text prijs">€ {{$related_products[$i]['price']}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endfor
                                        @endif
                                    </div>
                                </div>
                            @if ($total > 4 && $total <= 8)
                            <div class="carousel-item">
                                <div class="row">
                                        @for ($i = 4; $i < $total; $i++)
                                            <div class="col-sm-6 col-lg-3 mb-2">
                                                <div class="card d-flex flex-row flex-lg-column card_product">
                                                    <img class="card-img-top img-product img-fluid" src="{{asset('images/products/' . $related_products[$i]['photo'])}}" alt="{{$related_products[$i]['name']}}">
                                                    <div class="card-body">
                                                        <h3 class="card-title productName">{{$related_products[$i]['name']}}</h3>
                                                        <p class="card-text prijs">€ {{$related_products[$i]['price']}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="d-flex d-lg-none w-100">
                    <a class="my_product_carousel mr-auto pl-5" href="#carouselProduct" role="button" data-slide="prev">
                        <span class="fas fa-angle-left fa-2x text-secondary" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>

                    <a class="my_product_carousel pr-5" href="#carouselProduct" role="button" data-slide="next">
                        <span class="fas fa-angle-right fa-2x text-secondary" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </section>
        </main>
        @include('includes.footer')
    </div>
@stop
