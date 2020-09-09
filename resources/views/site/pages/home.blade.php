@extends('layouts.clients')

@section('content')
<div class="container-fluid">
	<div class="row align-items-center">
        <div class="col-12 pl-0 pr-0">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner vh-100">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="https://images4.alphacoders.com/289/thumb-1920-289496.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="https://images4.alphacoders.com/289/thumb-1920-289496.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="https://images4.alphacoders.com/289/thumb-1920-289496.jpg" alt="First slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
		<div class="col-6 pr-0 pl-0">
			<img src="https://www.bickery.nl/images/our-story-01.jpg" class="mw-100 w-100 mx-auto d-block img-responsive" alt="bickery-home-image">
		</div>
		<div class="col-6 pr-0 pl-0">
			<img src="https://www.bickery.nl/images/brochure.jpg" class="mx-auto d-block img-responsive" alt="bickery-brochure-image">
			<p class="mt-4 text-center">
				<a href="#">{{ __('site.home.brochure') }}</a>
			</p>
		</div>
    <div class="col-12 pl-0 pr-0">
        <div class="home-parallax">
            <div class="home-parallax-text">
                <div class="text-center">
                    <h3 class="home-parallax-subtitle">Bekijk hier ons</h3>
                    <h1 class="home-parallax-title mt-3">Sucessverhaal</h1>
										<a href="#" class="play-video-button mt-2"><i class="fa fa-play fa-2x"></i></a>
                </div>

            </div>
        </div>
    </div>
    <div class="col-12 pl-0 pr-0">
			<p class="mt-4">
				<h3 class="home-news-title text-center">{{ __('site.home.news') }}</h3>
			</p>
    </div>
	</div>
</div>
@endsection
