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
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>

            <h2 class="text-secondary mb-5">Checkout</h2>

            <section>
                <div class="row">
                    <div class="col-12">
                        <div class="accordion" id="accordion_Checkout">

                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link collapsed w-100 d-flex" type="button" data-toggle="collapse" data-target="@if ($current == 1) #collapseOne @endif" aria-expanded="true" aria-controls="collapseOne">
                                            <span class="text-secondary">Stap 1</span>
                                            <span class="text-dark flex-grow-1 text-right">Facturatiegegevens</span>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseOne" class="collapse @if ($current == 1) show @endif " aria-labelledby="headingOne" data-parent="#accordion_Checkout">
                                    <div class="card-body">
                                        <form action="{{route('step1')}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <h3 class="text-uppercase text-secondary border-bottom border-secondary text-right pb-3">Persoonlijke gegevens</h3>
                                                    <input type="text" class="form-control mb-2 mt-3" name="first_name" placeholder="Voornaam" @auth value="{{Auth::user()->first_name}}" @endauth>
                                                    <input type="text" class="form-control mb-2" name="last_name" placeholder="Familienaam" @auth value="{{Auth::user()->last_name}}" @endauth>
                                                    <input type="email" class="form-control mb-2" name="email" placeholder="Email" @auth value="{{Auth::user()->email}}" @endauth>
                                                    <input type="tel" class="form-control mb-2" name="phone" placeholder="Telefoonnummer" @auth value="{{Auth::user()->phone}}" @endauth>
                                                    <input type="text" class="form-control mb-2" name="company" placeholder="Bedrijf" @auth value="{{Auth::user()->company}}" @endauth>
                                                    <input type="text" class="form-control mb-2" name="vat" placeholder="BTW-nummer" @auth value="{{Auth::user()->vat}}" @endauth>
                                                    <input type="password" class="form-control mb-2" id="facBillingPassword" name="password" placeholder="Paswoord" @auth value="{{Auth::user()->password}}" @endauth>
                                                    <input type="password" class="form-control mb-3" id="facBillingPassword2" name="password_confirmation" placeholder="Bevestig je paswoord" @auth value="{{Auth::user()->password}}" @endauth>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <h3 class="text-uppercase text-secondary border-bottom border-secondary text-right mt-3 mt-md-0 pb-3">Facturatieadres</h3>
                                                    <input type="text" class="form-control mb-2 mt-3" name="street" placeholder="Adres" @auth value="{{Auth::user()->address->street}}" @endauth>
                                                    <div class="d-flex">
                                                        <input type="text" class="form-control mb-2 mr-3" name="house_nr" placeholder="Nummer" @auth value="{{Auth::user()->address->house_nr}}" @endauth>
                                                        <input type="text" class="form-control mb-2 ml-3" name="bus_nr" placeholder="Bus" @auth value="{{Auth::user()->address->bus_nr}}" @endauth>
                                                    </div>
                                                    <input type="text" class="form-control mb-2" name="zip_code" placeholder="Postcode" @auth value="{{Auth::user()->address->city->zip_code}}" @endauth>
                                                    <input type="text" class="form-control mb-2" name="city" placeholder="Stad" @auth value="{{Auth::user()->address->city->city}}" @endauth>
                                                    <div class="form-group d-flex">
                                                        <label for="country" class="pr-3 pt-1">Land:</label>
                                                        <select class="form-control" name="country" id="country">
                                                            @php($countries = \App\Country::all())
                                                            @foreach($countries as $country)
                                                                <option value="{{$country->id}}" @auth @if(Auth::user()->address->country->id == $country->id) selected @endif @endauth>{{$country->country}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="form-check border-top border-secondary pt-3">
                                                        <input class="form-check-input" type="checkbox" value="1" id="delivery_billingCheck" name="delivery_billingCheck">
                                                        <label class="form-check-label" for="delivery_billingCheck">
                                                            Mijn leverings- en facturatieadres zijn hetzelfde.
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="privacy" name="privacy" value="1" @auth  @if (Auth::user()->privacy == 1) checked @endif @endauth>
                                                        <label class="form-check-label" for="privacy">
                                                            Ik heb het privacybeleid gelezen en goedgekeurd.
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-check borderAddress py-3">
                                                        <input class="form-check-input" type="checkbox" value="1" id="salesConditionCheck" name="salesConditionCheck">
                                                        <label class="form-check-label" for="salesConditionCheck">
                                                            Ik heb de verkoopsvoorwaarden gelezen en goedgekeurd.
                                                        </label>
                                                    </div>
                                                    <button class="btn btn-dark text-uppercase" type="submit">ga verder</button>
                                                </div>
                                            </div>
                                            @include('errors.form-error')
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link collapsed w-100 d-flex" type="button" data-toggle="collapse" data-target="@if ($current == 2) #collapseTwo @endif" aria-expanded="false" aria-controls="collapseTwo">
                                            <span class="text-secondary">Stap 2</span>
                                            <span class="text-dark flex-grow-1 text-right">Leveringsgegevens</span>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse @if($current == 2) show @endif" aria-labelledby="headingTwo" data-parent="#accordion_Checkout">
                                    <div class="card-body">
                                        <h3 class="text-uppercase text-secondary border-bottom border-secondary text-right mt-3 mt-md-0 pb-3">Leveringsadres</h3>
                                        <form action="{{route('step2')}}" method="POST">
                                            @csrf
                                            @method('POST')
                                            {{--<input type="text" class="form-control mb-2 mt-3" id="delFirstName" placeholder="Voornaam">--}}
                                            {{--<input type="text" class="form-control mb-2" id="delLastName" placeholder="Familienaam">--}}
                                            <input type="text" class="form-control mb-2" name="street" placeholder="Adres" required>
                                            <div class="d-flex">
                                                <input type="text" class="form-control mb-2 mr-3" name="house_nr" placeholder="Nummer" required>
                                                <input type="text" class="form-control mb-2 ml-3" name="bus_nr" placeholder="Bus">
                                            </div>
                                            <input type="text" class="form-control mb-2" name="zip_code" placeholder="Postcode" required>
                                            <input type="text" class="form-control mb-2" name="city" placeholder="Stad" required>
                                            <div class="form-group d-flex">
                                                <label for="country2" class="pr-3 pt-1">Land:</label>
                                                <select class="form-control" id="country2" name="country">
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}" @auth @if(Auth::user()->address->country->id == $country->id) selected @endif @endauth>{{$country->country}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button class="btn btn-dark text-uppercase" type="submit">ga verder</button>
                                            @include('errors.form-error')
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link collapsed w-100 d-flex" type="button" data-toggle="collapse" data-target="@if ($current == 3) #collapseThree @endif" aria-expanded="false" aria-controls="collapseThree">
                                            <span class="text-secondary">Stap 3 </span>
                                            <span class="text-dark flex-grow-1 text-right">Bevestig order</span>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse @if ($current == 3) show @endif" aria-labelledby="headingThree" data-parent="#accordion_Checkout">
                                    <div class="card-body">
                                        <div class="row border border-secondary">
                                            <div class="col-12 d-md-none">
                                                <h2 class="text-center my-3">Artikelen</h2>
                                            </div>
                                            <div class="col-12 d-none d-md-block">
                                                <div class="row">
                                                    <div class="col-md-4 pl-3 my-3">
                                                        <p class="my-auto">Beschrijving</p>
                                                    </div>
                                                    <div class="col-md-2 pl-3 my-auto">
                                                        <p class="my-auto">type</p>
                                                    </div>
                                                    <div class="col-md-2 pl-0 my-auto">
                                                        <p class="my-auto">Prijs/Stuk (excl Btw)</p>
                                                    </div>
                                                    <div class="col-md-2 pl-0 my-auto">
                                                        <p class="my-auto">Aantal</p>
                                                    </div>
                                                    <div class="col-md-2 pl-3 my-auto">
                                                        <p class="my-auto">Subtotaal (incl Btw)</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @foreach (Cart::content() as $cart)
                                            <div class="row border border-top-0 border-secondary">
                                                <div class="col-md-4">
                                                    <h3 class="productName my-3">{{$cart->name}}</h3>
                                                </div>
                                                <div class="col-md-2 my-auto">
                                                    <p class="seeds mb-1">{{$cart->options->type}}</p>
                                                </div>
                                                <div class="col-md-2 d-flex flex-md-column my-auto">
                                                    <p class="mb-1 d-md-none">Prijs (excl Btw): &nbsp;</p>
                                                    <p class="unitPrice mb-1">€ {{$cart->price}}</p>

                                                </div>
                                                <div class="col-md-2 d-flex flex-md-column my-auto">
                                                    <p class="mb-1 d-md-none">Aantal : &nbsp;</p>
                                                    <p class="mb-1">{{$cart->qty}}</p>
                                                </div>
                                                <div class="col-md-2 d-flex flex-md-column my-auto">
                                                    <p class="mb-0 d-md-none">Subtotaal (incl Btw) : &nbsp;</p>
                                                    <p class="prijs">€ {{number_format($cart->total, 2)}}</p>
                                                </div>
                                            </div>
                                        @endforeach

                                        <div class="row border border-top-0 border-secondary mb-3">
                                            <div class="col-8 px-0 text-center">
                                                <p class="border-bottom border-secondary mb-0 py-2">Subtotaal : </p>
                                                <p class="border-bottom border-secondary mb-0 py-2">Verzendingskosten : </p>
                                                <p class="border-bottom border-secondary mb-0 py-2">Korting : </p>
                                                <p class="mb-0 py-2">Totaal : </p>
                                            </div>
                                            <div class="col-4 px-0 border-left border-secondary text-center">
                                                <p class="subTotal border-bottom border-secondary mb-0 py-2">€ {{Cart::total()}}</p>
                                                <p class="shipCost border-bottom border-secondary mb-0 py-2">€ {{$ship_cost}}</p>
                                                <p class="discountVoucher border-bottom border-secondary mb-0 py-2">€ 0.00</p>
                                                <p class="Total prijs mb-0 py-2">€ {{Cart::total() + $ship_cost}}</p>
                                            </div>
                                        </div>

                                        <a href="{{route('step3')}}" class="btn btn-dark text-uppercase float-right mb-3">naar betalen</a>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingFour">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link collapsed w-100 d-flex" type="button" data-toggle="collapse" data-target="@if ($current == 4) #collapseFour @endif" aria-expanded="false" aria-controls="collapseFour">
                                            <span class="text-secondary">Stap 4</span>
                                            <span class="text-dark flex-grow-1 text-right">Betalen</span>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseFour" class="collapse @if ($current == 4) show @endif " aria-labelledby="headingFour" data-parent="#accordion_Checkout">
                                    <div class="card-body">
                                        <h3 class="text-uppercase text-secondary border-bottom border-secondary text-right mt-3 mt-md-0 pb-3">Klik op de betaal knop</h3>

                                    <pay-stripe route={{route('toPay')}} :cart-total={{(Cart::total() + $ship_cost) * 100}}></pay-stripe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

        </main>
        @include('includes.footer')
    </div>

@stop
