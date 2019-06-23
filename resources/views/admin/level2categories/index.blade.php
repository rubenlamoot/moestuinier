@extends('layouts.admin')

@section('content')
    <main class="col-lg-9 col-xl-10" id="maincontent">
        <h2 class="mt-5">Level 2 categoriën</h2>

        <div class="row">
            <div class="col-md-6">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Naam</th>
                        <th scope="col">Is subcategorie van</th>
                        <th scope="col">Created</th>
                        <th scope="col">Updated</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($level2Cats)
                        @foreach($level2Cats as $level2Cat)
                            <tr>
                                <td>{{$level2Cat->id}}</td>
                                <td><a href="{{route('level2categories.edit', $level2Cat->id)}}">{{$level2Cat->name}}</a></td>
                                <td>{{$level2Cat->level1->name}}</td>
                                <td>{{$level2Cat->created_at}}</td>
                                <td>{{$level2Cat->updated_at}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>

            <div class="col-md-6">
                <form method="post" action="{{route('level2categories.update', $editCat->id)}}">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="name">Naam:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$editCat->name}}">
                    </div>
                    <div class="form-group">
                        <label for="level1Edit">Is subcategorie van:</label>
                        <select id="level1Edit" name="level1_category_id" class="form-control">
                            @foreach($level1Cats as $level1Cat)
                                <option value="{{$level1Cat->id}}" @if($editCat->level1->id == $level1Cat->id) selected @endif> {{$level1Cat->name}} </option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-success" type="submit">Wijzigen</button>
                </form>

                <form method="post" action="{{route('level2categories.store')}}">
                    @method('POST')
                    @csrf
                    <div class="form-group mt-5">
                        <label for="name">Naam:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="level1Create">Is subcategorie van:</label>
                        <select id="level1Create" name="level1_category_id" class="form-control">
                            @foreach($level1Cats as $level1Cat)
                                <option value="{{$level1Cat->id}}" @if($editCat->level1->id == $level1Cat->id) selected @endif> {{$level1Cat->name}} </option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Categorie Maken</button>
                </form>

                <form method="post" action="{{route('level2categories.destroy', $editCat->id)}}">
                    @method('DELETE')
                    @csrf
                    <div class="form-group mt-5">
                        <label for="name">Naam:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$editCat->name}}">
                    </div>
                    <button class="btn btn-danger" type="submit">Verwijderen</button>
                </form>
            </div>
        </div>
    </main>
@stop
