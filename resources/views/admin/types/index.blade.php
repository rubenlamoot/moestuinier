@extends('layouts.admin')

@section('content')
    <main class="col-lg-9 col-xl-10" id="maincontent">
        <h2 class="mt-5">Types van producten</h2>

        <div class="row">
            <div class="col-md-6">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Naam</th>
                        <th scope="col">Korting</th>
                        <th scope="col">Kortings-<br>percentage</th>
                        <th scope="col">Prijs-<br>verhouding</th>
                        <th scope="col">Created</th>
                        <th scope="col">Updated</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($types)
                        @foreach($types as $type)
                            <tr>
                                <td>{{$type->id}}</td>
                                <td><a href="{{route('types.edit', $type->id)}}">{{$type->name}}</a></td>
                                <td>{{$type->discount == 1 ? 'Ja' : 'Nee'}}</td>
                                <td>{{$type->percentage}}</td>
                                <td>{{$type->times_price}}</td>
                                <td>{{$type->created_at}}</td>
                                <td>{{$type->updated_at}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>

            <div class="col-md-6">
                <form method="post" action="{{route('types.update', $editType->id)}}">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="name">Naam:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$editType->name}}">
                    </div>
                    <div class="form-group">
                        <label for="discount">Korting:</label>
                        <select id="discount" name="discount" class="form-control">
                            <option value="0" @if($editType->discount == 0) selected @endif> Nee </option>
                            <option value="1" @if($editType->discount == 1) selected @endif> Ja </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="percentage">Kortingspercentage:</label>
                        <input type="text" class="form-control" id="percentage" name="percentage" value="{{$editType->percentage}}">
                    </div>
                    <div class="form-group">
                        <label for="times_price">Prijsverhouding:</label>
                        <input type="text" class="form-control" id="times_price" name="times_price" value="{{$editType->times_price}}">
                    </div>
                    <button class="btn btn-success" type="submit">Wijzigen</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <form method="post" action="{{route('types.store')}}">
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <label for="name">Naam:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="discount">Korting:</label>
                        <select id="discount" name="discount" class="form-control">
                            <option value="0"> Nee </option>
                            <option value="1"> Ja </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Kortingspercentage:</label>
                        <input type="text" class="form-control" id="percentage" name="percentage">
                    </div>
                    <div class="form-group">
                        <label for="times_price">Prijsverhouding:</label>
                        <input type="text" class="form-control" id="times_price" name="times_price">
                    </div>
                    <button class="btn btn-primary" type="submit">Type toevoegen</button>
                </form>
            </div>


            <div class="col-md-6">
                <form method="post" action="{{route('types.destroy', $editType->id)}}">
                    @method('DELETE')
                    @csrf
                    <div class="form-group">
                        <label for="name">Naam:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$editType->name}}">
                    </div>
                    <button class="btn btn-danger" type="submit">Verwijderen</button>
                </form>
            </div>
        </div>
        @include('errors.form-error')
    </main>
@stop
