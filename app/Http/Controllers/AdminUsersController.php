<?php

namespace App\Http\Controllers;

use App\Address;
use App\City;
use App\Country;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        $roles = Role::all();
        $countries = Country::all();
        $user_roles = $user->roles;
        $roles_array = [];
        foreach ($user_roles as $user_role){
            array_push($roles_array, $user_role->id);
        }

        return view('admin.users.edit', compact('user', 'roles', 'roles_array', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $user = User::findOrFail($id);

        // update de rollen
        $roles = $request->roles;
        $user->roles()->sync($roles);

        // update de stad
        $city_input = $request->only('city', 'zip_code', 'country_id');
        $city = City::firstOrCreate($city_input);

        //update het adres
        $address_input = $request->only('street', 'house_nr', 'bus_nr', 'country_id');
        $address_input['city_id'] = $city->id;
        $address = Address::firstOrCreate($address_input);

        // update de gebruiker
        $input = $request->except('roles','street', 'house_nr', 'bus_nr', 'city', 'zip_code', 'country_id');
        $input['address_id'] = $address->id;
        $user->update($input);

        return redirect('admin/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function newsletter(Request $request){
        $email = $request['newsEmail'];

        $user = DB::table('users')->where('email', '=', $email)->first();

        if($user){
            DB::table('users')
                ->where('id', $user->id)
                ->update(array('newsletter' => 1));
        }else{
            DB::table('users')->insert([
                'is_active' => 0,
                'first_name' => '',
                'last_name' => '',
                'email' => $email,
                'password' => '',
                'privacy' => 0,
                'newsletter' => 1,
                'address_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->back();
    }
}
