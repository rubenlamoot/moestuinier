@extends('layouts.admin')

@section('content')
    <main class="col-lg-9 col-xl-10" id="maincontent">
        <h2 class="mt-5">Alle orders</h2>

        <table class="table table-striped table-bordered" id="dataTable">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Gebruiker</th>
                <th scope="col">Leveringsadres</th>
                <th scope="col">Aantal</th>
                <th scope="col">Prijs</th>
                <th scope="col">Afgehandeld</th>
                <th scope="col">Datum besteld</th>
                <th scope="col">Datum afgehandeld</th>
            </tr>
            </thead>
            <tbody>
            @if ($orders)
                @foreach($orders as $order)
                    <tr>
                        <td><a href="{{route('orders.edit', $order->id)}}">{{$order->id}}</a></td>
                        <td>{{$order->user->first_name}} {{$order->user->last_name}}</td>
                        <td>{{$order->delivery->street}} {{$order->delivery->house_nr}} {{$order->delivery->bus_nr}}<br>
                            {{$order->delivery->city->zip_code}} {{$order->delivery->city->city}} <br>
                            {{$order->delivery->city->country->country}}</td>
                        <td>{{$order->items}}</td>
                        <td>{{$order->totalprice}}</td>
                        <td>{{$order->handled == 1 ? 'Ja' : 'Nee'}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->handled == 1 ? $order->updated_at : ''}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        {{--<div class="row">--}}
            {{--<div class="col-12">--}}
                {{--{{$orders->links()}}--}}
            {{--</div>--}}
        {{--</div>--}}
    </main>
@stop
