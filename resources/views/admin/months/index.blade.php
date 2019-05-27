@extends('layouts.admin')

@section('content')
    <main class="col-lg-9 col-xl-10" id="maincontent">
        <h2 class="mt-5">Teksten en foto's op de homepagina</h2>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Maand</th>
                <th scope="col">Tekst</th>
                <th scope="col">Foto</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
            </tr>
            </thead>
            <tbody>
            @if ($months)
                @foreach($months as $month)
                    <tr>
                        <td><a href="{{route('months.edit', $month->id)}}">{{$month->month}}</a></td>
                        <td>{{$month->month_text}}</td>
                        <td>{{$month->month_pic}}</td>
                        <td>{{$month->created_at}}</td>
                        <td>{{$month->updated_at}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </main>

@stop
