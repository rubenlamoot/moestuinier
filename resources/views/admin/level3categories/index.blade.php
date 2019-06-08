@extends('layouts.admin')

@section('content')
    <main class="col-lg-9 col-xl-10" id="maincontent">
        <h2 class="mt-5">Level 3 categoriën</h2>

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
                    @if ($level3Cats)
                        @foreach($level3Cats as $level3Cat)
                            <tr>
                                <td>{{$level3Cat->id}}</td>
                                <td><a href="{{route('level3categories.edit', $level3Cat->id)}}">{{$level3Cat->name}}</a></td>
                                <td>{{$level3Cat->level2->name}}</td>
                                <td>{{$level3Cat->created_at}}</td>
                                <td>{{$level3Cat->updated_at}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>

            <div class="col-md-6">
                <form method="post" action="{{route('level3categories.update', $editCat->id)}}">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="name">Naam:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$editCat->name}}">
                    </div>
                    <div class="form-group">
                        <label for="level2Edit">Is subcategorie van:</label>
                        <select id="level2Edit" name="level2_category_id" class="form-control">
                            @foreach($level2Cats as $level2Cat)
                                <option value="{{$level2Cat->id}}" @if($editCat->level2->id == $level2Cat->id) selected @endif> {{$level2Cat->name}} </option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-success" type="submit">Wijzigen</button>
                </form>

                <form method="post" action="{{route('level3categories.store')}}">
                    @method('POST')
                    @csrf
                    <div class="form-group mt-5">
                        <label for="name">Naam:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="level2Create">Is subcategorie van:</label>
                        <select id="level2Create" name="level2_category_id" class="form-control">
                            @foreach($level2Cats as $level2Cat)
                                <option value="{{$level2Cat->id}}" @if($editCat->level2->id == $level2Cat->id) selected @endif> {{$level2Cat->name}} </option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Categorie Maken</button>
                </form>

            </div>
        </div>
    </main>
@stop