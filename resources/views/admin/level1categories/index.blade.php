@extends('layouts.admin')

@section('content')
    <main class="col-lg-9 col-xl-10" id="maincontent">
        <h2 class="mt-5">Hoofdcategoriën</h2>

        <div class="row">
            <div class="col-md-6">
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
                    @if ($level1Cats)
                        @foreach($level1Cats as $level1Cat)
                            <tr>
                                <td>{{$level1Cat->id}}</td>
                                <td><a href="{{route('level1categories.edit', $level1Cat->id)}}">{{$level1Cat->name}}</a></td>
                                <td>{{$level1Cat->created_at}}</td>
                                <td>{{$level1Cat->updated_at}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>

            <div class="col-md-6">
                <form method="post" action="{{route('level1categories.update', $editCat->id)}}">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="name">Naam:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$editCat->name}}">
                    </div>
                    <button class="btn btn-primary" type="submit">Wijzigen</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <form method="post" action="{{route('level1categories.store')}}">
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <label for="name">Naam:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <button class="btn btn-primary" type="submit">Hoofdcategorie Maken</button>
                </form>
            </div>

            <div class="col-md-6">
                <form method="post" action="{{route('level1categories.destroy', $editCat->id)}}">
                    @method('DELETE')
                    @csrf
                    <div class="form-group">
                        <label for="name">Naam:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$editCat->name}}">
                    </div>
                    <button class="btn btn-danger" type="submit">Verwijderen</button>
                </form>
            </div>
        </div>


    </main>
@stop
