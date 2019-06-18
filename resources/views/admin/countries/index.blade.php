@extends('layouts.admin')

@section('content')
    <main class="col-lg-9 col-xl-10" id="maincontent">
        <h2 class="mt-5">Landen</h2>

        <div class="row">
            <div class="col-md-6">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Naam</th>
                        <th scope="col">Verzendingskost</th>
                        <th scope="col">Created</th>
                        <th scope="col">Updated</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($countries)
                        @foreach($countries as $country)
                            <tr>
                                <td>{{$country->id}}</td>
                                <td><a href="{{route('countries.edit', $country->id)}}">{{$country->country}}</a></td>
                                <td>{{$country->shipment}}</td>
                                <td>{{$country->created_at}}</td>
                                <td>{{$country->updated_at}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>

            <div class="col-md-6">
                <form method="post" action="{{route('countries.update', $editCountry->id)}}">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="country">Naam:</label>
                        <input type="text" class="form-control" id="country" name="country" value="{{$editCountry->country}}">
                    </div>
                    <div class="form-group">
                        <label for="shipment">Verzendingskost:</label>
                        <input type="text" class="form-control" id="shipment" name="shipment" value="{{$editCountry->shipment}}">
                    </div>
                    <button class="btn btn-success" type="submit">Wijzigen</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <form method="post" action="{{route('countries.store')}}">
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <label for="country">Naam:</label>
                        <input type="text" class="form-control" id="country" name="country">
                    </div>
                    <div class="form-group">
                        <label for="shipment">Verzendingskost:</label>
                        <input type="text" class="form-control" id="shipment" name="shipment">
                    </div>
                    <button class="btn btn-primary" type="submit">Land aanmaken</button>
                </form>
            </div>

            <div class="col-md-6">
                <form method="post" action="{{route('countries.destroy', $editCountry->id)}}">
                    @method('DELETE')
                    @csrf
                    <div class="form-group">
                        <label for="country">Naam:</label>
                        <input type="text" class="form-control" id="country" name="country" value="{{$editCountry->country}}">
                    </div>
                    <button class="btn btn-danger" type="submit">Verwijderen</button>
                </form>
            </div>
        </div>


    </main>
@stop
