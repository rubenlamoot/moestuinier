<?php

namespace App\Http\Controllers;

use App\Address;
use App\City;
use App\Country;
use App\Http\Requests\Step1Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class CheckoutController extends Controller
{
    //
    public function step0(){
        $current = 1;
        $ship_cost = "0.00";
        return view('checkout', compact('current', 'ship_cost'));
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
        }

        $myCountry = Country::findOrFail($request['country']);
        $ship_cost = $myCountry->shipment;

        $delivery = $request['delivery_billingCheck'];
        if($delivery == true){
            $current = 3;
        }else{
            $current = 2;
        }

        return view('checkout', compact('current', 'ship_cost'));
    }
}
