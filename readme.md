<h1>Installatie instructies</h1>
<p>git clone ____ moestuinier</p>
<p>ga naar de directory moestuinier (cd wamp64/www/moestuinier)</p>
<p>composer install</p>
<p>maak database aan dbmoestuinier, zorg ervoor dat de engine op InnoDB staat</p>
<p>open editor en pas de .env file aan (db_database=dbmoestuinier, db_username, db_password</p>
<p>voor Stripe: stripe_key=je public key, stripe_secret=je private key</p>
<p>Ook voor Stripe: in vue component payStripe het volgende aanpassen => Vue.use(VueStripeCheckout, 'je public key')</p>
<p>php artisan key:geneate</p>
<p>php artisan migrate</p>
<p>php artisan db:seed</p>

<h2>Gebruikers om in te loggen</h2>
<p>admin : rubenlamoot@test.com , paswoord: 123456</p>
<p>user : test1@gmail.com , paswoord: 123456</p>
<br>
<p>Enjoy</p>
