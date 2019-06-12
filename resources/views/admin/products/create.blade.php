@extends('layouts.admin')

@section('content')
    <main class="col-lg-9 col-xl-10" id="maincontent">
        <h2 class="mt-5">Een product toevoegen</h2>

        <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="row">
                <div class="col-md-6 ">
                    <div class="form-group">
                        <label for="name">Naam:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="form-group">
                        <label for="level2_category_id">Behoord tot subcategorie:</label>
                        <select id="level2_category_id" name="level2_category_id" class="form-control">
                            <option value="0" selected> Kies een optie </option>
                            @foreach($level2Cats as $level2Cat)
                                <option value="{{$level2Cat->id}}"> {{$level2Cat->name}} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="description">Beschrijving:</label>
                        <textarea rows="5" class="form-control" id="description" name="description"></textarea>
                    </div>

                    <div class="d-flex flex-row">
                        <div class="form-group">
                            <label for="sows">Zaaitabel:</label>
                            <select multiple id="sows" name="sows[]" class="form-control">
                                <option value="0">Kies de maanden:</option>
                                <option value="jan">januari</option>
                                <option value="feb">februari</option>
                                <option value="mar">maart</option>
                                <option value="apr"f>april</option>
                                <option value="mai">mei</option>
                                <option value="jun">juni</option>
                                <option value="jul">juli</option>
                                <option value="aug"f>augustus</option>
                                <option value="sep">september</option>
                                <option value="okt">oktober</option>
                                <option value="nov">november</option>
                                <option value="dec">december</option>
                            </select>
                        </div>
                        <div class="form-group ml-5">
                            <label for="harvests">Oogsttabel:</label>
                            <select multiple id="harvests" name="harvests[]" class="form-control">
                                <option value="0">Kies de maanden:</option>
                                <option value="jan">januari</option>
                                <option value="feb">februari</option>
                                <option value="mar">maart</option>
                                <option value="apr"f>april</option>
                                <option value="mai">mei</option>
                                <option value="jun">juni</option>
                                <option value="jul">juli</option>
                                <option value="aug"f>augustus</option>
                                <option value="sep">september</option>
                                <option value="okt">oktober</option>
                                <option value="nov">november</option>
                                <option value="dec">december</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex flex-row">
                        <div class="form-group">
                            <label for="price">Prijs:</label>
                            <input type="text" class="form-control" id="price" name="price">
                        </div>
                        <div class="form-group mx-5">
                            <label for="stock">Stock:</label>
                            <input type="text" class="form-control" id="stock" name="stock">
                        </div>
                        <div class="form-group">
                            <label for="photo">Kies een foto:</label>
                            <input type="file" class="form-control-file" id="photo" name="photo">
                        </div>
                    </div>

                    <div class="d-flex flex-row">
                        <div class="form-group">
                            <label for="types">Type product:</label>
                            <select multiple id="types" name="types[]" class="form-control">
                                <option value="0" selected> Kies: </option>
                                @foreach($types as $type)
                                    <option value="{{$type->id}}"> {{$type->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-check ml-5 mt-5 pl-5">
                            <input class="form-check-input" type="checkbox" id="new" name="new" value="1">
                            <label class="form-check-label" for="new">
                                Nieuw?
                            </label>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Toevoegen</button>

                </div>
            </div>
        </form>
    </main>
@stop
