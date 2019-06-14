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
                    <li class="breadcrumb-item active" aria-current="page">Winkelwagen</li>
                </ol>
            </nav>

            <h2 class="text-secondary mb-5">Winkelwagen</h2>

            <section id="shopItems">
                <div class="row">
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-10 d-none d-md-block">
                        <div class="row">
                            <div class="col-md-2 pl-0">
                                <p>Beschrijving</p>
                            </div>
                            <div class="col-md-2 pl-0">
                                <p>Type</p>
                            </div>
                            <div class="col-md-2 pl-0">
                                <p>Prijs/Stuk</p>
                            </div>
                            <div class="col-md-2 pl-2">
                                <p>Aantal</p>
                            </div>
                            <div class="col-md-2 pl-0">
                                <p>Subtotaal</p>
                            </div>
                            <div class="col-md-2 pl-0">

                            </div>
                        </div>
                    </div>

                </div>

                @foreach (Cart::content() as $cart)


                <div class="row border-bottom mb-2">
                    <div class="col-6 col-sm-4 col-md-2">
                        <img src="{{asset('images/products/' . $cart->options->photo)}}" width="50%" height="50%" class="img-fluid" alt="{{$cart->name}}">
                    </div>
                    <div class="col-6 col-sm-8 col-md-10 pl-0">
                        <div class="row">
                            <div class="col-md-2">
                                <h3 class="productName">{{$cart->name}}</h3>
                            </div>
                            <div class="col-md-2">
                                <p class="seeds mb-1">{{$cart->options->type}}</p>
                            </div>
                            <div class="col-md-2 d-flex flex-md-column">
                                <p class="mb-1 d-md-none">Prijs : &nbsp;</p>
                                <p class="unitPrice mb-1">€ {{$cart->price}}</p>

                            </div>
                            <form action="{{route('cart_update', $cart->rowId)}}" method="POST" name="addForm{{$cart->rowId}}">
                                @csrf
                                <div class="form-group col-md-2 d-flex">
                                    {{--<input type="test" name="aantal" id="aantal" onchange="document.cartForm.submit()">--}}
                                    <label for="add_pieces"></label>
                                    <select class="custom-select kiesAantal mr-2" id="add_pieces" name="add_pieces" onchange="document.addForm{{$cart->rowId}}.submit()">
                                        @for ($i = 1; $i < 21; $i++)
                                            <option value="{{$i}}" @if($cart->qty == $i) selected @endif>{{$i}}</option>
                                        @endfor
                                    </select>
                                    <a href="{{route('cart_delete', $cart->rowId)}}"><i class="far fa-times-circle fa-2x text-secondary pt-1 pl-4 d-md-none"></i></a>
                                </div>
                            </form>

                            <div class="col-md-2 d-flex flex-md-column">
                                <p class="mb-0 d-md-none">Subtotaal : &nbsp;</p>
                                <p class="prijs text-right mr-3">€ {{$cart->price * $cart->qty}}</p>
                            </div>
                            <div class="col-md-2 text-center">
                                <a href="{{route('cart_delete', $cart->rowId)}}"><i class="fas fa-trash-alt fa-2x text-secondary d-none d-md-block"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </section>
            <section id="Shipping_totalPrice">
                <div class="row m-3">
                    <div class="col-12 col-sm-4 col-md-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link bg-secondary text-white text-center py-sm-3 py-md-4 active" id="pill_ship_tab" data-toggle="pill" href="#pill_ship" role="tab" aria-controls="pill_ship" aria-selected="true">Verzending</a>
                            <a class="nav-link bg-secondary text-white text-center py-sm-3 py-md-4 my-3 my-md-1" id="pill_discount_tab" data-toggle="pill" href="#pill_discount" role="tab" aria-controls="pill_discount" aria-selected="false">Kortingscode</a>
                            <a class="nav-link bg-secondary text-white text-center py-sm-3 py-md-4" id="pill_voucher_tab" data-toggle="pill" href="#pill_voucher" role="tab" aria-controls="pill_voucher" aria-selected="false">Kadobon</a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-8 col-md-4">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="pill_ship" role="tabpanel" aria-labelledby="pill_ship_tab">
                                <p class="mt-3 my-sm-0">Geef een bestemming in om de verzendingskosten te berekenen</p>
                                <form class="my-3">
                                    <select class="form-control" id="countries">
                                        <option selected value="1">België</option>
                                        <option value="2">Duitsland</option>
                                        <option value="3">Frankrijk</option>
                                        <option value="4">Luxemburg</option>
                                        <option value="5">Nederland</option>
                                    </select>
                                    <input type="text" class="form-control mt-2" id="postCode" placeholder="Postcode/Zip">
                                    <button class="btn btn-secondary mt-7 to-bottom" type="">Bereken</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pill_discount" role="tabpanel" aria-labelledby="pill_discount_tab">
                                <form class="my-3">
                                    <label for="discount">Geef hier uw kortingscode in</label>
                                    <input type="text" class="form-control" id="discount">
                                    <button class="btn btn-secondary mt-7 to-bottom" type="">Valideer code</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pill_voucher" role="tabpanel" aria-labelledby="pill_voucher_tab">
                                <form class="my-3">
                                    <label for="voucher">Geef hier uw kadoboncode in</label>
                                    <input type="text" class="form-control" id="voucher">
                                    <button class="btn btn-secondary mt-7 to-bottom" type="">Valideer code</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 mt-sm-3 mt-md-0">
                        <div class="row border border-dark mb-3">
                            <div class="col-8 px-0 text-center">
                                <p class="border-bottom border-secondary mb-0 py-2">Subtotaal : </p>
                                <p class="border-bottom border-secondary mb-0 py-2">Verzendingskosten : </p>
                                <p class="border-bottom border-secondary mb-0 py-2">Korting : </p>
                                <p class="mb-0 py-2">Totaal : </p>
                            </div>
                            <div class="col-4 px-0 border-left border-secondary text-center">
                                <p class="subTotal border-bottom border-secondary mb-0 py-2">€ {{Cart::total()}}</p>
                                <p class="shipCost border-bottom border-secondary mb-0 py-2">€ 7.00</p>
                                <p class="discountVoucher border-bottom border-secondary mb-0 py-2">€ 0.00</p>
                                <p class="Total prijs mb-0 py-2">€ {{Cart::total() + 7}}</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <a href="{{route('index')}}" class="btn btn-secondary">Verder winkelen</a>
                            <a href="checkout.html#myBreadcrumb" class="btn btn-secondary ml-auto">Checkout</a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    @include('includes.footer')
    </div>
@stop
