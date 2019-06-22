<footer class="row border-bottom m-3">
    <div class="col-12 col-sm-6 col-lg-3 my-3">
        <h3 class="text-uppercase text-center">nuttige links</h3>
        <ul class="list-group list-group-flush text-center bg-light">
            <li class="list-group-item bg-light"><a class="text-secondary" href="404page.html#myBreadcrumb">Over ons</a></li>
            <li class="list-group-item bg-light"><a class="text-secondary" href="404page.html#myBreadcrumb">Bestellen</a></li>
            <li class="list-group-item bg-light"><a class="text-secondary" href="404page.html#myBreadcrumb">Levering</a></li>
            <li class="list-group-item bg-light"><a class="text-secondary" href="404page.html#myBreadcrumb">Retourneren</a></li>
            <li class="list-group-item bg-light"><a class="text-secondary" href="404page.html#myBreadcrumb">Veilig betalen</a></li>
            <li class="list-group-item bg-light"><a class="text-secondary" href="404page.html#myBreadcrumb">Kwaliteit & garantie</a></li>
        </ul>
    </div>

    <div class="col-12 col-sm-6 col-lg-5 col-xl-4 my-sm-3 pl-4 pl-sm-0">
        <h3 class="text-uppercase text-center">contact</h3>
        <p>Schrijf je in voor de nieuwsbrief:</p>
        <form class="d-flex flex-row mb-3 border-bottom mb-sm-4 pb-sm-1" method="post" action="{{route('newsletter')}}">
            @csrf
            <div class="form-group">
                <input type="email" class="form-control" id="newsEmail" name="newsEmail" placeholder="Geef je e-mail in" required>
            </div>
            <button type="submit" class="btn btn-secondary h-75">Verstuur</button>
        </form>
        <div class="d-flex flex-column pt-sm-3 pl-sm-4">
            <address>Kloosterstraat 5<br>
                8647 Noordschote, België</address>

            <i class="fas fa-phone-volume mb-2 pl-1"> : 0486/12.34.56</i>
            <i class="fas fa-fax mb-3"> : 057/12.34.56</i>
            <i class="fas fa-envelope-square mb-3"><a href="mailto:demoestuinier@gmail.com"> : demoestuinier@gmail.com</a></i>
        </div>
    </div>

    <div class="col-12 col-lg-4 col-xl-5 pl-4 px-lg-0 my-lg-3">
        <h3 class="text-uppercase text-center">wat zegt twitter</h3>
        <p>Donec et tortor orci. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae http://t.co/MqacjST476</p>
        <p>1 uur geleden</p>
        <p>Aliquam aliquam fermentum arcu.
            Sed et magna dolor, eu fermentum enim. Aliquam http://t.co/CCkfps248sq consectetur ligula</p>
        <p>3 uur geleden</p>
    </div>

    <div class="row w-100 border-top">
        <div class="col-12 text-center my-3 d-flex justify-content-center">
            <ul id="linksFooter">
                <li><a href="{{route('login')}}" class="text-secondary streepje">Inloggen</a></li>
                <li><a href="{{route('register')}}" class="text-secondary streepje pl-sm-3">Registreren</a></li>
                <li><a href="404page.html#myBreadcrumb" class="text-secondary streepje pl-sm-3">Mijn Account</a></li>
                <li><a href="{{route('step0')}}" class="text-secondary pl-sm-3">Checkout</a></li>
            </ul>
        </div>
    </div>
</footer>
