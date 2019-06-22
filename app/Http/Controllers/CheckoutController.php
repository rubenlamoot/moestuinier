<?php

namespace App\Http\Controllers;

use App\Address;
use App\City;
use App\Country;
use App\Delivery;
use App\Http\Requests\Step1Request;
use App\Http\Requests\Step2Request;
use App\Order;
use App\OrderItem;
use App\Product;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;


class CheckoutController extends Controller
{
    //

    public function step0(){
        $current = 1;
        $delivery = Delivery::first();
        return view('checkout', compact('current', 'delivery'));
    }

    public function step1(Step1Request $request){

        $city = City::firstOrCreate([
            'zip_code' => $request['zip_code'],
            'city' => $request['city'],
            'country_id' => $request['country'],
        ]);

        $address = Address::firstOrCreate([
            'street' => $request['street'],
            'house_nr' => $request['house_nr'],
            'bus_nr' => $request['bus_nr'],
            'city_id' => $city->id,
            'country_id' => $request['country'],
        ]);

        if(Auth::check()){
            $user = User::findOrFail(Auth::user()->id);

            $input = $request->except('roles','street', 'house_nr', 'bus_nr', 'city', 'zip_code', 'country_id');
            $input['address_id'] = $address->id;
            $user->update($input);
        }else{
            $user = User::create([
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'first_name' => $request['first_name'],
                'last_name' => $request['last_name'],
                'phone' => $request['phone'],
                'company' => $request['company'],
                'vat' => $request['vat'],
                'privacy' => $request['privacy'],
                'address_id' => $address->id,
            ]);
            $user->roles()->attach(3);
            Auth::loginUsingId($user->id);
        }

//        $myCountry = Country::findOrFail($request['country']);
//        $ship_cost = $myCountry->shipment;

        $delivery_equals_address = $request['delivery_billingCheck'];
        if($delivery_equals_address == true){
            $current = 3;
            $delivery = Delivery::firstOrCreate([
                'street' => $request['street'],
                'house_nr' => $request['house_nr'],
                'bus_nr' => $request['bus_nr'],
                'city_id' => $city->id,
            ]);

            $user->deliveries()->syncWithoutDetaching($delivery->id);
        }else{
            $current = 2;
        }

        return view('checkout', compact('current', 'delivery'));
    }

    public function step2(Step2Request $request){

        $city = City::firstOrCreate([
            'zip_code' => $request['zip_code'],
            'city' => $request['city'],
            'country_id' => $request['country'],
        ]);

        $delivery = Delivery::firstOrCreate([
            'street' => $request['street'],
            'house_nr' => $request['house_nr'],
            'bus_nr' => $request['bus_nr'],
            'city_id' => $city->id,
        ]);
        $user = Auth::user();
        $user->deliveries()->syncWithoutDetaching($delivery->id);

        $current = 3;
//        $myCountry = Country::findOrFail($request['country']);
//        $ship_cost = $myCountry->shipment;

        return view('checkout', compact('current', 'delivery'));
    }

    public function step3($id){
        $current = 4;
//        $user = Auth::user();
//        $ship_cost = $user->address->city->country->shipment;
        $delivery = Delivery::findOrFail($id);
        return view('checkout', compact('current', 'delivery'));
    }

    public function store($id){

//        $user = Auth::user();
//        $ship_cost = $user->address->city->country->shipment;
        $delivery = Delivery::findOrFail($id);

        Stripe::setApiKey(config('services.stripe.secret'));

        $customer = Customer::create([
            'email' => request('stripeItems.email'),
            'source' => request('stripeItems.id'),
        ]);

        $pay = Charge::create([
            'customer' => $customer->id,
            'amount' => (Cart::total() + $delivery->city->country->shipment) * 100,
            'currency' => 'eur',
        ]);

        if($pay->paid == true){
            $order = Order::create([
                'user_id' => Auth::user()->id,
                'delivery_id' => $delivery->id,
                'items' => Cart::count(),
                'totalprice' => Cart::total(),
            ]);
            foreach (Cart::content() as $cart){
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cart->id,
                    'quantity' => $cart->qty,
                    'price' => $cart->price,
                    'type' => $cart->options->type
                ]);
                $product = Product::findOrFail($cart->id);
                $product->stock -= $cart->qty;
                $product->save();
            }
            Cart::destroy();

            return response()->JSON(['overdracht gelukt']);
        }else{
            return response()->JSON(['overdracht mislukt']);
        }

    }
}
