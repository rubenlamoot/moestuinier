@extends('layouts.admin')

@section('content')
    <main class="col-lg-9 col-xl-10" id="maincontent">
        <h2 class="mt-5">Alle gebruikers</h2>

        <table class="table table-striped table-bordered" id="dataTable">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">E-mail</th>
                <th scope="col">Voornaam</th>
                <th scope="col">Familienaam</th>
                <th scope="col">Telefoon</th>
                <th scope="col">Firma</th>
                <th scope="col">BTW-nr</th>
                <th scope="col">Status</th>
                <th scope="col">Rol</th>
                <th scope="col">Nieuwsbrief</th>
                <th scope="col">Akoord</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
            </tr>
            </thead>
            <tbody>
            @if ($users)
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td><a href="{{route('users.edit', $user->id)}}">{{$user->email}}</a></td>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->company}}</td>
                        <td>{{$user->vat}}</td>
                        <td>{{$user->is_active == 1 ? 'Actief' : 'Niet Actief'}}</td>
                        <td>
                        @foreach($user->roles as $role)
                            {{$role ? $role->name : 'gebruiker zonder rol'}}
                        @endforeach
                        </td>
                        <td>{{$user->newsletter == 1 ? 'Ja' : 'Nee'}}</td>
                        <td>{{$user->privacy == 1 ? 'Ja' : 'Nee'}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <div class="row">
            <div class="col-12">
                {{$users->links()}}
            </div>
        </div>
    </main>

@stop
