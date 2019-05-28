@extends('layouts.admin')

@section('content')
    <main class="col-lg-9 col-xl-10" id="maincontent">
        <h2 class="mt-5">Een gebruiker wijzigen</h2>

        <form method="post" action="{{route('users.update', $user->id)}}">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="first_name">Voornaam:</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value={{$user->first_name}}>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Familienaam:</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value={{$user->last_name}}>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value={{$user->email}}>
                    </div>

                    <div class="form-group">
                        <label for="password">Wachtwoord:</label>
                        <input type="password" class="form-control" id="password" name="password" value={{$user->password}}>
                    </div>

                    <div class="form-group">
                        <label for="phone">Telefoon:</label>
                        <input type="text" class="form-control" id="phone" name="phone" value={{$user->phone}}>
                    </div>

                    <div class="form-group">
                        <label for="company">Firmanaam:</label>
                        <input type="text" class="form-control" id="company" name="company" value={{$user->company}}>
                    </div>

                    <div class="form-group">
                        <label for="vat">BTW-nr:</label>
                        <input type="text" class="form-control" id="vat" name="vat" value={{$user->vat}}>
                    </div>

                    <div class="form-group">
                        <label for="is_active">Status:</label>
                        <select id="is_active" class="form-control">
                            <option value="0" @if($user->is_active == 0) selected @endif> Niet actief </option>
                            <option value="1" @if($user->is_active == 1) selected @endif> Actief </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="roles">Rollen:</label>
                        <select id="roles" class="form-control">
                            @foreach($roles as $role)
                                @foreach($user->roles as $user_role)
                                    <option value="{{$role->id}}" @if($user_role->id == $role->id) selected @endif> {{$role->name}} </option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>


                </div>
                <div class="col-md-6">

                </div>
            </div>
            <button class="btn btn-primary" type="submit">Wijzigen</button>

        </form>
    </main>
@stop
