@extends('layouts.clients')

@section('content')
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-12 pr-0 pl-0">
                <video class="bickery-home-video" autoplay muted>
                    <source src="{{ asset('videos/propercorn.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="col-6 pr-0 pl-0">
                <img src="https://www.bickery.nl/images/our-story-01.jpg" class="mw-100 w-100 mx-auto d-block img-responsive" alt="bickery-home-image">
            </div>
            <div class="col-6 pr-0 pl-0">
                <img src="https://www.bickery.nl/images/brochure.jpg" class="mx-auto d-block img-responsive" alt="bickery-brochure-image">
                <p class="mt-4 text-center">
                    <a href="#">Klik hier om onze brochure te downloaden!</a>
                </p>
            </div>
        </div>
    </div>
@endsection
