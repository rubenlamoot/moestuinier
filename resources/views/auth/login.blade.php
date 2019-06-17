@extends('layouts.master')

@section('content')


{{--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail:') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Wachtwoord:') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Inloggen') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Wachtwoord vergeten?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>--}}
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
                <li class="breadcrumb-item"><a href="#">Account</a></li>
                <li class="breadcrumb-item active" aria-current="page">Login</li>
            </ol>
        </nav>

        <h2 class="text-secondary mb-5">Account Login</h2>

        <section class="row mb-3">
            <div class="col-12 col-md-6 d-flex flex-column mb-5 mb-md-0">
                <h3 class="text-uppercase text-dark text-right py-3 pr-3 bg-secondary login">nieuwe klant</h3>
                <p class="mt-3 pb-3 mb-auto">Maak een account aan bij onze winkel en ga vlugger door het checkout proces. Bovendien kan je meerdere leveringsadressen opslaan en je orders bekijken en volgen via je account. </p>
                <div class="border-top border-secondary pt-3">
                    <a class="btn btn-dark text-uppercase" href="{{ route('register') }}">registreer</a>
                </div>
            </div>
            <div class="col-12 col-md-6 d-flex flex-column">
                <h3 class="text-uppercase text-dark text-right py-3 pr-3 bg-secondary login">bestaande klant</h3>
                <p class="mt-3">Als je reeds een account hebt bij ons, gelieve dan in te loggen.</p>
                <form class="mb-auto" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Vul uw email in">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Wachtwoord">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label pb-1" for="remember">Paswoord onthouden</label>
                    </div>
                    <div class="d-flex border-top border-secondary pt-3">
                        <button class="btn btn-dark text-uppercase" type="submit">inloggen</button>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link text-danger flex-fill text-right pr-3" href="{{ route('password.request') }}">
                                {{ __('Wachtwoord vergeten?') }}
                            </a>
                        @endif

                    </div>
                </form>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-8">
                    @if (session('alert'))
                        <div class="alert alert-danger">
                            {{ session('alert') }}
                        </div>
                    @endif
                </div>
            </div>
        </section>

    </main>
    @include('includes.footer')
</div>


@endsection

