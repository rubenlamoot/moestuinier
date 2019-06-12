<?php

namespace App\Http\Controllers\Auth;

use App\Address;
use App\City;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'street' => ['required', 'string', 'max:255'],
            'house_nr' => ['required', 'max:10'],
            'zip_code' => ['required', 'string', 'max:20'],
            'city' => ['required', 'string', 'max:255'],
            'privacy' => ['accepted'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $city = City::firstOrCreate([
            'zip_code' => $data['zip_code'],
            'city' => $data['city'],
            'country_id' => $data['country'],
        ]);

        $address = Address::firstOrCreate([
            'street' => $data['street'],
            'house_nr' => $data['house_nr'],
            'bus_nr' => $data['bus_nr'],
            'city_id' => $city->id,
            'country_id' => $data['country'],
        ]);
        $news = Arr::has($data, 'newsletter');

        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'company' => $data['company'],
            'vat' => $data['vat'],
            'privacy' => $data['privacy'],
            'newsletter' => $news,
            'address_id' => $address->id,
        ]);

        return $user;
    }
}
