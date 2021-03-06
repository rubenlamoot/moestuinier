
<header class="col-lg-3 col-xl-2 w-100 bg-light mynav d-flex flex-column align-items-center">
    <nav class="navbar navbar-expand-lg navbar-light d-flex flex-column mb-auto">
        <a class="navbar-brand text-center" href="{{route('index')}}">
            <img src="{{asset('images/home/logo_small.png')}}" width="100" height="100" class="" alt="logo">
            <h1 class="logo">De Moestuinier</h1>
        </a>
        @auth
            <div class="d-flex flex-row">
                <p class="pt-2">Welkom:</p>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->first_name}}  {{Auth::user()->last_name}} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>

        @else
            <a href="{{ route('login') }}" class="text-secondary mb-3">Login</a>
        @endauth
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse flex-column" id="navbarSupportedContent">
            <ul class="navbar-nav flex-column">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{route('months.index')}}" id="" role="button">
                        <i class="fas fa-home"></i>  Teksten en foto's
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{route('users.index')}}" id="" role="button">
                        <i class="fas fa-user"></i>  Gebruikers
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{route('roles.index')}}" id="" role="button">
                        <i class="fas fa-toilet-paper"></i>  Rollen
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{route('countries.index')}}" id="" role="button">
                        <i class="fas fa-globe-americas"></i>  Landen
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="category" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-clipboard-list"></i>  Categoriën
                    </a>
                    <div class="dropdown-menu" aria-labelledby="category">
                        <a class="dropdown-item" href="{{route('level1categories.index')}}">Level1</a>
                        <a class="dropdown-item" href="{{route('level2categories.index')}}">Level2</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="products" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-seedling"></i>  Producten
                    </a>
                    <div class="dropdown-menu" aria-labelledby="products">
                        <a class="dropdown-item" href="{{route('products.index')}}">Alle producten</a>
                        <a class="dropdown-item" href="{{route('products.create')}}">Product maken</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{route('types.index')}}" id="" role="button">
                        <i class="fas fa-keyboard"></i>  Types
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="products" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-folder-open"></i> Orders
                    </a>
                    <div class="dropdown-menu" aria-labelledby="products">
                        <a class="dropdown-item" href="{{route('orders.index')}}">Alle orders</a>
                        <a class="dropdown-item" href="{{route('notHandled')}}">Onafgewerkte orders</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{route('lowStock')}}" id="" role="button">
                        <i class="fas fa-cubes"></i>  Lage Stock
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="d-flex flex-column text-center mt-3 mb-lg-3">

        <i class="fas fa-phone-volume mb-2 pl-1"><a href="tel: 0486/12.34.56" class="text-secondary"> : 0486/12.34.56</a></i>
        <a href="mailto:demoestuinier@gmail.com" class="text-secondary">demoestuinier@gmail.com</a>
    </div>

    <p class="text-center">All Rights Reserved <br> &copy; De Moestuinier 2019</p>

</header>
