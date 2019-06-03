@extends('layouts.admin')

@section('content')
    <main class="col-lg-9 col-xl-10" id="maincontent">
        <h2 class="mt-5">Een rol maken</h2>

        <form method="post" action="{{route('roles.store')}}">
            @method('POST')
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Naam:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Maken</button>
        </form>
    </main>
@stop
