@extends('layouts.master')

@section('content')
    <main class="col-lg-9 col-xl-10" id="maincontent">
        <div id="carouselHome" class="carousel slide" data-ride="carousel" data-interval="false">
            {{--<div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="homepic d-block w-100 img-fluid" src="" alt="">
                    <div class="myCaption d-none d-md-block">
                        <div class="captionText">
                            <h2 class="text-center txtMaand"></h2>
                            <p class="text-center m-0 tekstMaand"></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="homepic d-block w-100 img-fluid" src="" alt="">
                    <div class="myCaption d-none d-md-block">
                        <div class="captionText">
                            <h2 class="text-center txtMaand"></h2>
                            <p class="text-center m-0 tekstMaand"></p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="mijncarousel d-none d-md-block" href="#carouselHome" role="button" data-slide="prev">
                <span class="fas fa-chevron-circle-left fa-3x text-white" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="mijncarousel d-none d-md-block" href="#carouselHome" role="button" data-slide="next">
                <span class="fas fa-chevron-circle-right fa-3x text-white" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>--}}
            <slider-home route={{route('months.index')}}></slider-home>

            <div class="mobile_slider d-md-none bg-light">
                <div class="d-flex">
                    <a class="mijncarousel flex-fill text-right" href="#carouselHome" role="button" data-slide="prev">
                        <span class="fas fa-chevron-circle-left fa-3x text-secondary" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <h2 class="text-center flex-fill txtMaand"></h2>
                    <a class="mijncarousel flex-fill" href="#carouselHome" role="button" data-slide="next">
                        <span class="fas fa-chevron-circle-right fa-3x text-secondary" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <p class="text-center my-2 tekstMaand"></p>
            </div>
        </div>
    </main>
    </div>

    </div>
@stop
