@extends('layouts.admin')

@section('content')
    <main class="col-lg-9 col-xl-10" id="maincontent">
        <h2 class="mt-5">Een product wijzigen</h2>

        <div class="row">
                <div class="col-md-6 ">
                    <form action="{{route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
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
                                    <option value="jan" @if($product->sow->jan == 1) selected @endif>januari</option>
                                    <option value="feb" @if($product->sow->feb == 1) selected @endif>februari</option>
                                    <option value="mar" @if($product->sow->mar == 1) selected @endif>maart</option>
                                    <option value="apr" @if($product->sow->apr == 1) selected @endif>april</option>
                                    <option value="mai" @if($product->sow->mai == 1) selected @endif>mei</option>
                                    <option value="jun" @if($product->sow->jun == 1) selected @endif>juni</option>
                                    <option value="jul" @if($product->sow->jul == 1) selected @endif>juli</option>
                                    <option value="aug" @if($product->sow->aug == 1) selected @endif>augustus</option>
                                    <option value="sep" @if($product->sow->sep == 1) selected @endif>september</option>
                                    <option value="okt" @if($product->sow->okt == 1) selected @endif>oktober</option>
                                    <option value="nov" @if($product->sow->nov == 1) selected @endif>november</option>
                                    <option value="dec" @if($product->sow->dec == 1) selected @endif>december</option>
                                </select>
                            </div>
                            <div class="form-group ml-5">
                                <label for="harvests">Oogsttabel:</label>
                                <select multiple id="harvests" name="harvests[]" class="form-control">
                                    <option value="jan" @if($product->harvest->jan == 1) selected @endif>januari</option>
                                    <option value="feb" @if($product->harvest->feb == 1) selected @endif>februari</option>
                                    <option value="mar" @if($product->harvest->mar == 1) selected @endif>maart</option>
                                    <option value="apr" @if($product->harvest->apr == 1) selected @endif>april</option>
                                    <option value="mai" @if($product->harvest->mai == 1) selected @endif>mei</option>
                                    <option value="jun" @if($product->harvest->jun == 1) selected @endif>juni</option>
                                    <option value="jul" @if($product->harvest->jul == 1) selected @endif>juli</option>
                                    <option value="aug" @if($product->harvest->aug == 1) selected @endif>augustus</option>
                                    <option value="sep" @if($product->harvest->sep == 1) selected @endif>september</option>
                                    <option value="okt" @if($product->harvest->okt == 1) selected @endif>oktober</option>
                                    <option value="nov" @if($product->harvest->nov == 1) selected @endif>november</option>
                                    <option value="dec" @if($product->harvest->dec == 1) selected @endif>december</option>
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

                        <button class="btn btn-primary mb-3" type="submit">Wijzigen</button>
                    </form>
                </div>
                <div class="col-md-6 d-flex flex-column">
                    <div>
                        <img class="img-fluid" src="{{asset('images/products/' . $product->photo)}}" alt="{{$product->name}}">
                    </div>
                    <form method="post" action="{{route('products.destroy', $product->id)}}" class="mt-auto">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger mb-3" type="submit">Verwijderen</button>
                    </form>
                </div>
            </div>
        @include('errors.form-error')
    </main>
@stop
