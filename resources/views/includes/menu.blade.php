<body class="bg-light">
<div class="container-fluid" id="app">
    <div class="row">
        <header class="col-lg-3 col-xl-2 w-100 bg-light mynav d-flex flex-column align-items-center">
            <nav class="navbar navbar-expand-lg navbar-light d-flex flex-column mb-auto">
                <a class="navbar-brand text-center" href="index.php">
                    <img src="{{asset('images/home/logo_small.png')}}" width="100" height="100" class="" alt="logo">
                    <h1 class="logo">De Moestuinier</h1>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse flex-column" id="navbarSupportedContent">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="category.php" id="dropdownZaadjes" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Zaadjes
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownZaadjes">
                                <a class="dropdown-item" href="category.php#myBreadcrumb">Groenten</a>
                                <a class="dropdown-item" href="category.php#myBreadcrumb">Fruit</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="category.php" id="dropdownPlantgoed" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Plantgoed
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownPlantgoed">
                                <a class="dropdown-item" href="category.php#myBreadcrumb">Aardappelen</a>
                                <a class="dropdown-item" href="category.php#myBreadcrumb">Uien</a>
                                <a class="dropdown-item" href="category.php#myBreadcrumb">Look</a>
                            </div>
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
            <div class="social_media text-center my-3 my-lg-0">
                <i class="fab fa-facebook-f social_icon rounded-circle"></i>
                <i class="fab fa-twitter social_icon rounded-circle"></i>
                <i class="fab fa-linkedin-in social_icon rounded-circle"></i>
                <i class="fab fa-pinterest-p social_icon rounded-circle"></i>
                <i class="fab fa-google-plus-g social_icon rounded-circle"></i>
            </div>
            <p class="text-center">All Rights Reserved <br> &copy; De Moestuinier 2019</p>

        </header>
