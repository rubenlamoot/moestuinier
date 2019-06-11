@extends('layouts.admin')

@section('content')
    <main class="col-lg-9 col-xl-10" id="maincontent">
        <h2 class="mt-5">Alle producten</h2>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Naam</th>
                <th scope="col">Prijs</th>
                <th scope="col">Stock</th>
                <th scope="col">Type</th>
                <th scope="col">Behoord tot subcategorie</th>
                <th scope="col">Behoord tot hoofdcategorie</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
            </tr>
            </thead>
            <tbody>
            @if ($products)
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td><a href="{{route('products.edit', $product->id)}}">{{$product->name}}</a></td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->stock}}</td>
                        <td>
                            @foreach($product->types as $type)
                                {{$type ? $type->name : 'product zonder type'}}
                            @endforeach
                        </td>
                        <td>{{$product->level2->name}}</td>
                        <td>{{$product->level2->level1->name}}</td>
                        <td>{{$product->created_at}}</td>
                        <td>{{$product->updated_at}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <div class="row">
            <div class="col-12">
                {{$products->links()}}
            </div>
        </div>
    </main>
@stop
