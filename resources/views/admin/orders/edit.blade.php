@extends('layouts.admin')

@section('content')
    <main class="col-lg-9 col-xl-10" id="maincontent">
        <h2 class="mt-5">Details van order {{$order->id}}</h2>

        <div class="d-flex flex-row">
            <p>Leveringsadres: <p>
            <p>{{$order->user->address->street}} {{$order->user->address->house_nr}} {{$order->user->address->bus_nr}}<br>
                {{$order->user->address->city->zip_code}} {{$order->user->address->city->city}} <br>
                {{$order->user->address->country->country}}</p>
        </div>

        <div class="row">
            <div class="col-md-6">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Product ID</th>
                        <th scope="col">Product naam</th>
                        <th scope="col">Hoeveelheid</th>
                        <th scope="col">Prijs</th>
                        <th scope="col">Type</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($orderItems)
                        @foreach($orderItems as $item)
                            <tr>
                                <td>{{$item->product_id}}</td>
                                <td>{{$item->product->name}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->type}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <form action="{{route('orders.update', $order->id)}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="handled">Afgehandeld:</label>
                        <select id="handled" name="handled" class="form-control">
                            <option value="0" @if($order->handled == 0) selected @endif> Nee </option>
                            <option value="1" @if($order->handled == 1) selected @endif> Ja </option>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Wijzigen</button>
                </form>
            </div>
        </div>

    </main>
@stop
