
        <header class="col-lg-3 col-xl-2 w-100 bg-light mynav d-flex flex-column align-items-center">
            <nav class="navbar navbar-expand-lg navbar-light d-flex flex-column mb-auto">

                @auth
                    @if (Auth::user()->isAdmin())
                        <a class="navbar-brand text-center" href="{{route('admin')}}">
                    @else
                        <a class="navbar-brand text-center" href="{{route('index')}}">
                    @endif
                @else
                        <a class="navbar-brand text-center" href="{{route('index')}}">
                @endauth
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
                        @php($menus = \App\Level1Category::all())

                            @foreach($menus as $menu)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="" id="{{$menu->name}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{$menu->name}}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="{{$menu->name}}">
                                        @foreach($menu->levels2 as $menu2)
                                            <a class="dropdown-item" href="{{ route('showProducts', $menu2->id) }}">{{$menu2->name}}</a>
                                        @endforeach
                                    </div>
                                </li>
                            @endforeach
                    </ul>
                    {{--<form class="form-inline my-2 ml-lg-4 text-center">--}}
                        {{--<input class="form-control mr-sm-2 w-75" type="search" placeholder="Zoeken" aria-label="Search">--}}
                        {{--<i class="fas fa-search"></i>--}}
                    {{--</form>--}}

                    <search-bar route={{route('searchProducts')}}></search-bar>

                    <ul class="list-unstyled pr-4">
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="{{route('showNew')}}">Nieuw</a>
                        </li>
                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link text-secondary" href="category.php#myBreadcrumb">Populair</a>--}}
                        {{--</li>--}}
                    </ul>
                </div>
            </nav>

            <div class="d-flex flex-column text-center mt-3 mb-lg-3">

                <i class="fas fa-phone-volume mb-2 pl-1"><a href="tel: 0486/12.34.56" class="text-secondary"> : 0486/12.34.56</a></i>
                <a href="mailto:demoestuinier@gmail.com" class="text-secondary">demoestuinier@gmail.com</a>
            </div>
            <div class="social_media text-center my-3 my-lg-0">
                <i class="fab fa-facebook-f social_icon rounded-circle"></i>
                <i class="fab fa-twitter social_icon rounded-circle"></i>
                <i class="fab fa-linkedin-in social_icon rounded-circle"></i>
                <i class="fab fa-pinterest-p social_icon rounded-circle"></i>
                <i class="fab fa-google-plus-g social_icon rounded-circle"></i>
            </div>
            <p class="text-center">All Rights Reserved <br> &copy; De Moestuinier 2019</p>

        </header>
