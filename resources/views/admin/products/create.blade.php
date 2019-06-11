@extends('layouts.admin')

@section('content')
    <main class="col-lg-9 col-xl-10" id="maincontent">
        <h2 class="mt-5">Een product toevoegen</h2>

        <form action="{{route('products.store')}}" method="POST">
            @method('POST')
            @csrf
        </form>
    </main>
@stop
