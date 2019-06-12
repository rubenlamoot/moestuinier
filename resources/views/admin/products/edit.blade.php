@extends('layouts.admin')

@section('content')
    <main class="col-lg-9 col-xl-10" id="maincontent">
        <h2 class="mt-5">Een product wijzigen</h2>

        <form action="{{route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-md-6 ">
                    <div class="form-group">
                        <label for="name">Naam:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
                    </div>

                    <div class="form-group">
                        <label for="level2_category_id">Behoord tot subcategorie:</label>
                        <select id="level2_category_id" name="level2_category_id" class="form-control">
                            @foreach($level2Cats as $level2Cat)
                                <option value="{{$level2Cat->id}}" @if($level2Cat->id == $product->level2_category_id) selected @endif> {{$level2Cat->name}} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="description">Beschrijving:</label>
                        <textarea rows="5" class="form-control" id="description" name="description">{{$product->description}}</textarea>
                    </div>

                    <div class="d-flex flex-row">
                        <div class="form-group">
                            <label for="sows">Zaaitabel:</label>
                            <select multiple id="sows" name="sows[]" class="form-control">
                                <option value="jan" @if($sow->jan == 1) selected @endif>januari</option>
                                <option value="feb" @if($sow->feb == 1) selected @endif>februari</option>
                                <option value="mar" @if($sow->mar == 1) selected @endif>maart</option>
                                <option value="apr" @if($sow->apr == 1) selected @endif>april</option>
                                <option value="mai" @if($sow->mai == 1) selected @endif>mei</option>
                                <option value="jun" @if($sow->jun == 1) selected @endif>juni</option>
                                <option value="jul" @if($sow->jul == 1) selected @endif>juli</option>
                                <option value="aug" @if($sow->aug == 1) selected @endif>augustus</option>
                                <option value="sep" @if($sow->sep == 1) selected @endif>september</option>
                                <option value="okt" @if($sow->okt == 1) selected @endif>oktober</option>
                                <option value="nov" @if($sow->nov == 1) selected @endif>november</option>
                                <option value="dec" @if($sow->dec == 1) selected @endif>december</option>
                            </select>
                        </div>
                        <div class="form-group ml-5">
                            <label for="harvests">Oogsttabel:</label>
                            <select multiple id="harvests" name="harvests[]" class="form-control">
                                <option value="jan" @if($harvest->jan == 1) selected @endif>januari</option>
                                <option value="feb" @if($harvest->feb == 1) selected @endif>februari</option>
                                <option value="mar" @if($harvest->mar == 1) selected @endif>maart</option>
                                <option value="apr" @if($harvest->apr == 1) selected @endif>april</option>
                                <option value="mai" @if($harvest->mai == 1) selected @endif>mei</option>
                                <option value="jun" @if($harvest->jun == 1) selected @endif>juni</option>
                                <option value="jul" @if($harvest->jul == 1) selected @endif>juli</option>
                                <option value="aug" @if($harvest->aug == 1) selected @endif>augustus</option>
                                <option value="sep" @if($harvest->sep == 1) selected @endif>september</option>
                                <option value="okt" @if($harvest->okt == 1) selected @endif>oktober</option>
                                <option value="nov" @if($harvest->nov == 1) selected @endif>november</option>
                                <option value="dec" @if($harvest->dec == 1) selected @endif>december</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex flex-row">
                        <div class="form-group">
                            <label for="price">Prijs:</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{$product->price}}">
                        </div>
                        <div class="form-group mx-5">
                            <label for="stock">Stock:</label>
                            <input type="text" class="form-control" id="stock" name="stock" value="{{$product->stock}}">
                        </div>
                        <div class="form-group">
                            <label for="photo">Foto:</label>
                            <input type="file" class="form-control-file" id="photo" name="photo">
                        </div>
                    </div>

                    <div class="d-flex flex-row">
                        <div class="form-group">
                            <label for="types">Type product:</label>
                            <select multiple id="types" name="types[]" class="form-control">
                                @foreach($types as $type)
                                    <option value="{{$type->id}}" @if(in_array($type->id, $types_array)) selected @endif> {{$type->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-check ml-5 mt-5 pl-5">
                            <input class="form-check-input" type="checkbox" id="new" name="new" @if($product->new == 1) checked @endif>
                            <label class="form-check-label" for="new">
                                Nieuw?
                            </label>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Wijzigen</button>

                </div>
                <div class="col-md-6">
                    <div>
                        <img class="img-fluid" src="{{asset('images/products/' . $product->photo)}}" alt="{{$product->name}}">
                    </div>
                </div>
            </div>
        </form>
    </main>
@stop
