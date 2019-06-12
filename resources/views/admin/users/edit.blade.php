@extends('layouts.admin')

@section('content')
    <main class="col-lg-9 col-xl-10" id="maincontent">
        <h2 class="mt-5">Een gebruiker wijzigen</h2>

        <form method="post" action="{{route('users.update', $user->id)}}">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="first_name">Voornaam:</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{$user->first_name}}">
                    </div>

                    <div class="form-group">
                        <label for="last_name">Familienaam:</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{$user->last_name}}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                    </div>

                    <div class="form-group">
                        <label for="password">Wachtwoord:</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{$user->password}}">
                    </div>

                    <div class="form-group">
                        <label for="phone">Telefoon:</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}">
                    </div>

                    <div class="form-group">
                        <label for="company">Firmanaam:</label>
                        <input type="text" class="form-control" id="company" name="company" value="{{$user->company}}">
                    </div>

                    <div class="form-group">
                        <label for="vat">BTW-nr:</label>
                        <input type="text" class="form-control" id="vat" name="vat" value="{{$user->vat}}">
                    </div>

                    <div class="form-group">
                        <label for="roles">Rollen:</label>
                        <select multiple id="roles" name="roles[]" class="form-control">
                            @foreach($roles as $role)
                                <option value="{{$role->id}}" @if(in_array($role->id, $roles_array)) selected @endif> {{$role->name}} </option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="street">Straat:</label>
                        <input type="text" class="form-control" id="street" name="street" value="{{$user->address->street}}">
                    </div>
                    <div class="form-group">
                        <label for="house_nr">Huisnr:</label>
                        <input type="text" class="form-control" id="house_nr" name="house_nr" value="{{$user->address->house_nr}}">
                    </div>
                    <div class="form-group">
                        <label for="house_nr">Busnr:</label>
                        <input type="text" class="form-control" id="bus_nr" name="bus_nr" value="{{$user->address->bus_nr}}">
                    </div>
                    <div class="form-group">
                        <label for="city">Stad:</label>
                        <input type="text" class="form-control" id="city" name="city" value="{{$user->address->city->city}}">
                    </div>
                    <div class="form-group">
                        <label for="zip_code">Postcode:</label>
                        <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{$user->address->city->zip_code}}">
                    </div>
                    <div class="form-group">
                        <label for="countries">Land:</label>
                        <select id="countries" name="country_id" class="form-control">
                            @foreach($countries as $country)
                                <option value="{{$country->id}}" @if($user->address->country->id == $country->id) selected @endif> {{$country->country}} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="is_active">Status:</label>
                        <select id="is_active" name="is_active" class="form-control">
                            <option value="0" @if($user->is_active == 0) selected @endif> Niet actief </option>
                            <option value="1" @if($user->is_active == 1) selected @endif> Actief </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="newsletter">Nieuwsbrief:</label>
                        <select id="newsletter" name="newsletter" class="form-control">
                            <option value="0" @if($user->newsletter == 0) selected @endif> Nee </option>
                            <option value="1" @if($user->newsletter == 1) selected @endif> Ja </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">

                </div>
            </div>
            <button class="btn btn-primary" type="submit">Wijzigen</button>

        </form>
    </main>
@stop
