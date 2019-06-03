@extends('layouts.admin')

@section('content')
    <main class="col-lg-9 col-xl-10" id="maincontent">
        <h2 class="mt-5">Alle rollen</h2>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Naam</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
            </tr>
            </thead>
            <tbody>
            @if ($roles)
                @foreach($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td><a href="{{route('roles.edit', $role->id)}}">{{$role->name}}</a></td>
                        <td>{{$role->created_at}}</td>
                        <td>{{$role->updated_at}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <a class="btn btn-primary" href="{{route('roles.create')}}">Maak een rol aan</a>
    </main>
@stop
