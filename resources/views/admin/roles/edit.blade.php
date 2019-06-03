@extends('layouts.admin')

@section('content')
    <main class="col-lg-9 col-xl-10" id="maincontent">
        <h2 class="mt-5">Een rol wijzigen</h2>

        <form method="post" action="{{route('roles.update', $role->id)}}">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Naam:</label>
                        <input type="text" class="form-control" id="name" name="name" value={{$role->name}}>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Wijzigen</button>
        </form>
        <form method="post" action="{{route('roles.destroy', $role->id)}}">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger mt-5" type="submit">Verwijderen</button>
        </form>
    </main>
@stop


