
<header class="col-lg-3 col-xl-2 w-100 bg-light mynav d-flex flex-column align-items-center">
    <nav class="navbar navbar-expand-lg navbar-light d-flex flex-column mb-auto">
        <a class="navbar-brand text-center" href="../">
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
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownKruiden" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Kruiden
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownKruiden">
                        <a class="dropdown-item" href="category.php#myBreadcrumb">1-jarigen</a>
                        <a class="dropdown-item" href="category.php#myBreadcrumb">Doorlevend</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="category.php" id="dropdownAccessoires" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Accessoires
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownAccessoires">
                        <a class="dropdown-item" href="category.php#myBreadcrumb">Gereedschap</a>
                        <a class="dropdown-item" href="category.php#myBreadcrumb">Zaaitafels</a>
                        <a class="dropdown-item" href="category.php#myBreadcrumb">Potgrond en mest</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 ml-lg-4 text-center">
                <input class="form-control mr-sm-2 w-75" type="search" placeholder="Zoeken" aria-label="Search">
                <i class="fas fa-search"></i>
            </form>
            <ul class="list-unstyled pr-4">
                <li class="nav-item">
                    <a class="nav-link text-secondary" href="category.php#myBreadcrumb">Nieuw</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-secondary" href="category.php#myBreadcrumb">Populair</a>
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
