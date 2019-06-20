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
                            {{--<div class="card">--}}
                                {{--<div class="card-header" id="headingOne">--}}
                                    {{--<h2 class="mb-0">--}}
                                        {{--<button class="btn btn-link w-100 d-flex" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="@auth false @else true @endauth" aria-controls="collapseOne">--}}
                                            {{--<span class="text-secondary">Stap 1</span>--}}
                                            {{--<span class="text-dark flex-grow-1 text-right">Checkout opties</span>--}}
                                        {{--</button>--}}
                                    {{--</h2>--}}
                                {{--</div>--}}
                                {{--<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion_Checkout">--}}
                                    {{--<div class="card-body">--}}
                                        {{--<div class="row">--}}
                                            {{--<div class="col-12 col-md-6 d-flex flex-column mb-5 mb-md-0">--}}
                                                {{--<h3 class="text-uppercase text-secondary border-bottom border-secondary text-right pb-3">nieuwe klant</h3>--}}
                                                {{--<p>Meld je bij ons aan voor toekomstig gemak:</p>--}}
                                                {{--<form>--}}
                                                    {{--<div class="form-check">--}}
                                                        {{--<input class="form-check-input" type="radio" id="gastRadios" value="option1" checked>--}}
                                                        {{--<label class="form-check-label" for="gastRadios">--}}
                                                            {{--Checkout als Bezoeker--}}
                                                        {{--</label>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="form-check">--}}
                                                        {{--<input class="form-check-input" type="radio" id="registreerRadios" value="option2">--}}
                                                        {{--<label class="form-check-label" for="registreerRadios">--}}
                                                            {{--Registreer--}}
                                                        {{--</label>--}}
                                                    {{--</div>--}}
                                                    {{--<p class="mt-3 border-bottom border-secondary pb-3">Maak een account aan bij onze winkel en ga vlugger door het checkout proces. Bovendien kan je meerdere leveringsadressen opslaan en je orders bekijken en volgen via je account. </p>--}}
                                                    {{--<div>--}}
                                                        {{--<button class="btn btn-dark text-uppercase" type="submit">ga verder</button>--}}
                                                    {{--</div>--}}
                                                {{--</form>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-12 col-md-6 d-flex flex-column">--}}
                                                {{--<h3 class="text-uppercase text-secondary border-bottom border-secondary text-right pb-3">bestaande klant</h3>--}}
                                                {{--<p>Als je reeds een account hebt bij ons, gelieve dan in te loggen.</p>--}}
                                                {{--<form class="mb-auto" method="POST" action="{{ route('login') }}">--}}
                                                    {{--@csrf--}}
                                                    {{--<div class="form-group">--}}
                                                        {{--<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Vul uw email in">--}}
                                                        {{--@error('email')--}}
                                                        {{--<span class="invalid-feedback" role="alert">--}}
                                                            {{--<strong>{{ $message }}</strong>--}}
                                                        {{--</span>--}}
                                                        {{--@enderror--}}
                                                    {{--</div>--}}
                                                    {{--<div class="form-group">--}}
                                                        {{--<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Wachtwoord">--}}
                                                        {{--@error('password')--}}
                                                        {{--<span class="invalid-feedback" role="alert">--}}
                                                            {{--<strong>{{ $message }}</strong>--}}
                                                        {{--</span>--}}
                                                        {{--@enderror--}}
                                                    {{--</div>--}}
                                                    {{--<div class="form-group form-check">--}}
                                                        {{--<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}
                                                        {{--<label class="form-check-label pb-1" for="remember">Paswoord onthouden</label>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="d-flex border-top border-secondary pt-3">--}}
                                                        {{--<button class="btn btn-dark text-uppercase" type="submit">inloggen</button>--}}
                                                        {{--@if (Route::has('password.request'))--}}
                                                            {{--<a class="btn btn-link text-danger flex-fill text-right pr-3" href="{{ route('password.request') }}">--}}
                                                                {{--{{ __('Wachtwoord vergeten?') }}--}}
                                                            {{--</a>--}}
                                                        {{--@endif--}}

                                                    {{--</div>--}}
                                                {{--</form>--}}
                                            {{--</div>--}}
                                            {{--<div class="row justify-content-center mt-3">--}}
                                                {{--<div class="col-md-8">--}}
                                                    {{--@if (session('alert'))--}}
                                                        {{--<div class="alert alert-danger">--}}
                                                            {{--{{ session('alert') }}--}}
                                                        {{--</div>--}}
                                                    {{--@endif--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link collapsed w-100 d-flex" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
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
                                        <button class="btn btn-link collapsed w-100 d-flex" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <span class="text-secondary">Stap 2</span>
                                            <span class="text-dark flex-grow-1 text-right">Leveringsgegevens</span>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse @if($current == 2) show @endif" aria-labelledby="headingTwo" data-parent="#accordion_Checkout">
                                    <div class="card-body">
                                        <h3 class="text-uppercase text-secondary border-bottom border-secondary text-right mt-3 mt-md-0 pb-3">Leveringsadres</h3>
                                        <form class="">
                                            <input type="text" class="form-control mb-2 mt-3" id="delFirstName" placeholder="Voornaam">
                                            <input type="text" class="form-control mb-2" id="delLastName" placeholder="Familienaam">
                                            <input type="text" class="form-control mb-2" id="delAddress" placeholder="Adres">
                                            <div class="d-flex">
                                                <input type="text" class="form-control mb-2 mr-3" id="delHouseNumber" placeholder="Nummer">
                                                <input type="text" class="form-control mb-2 ml-3" id="delBoxNumber" placeholder="Bus">
                                            </div>
                                            <input type="text" class="form-control mb-2" id="delPostalCode" placeholder="Postcode">
                                            <input type="text" class="form-control mb-2" id="delCity" placeholder="Stad">
                                            <div class="form-group d-flex">
                                                <label for="delCountrySelect" class="pr-3 pt-1">Land:</label>
                                                <select class="form-control" id="delCountrySelect">
                                                    <option selected value="1">België</option>
                                                    <option value="2">Duitsland</option>
                                                    <option value="3">Frankrijk</option>
                                                    <option value="4">Luxemburg</option>
                                                    <option value="5">Nederland</option>
                                                </select>
                                            </div>
                                            <button class="btn btn-dark text-uppercase" type="submit">ga verder</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{--<div class="card">--}}
                                {{--<div class="card-header" id="headingThree">--}}
                                    {{--<h2 class="mb-0">--}}
                                        {{--<button class="btn btn-link collapsed w-100 d-flex" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">--}}
                                            {{--<span class="text-secondary">Stap 3 </span>--}}
                                            {{--<span class="text-dark flex-grow-1 text-right">Betalingsmethode</span>--}}
                                        {{--</button>--}}
                                    {{--</h2>--}}
                                {{--</div>--}}
                                {{--<div id="collapseThree" class="collapse @if ($current == 3) show @endif " aria-labelledby="headingThree" data-parent="#accordion_Checkout">--}}
                                    {{--<div class="card-body">--}}
                                        {{--<h3 class="text-uppercase text-secondary border-bottom border-secondary text-right mt-3 mt-md-0 pb-3">Geef een keuze aan</h3>--}}
                                        {{--<form class="mt-3">--}}
                                            {{--<div class="form-check">--}}
                                                {{--<input class="form-check-input" type="radio" name="payRadios" id="creditCard" value="option1" checked>--}}
                                                {{--<label class="form-check-label" for="creditCard">--}}
                                                    {{--Visa/Mastercard--}}
                                                {{--</label>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-check">--}}
                                                {{--<input class="form-check-input" type="radio" name="payRadios" id="debitCard" value="option2">--}}
                                                {{--<label class="form-check-label" for="debitCard">--}}
                                                    {{--Bancontact/Mistercash--}}
                                                {{--</label>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-check">--}}
                                                {{--<input class="form-check-input" type="radio" name="payRadios" id="directPay" value="option3">--}}
                                                {{--<label class="form-check-label" for="directPay">--}}
                                                    {{--Direct Banking--}}
                                                {{--</label>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-check">--}}
                                                {{--<input class="form-check-input" type="radio" name="payRadios" id="payPal" value="option4">--}}
                                                {{--<label class="form-check-label" for="payPal">--}}
                                                    {{--Paypal--}}
                                                {{--</label>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-check">--}}
                                                {{--<input class="form-check-input" type="radio" name="payRadios" id="transfer" value="option5">--}}
                                                {{--<label class="form-check-label" for="transfer">--}}
                                                    {{--Overschrijving--}}
                                                {{--</label>--}}
                                            {{--</div>--}}
                                            {{--<button class="btn btn-dark text-uppercase mt-3" type="submit">ga verder</button>--}}
                                        {{--</form>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link collapsed w-100 d-flex" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <span class="text-secondary">Stap 3 </span>
                                            <span class="text-dark flex-grow-1 text-right">Bevestig order</span>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse @if ($current == 3) show @endif " aria-labelledby="headingThree" data-parent="#accordion_Checkout">
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
                                                        <p class="my-auto">Zaadjes</p>
                                                    </div>
                                                    <div class="col-md-2 pl-0 my-auto">
                                                        <p class="my-auto">Prijs/Stuk</p>
                                                    </div>
                                                    <div class="col-md-2 pl-0 my-auto">
                                                        <p class="my-auto">Aantal</p>
                                                    </div>
                                                    <div class="col-md-2 pl-3 my-auto">
                                                        <p class="my-auto">Subtotaal</p>
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
                                                    <p class="mb-1 d-md-none">Prijs : &nbsp;</p>
                                                    <p class="unitPrice mb-1">€ {{$cart->price}}</p>

                                                </div>
                                                <div class="col-md-2 d-flex flex-md-column my-auto">
                                                    <p class="mb-1 d-md-none">Aantal : &nbsp;</p>
                                                    <p class="mb-1">{{$cart->qty}}</p>
                                                </div>
                                                <div class="col-md-2 d-flex flex-md-column my-auto">
                                                    <p class="mb-0 d-md-none">Subtotaal : &nbsp;</p>
                                                    <p class="prijs">€ {{$cart->price * $cart->qty}}</p>
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
                                        <button class="btn btn-link collapsed w-100 d-flex" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            <span class="text-secondary">Stap 4</span>
                                            <span class="text-dark flex-grow-1 text-right">Betalen</span>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseFour" class="collapse @if ($current == 4) show @endif " aria-labelledby="headingFour" data-parent="#accordion_Checkout">
                                    <div class="card-body">
                                        <h3 class="text-uppercase text-secondary border-bottom border-secondary text-right mt-3 mt-md-0 pb-3">Klik op de betaal knop</h3>

                                    <pay-stripe route={{route('toPay')}} :cart-total={{Cart::total() * 100}}></pay-stripe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--<form action="{{route('toPay')}}" method="POST" id="checkout-form">--}}
                        {{--{{csrf_field()}}--}}
                        {{--<input type="hidden" name="stripeToken" id="stripeToken">--}}
                        {{--<input type="hidden" name="stripeEmail" id="stripeEmail">--}}
                        {{--<button type="submit" id="btnPay">Betaal</button>--}}

                        {{--<script src="https://checkout.stripe.com/checkout.js"></script>--}}
                        {{--<script>--}}
                            {{--console.log('test');--}}
                            {{--let stripe = StripeCheckout.configure({--}}
                                {{--key: "{{config('services.stripe.key')}}",--}}
                                {{--image: "https://stripe.com/img/documentation/checkout/marketplace.png",--}}
                                {{--locale: 'auto',--}}
                                {{--token: function (token) {--}}
                                    {{--document.querySelector('#stripeEmail').value = token.email;--}}
                                    {{--document.querySelector('#stripeToken').value = token.id;--}}
                                    {{--document.querySelector('#checkout-form').submit();--}}
                                {{--}--}}
                            {{--});--}}

                            {{--document.querySelector('#btnPay').addEventListener('click', function (e) {--}}
                                {{--stripe.open({--}}
                                    {{--name:'mijn product',--}}
                                    {{--description:'beschrijving van product',--}}
                                    {{--zipCode:false,--}}
                                    {{--amount: 1000,--}}
                                    {{--currency:'eur',--}}
                                {{--});--}}
                                {{--e.preventDefault();--}}
                            {{--});--}}
                        {{--</script>--}}
                    {{--</form>--}}
                </div>
            </section>
            {{--<form action="{{route('toPay')}}" method="post">--}}
                {{--@csrf--}}
                {{--<script src="https://checkout.stripe.com/checkout.js" type="application/javascript"--}}
                        {{--class="stripe-button"--}}
                        {{--data-key="{{config('services.stripe.key')}}"--}}
                        {{--data-name="mijnproducten"--}}
                        {{--data-description="Access for a year"--}}
                        {{--data-image="{{asset('images/home/logo.png')}}"--}}
                        {{--data-amount="5000"--}}
                        {{--data-locale="auto"--}}
                        {{--data-currency="eur">--}}
                {{--</script>--}}
            {{--</form>--}}
        </main>
        @include('includes.footer')
    </div>

@stop
