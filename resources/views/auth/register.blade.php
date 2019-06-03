{{--@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection--}}

@extends('layouts.master')

@section('content')
<div class="col-lg-9 col-xl-10">
    <main id="maincontent">
        <div id="shop_menu" class="d-flex justify-content-end my-3 pr-5 w-100">
            <a href="cart.html"><i class="fas fa-shopping-cart pt-1 pr-2 text-secondary"></i></a>
            <p class="pr-2">Producten: </p>
            <p id="aantal" class="pr-3">3</p>
            <p class="subTotal">€ 12.48</p>
        </div>
        <nav aria-label="breadcrumb" id="myBreadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registreer Account</li>
            </ol>
        </nav>

        <h2 class="text-secondary mb-5">Registreer account</h2>

        <div class="row mb-md-5">
            <div class="col-12 col-md-8" id="registerAccount">
                <p>Indien je reeds een account hebt bij ons, gelieve in te loggen via de <a href="login.html#myBreadcrumb">login-pagina</a>.</p>
                <h3 class="text-uppercase text-secondary border-bottom border-secondary text-right pb-3">Persoonlijke gegevens</h3>
                <form>
                    <input type="text" class="form-control mb-2 mt-3" id="regFirstName" placeholder="Voornaam">
                    <input type="text" class="form-control mb-2" id="regLastName" placeholder="Familienaam">
                    <input type="email" class="form-control mb-2" id="regBillingEmail" placeholder="E-mail">
                    <input type="tel" class="form-control mb-2" id="regPhoneNumber" placeholder="Telefoonnummer">
                    <input type="text" class="form-control mb-2" id="regCompany" placeholder="Bedrijf">
                    <input type="text" class="form-control mb-2" id="regBtwNumber" placeholder="BTW-nummer">

                    <h3 class="text-uppercase text-secondary border-bottom border-secondary text-right mt-5 pb-3">Adres gegevens</h3>
                    <input type="text" class="form-control mb-2 mt-3" id="regAddress" placeholder="Adres">
                    <div class="d-flex">
                        <input type="text" class="form-control mb-2 mr-3" id="regHouseNumber" placeholder="Nummer">
                        <input type="text" class="form-control mb-2 ml-3" id="regBoxNumber" placeholder="Bus">
                    </div>
                    <input type="text" class="form-control mb-2" id="regPostalCode" placeholder="Postcode">
                    <input type="text" class="form-control mb-2" id="regCity" placeholder="Stad">
                    <div class="form-group d-flex">
                        <label for="regCountrySelect" class="pr-3 pt-1">Land:</label>
                        <select class="form-control" id="regCountrySelect">
                            <option selected value="1">België</option>
                            <option value="2">Duitsland</option>
                            <option value="3">Frankrijk</option>
                            <option value="4">Luxemburg</option>
                            <option value="5">Nederland</option>
                        </select>
                    </div>

                    <h3 class="text-uppercase text-secondary border-bottom border-secondary text-right mt-5 pb-3">Paswoord</h3>
                    <input type="password" class="form-control mb-2 mt-3" id="regPassword" placeholder="Paswoord">
                    <input type="password" class="form-control mb-3" id="regPassword2" placeholder="Bevestig je paswoord">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="newsLetterCheck">
                        <label class="form-check-label" for="newsLetterCheck">
                            Ik schrijf me in voor de nieuwsbrief.
                        </label>
                    </div>
                    <div class="form-check py-3">
                        <input class="form-check-input" type="checkbox" value="" id="privacyCheck">
                        <label class="form-check-label" for="privacyCheck">
                            Ik heb het privacybeleid gelezen en goedgekeurd.
                        </label>
                    </div>
                    <button class="btn btn-dark text-uppercase" type="submit">account aanmaken</button>
                </form>
            </div>

            <div class="col-12 col-md-4" id="klantGetuigenis">
                <h3 class="text-uppercase text-dark text-right py-3 pr-3 mt-5 mb-0 bg-secondary">klantendienst</h3>
                <ul class="list-group text-center text-uppercase">
                    <li class="list-group-item"><a class="text-secondary" href="404page.html#myBreadcrumb">contact</a></li>
                    <li class="list-group-item"><a class="text-secondary" href="404page.html#myBreadcrumb">retourneren</a></li>
                    <li class="list-group-item"><a class="text-secondary" href="404page.html#myBreadcrumb">site map</a></li>
                    <li class="list-group-item"><a class="text-secondary" href="404page.html#myBreadcrumb">help en contact</a></li>
                    <li class="list-group-item"><a class="text-secondary" href="404page.html#myBreadcrumb">faq klanten</a></li>
                    <li class="list-group-item"><a class="text-secondary" href="404page.html#myBreadcrumb">privacy en cookies beleid</a></li>
                    <li class="list-group-item"><a class="text-secondary" href="404page.html#myBreadcrumb">kwaliteit en garantie</a></li>
                    <li class="list-group-item"><a class="text-secondary" href="404page.html#myBreadcrumb">verkoopsvoorwaarden</a></li>
                </ul>
                <div class="d-flex bg-secondary mt-5 mb-3 py-3 pr-3">
                    <a class="getuigen_prev" href="#carousel_getuigenissen" role="button" data-slide="prev">
                        <span class="fas fa-chevron-left text-dark px-5 px-md-3 px-xl-5" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="getuigen_next" href="#carousel_getuigenissen" role="button" data-slide="next">
                        <span class="fas fa-chevron-right text-dark" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    <h3 class="text-uppercase text-dark flex-grow-1 text-right m-0">getuigenissen</h3>
                </div>
                <div id="carousel_getuigenissen" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div>
                                <img src="assets/images/getuige1.jpg" class="d-block float-left pr-3" width="135" height="135" alt="getuige1">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci cupiditate inventore neque pariatur quis quod veniam voluptate! Aperiam enim iusto nam nesciunt voluptas! Atque deleniti maxime nobis quaerat quasi totam.</p>
                            </div>
                            <p><span class="font-weight-bold">Roberta Curabitus</span>, Zwolle Nederland</p>
                        </div>
                        <div class="carousel-item">
                            <div>
                                <img src="assets/images/getuige2.jpg" class="d-block float-left pr-3" width="135" height="135" alt="getuige2">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci cupiditate inventore neque pariatur quis quod veniam voluptate! Aperiam enim iusto nam nesciunt voluptas! Atque deleniti maxime nobis quaerat quasi totam.</p>
                            </div>
                            <p><span class="font-weight-bold">Lauren Demets</span>, Brugge België</p>
                        </div>
                        <div class="carousel-item">
                            <div>
                                <img src="assets/images/getuige3.jpg" class="d-block float-left pr-3" width="135" height="135" alt="getuige3">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci cupiditate inventore neque pariatur quis quod veniam voluptate! Aperiam enim iusto nam nesciunt voluptas! Atque deleniti maxime nobis quaerat quasi totam.</p>
                            </div>
                            <p><span class="font-weight-bold">Katrien Daneels</span>, Ieper België</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
