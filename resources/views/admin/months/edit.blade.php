@extends('layouts.admin')

@section('content')
    <main class="col-lg-9 col-xl-10" id="maincontent">
        <h2 class="mt-5">Teksten en foto's op de homepagina wijzigen</h2>

        <form action="{{route('months.update', $month->id)}}">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="month">Maand:</label>
                        <input type="text" class="form-control" id="month" name="month" value={{$month->month}}>
                    </div>

                    <div class="form-group">
                        <label for="month_text">Tekst:</label>
                        <textarea class="form-control" id="month_text" name="month_text" rows="12">{{$month->month_text}}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <img class="img-fluid" src="{{asset($month->month_pic)}}" alt="">
                    </div>
                    <div class="form-group mt-3">
                        <input type="file" class="form-control-file" id="month_pic" name="month_pic">
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Wijzigen</button>

        </form>
    </main>
@stop
