<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" async></script>
    <script src="https://kit.fontawesome.com/fe3ccb2e89.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/client-style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div id="bickery-menu" class="sidenav text-center">
          <a href="javascript:void(0)" class="closebtn" id="closeMenuButton">&times;</a>
          <img src="{{ asset('images/bickery.png') }}" class="mb-5 bickery-logo-menu mx-auto d-block">
          <language-switcher
            locale="{{ app()->getLocale() }}"
            link-en="{{ route(Route::currentRouteName(), 'en') }}"
            link-nl="{{ route(Route::currentRouteName(), 'nl') }}"
          ></language-switcher>
          <a href="#">Home</a>
          <a href="#">Over Ons</a>
          <a href="#">Premium Food</a>
          <a href="#">Premium Drinks</a>
          <a href="#">Geschenkpakketten</a>
          <a href="#">Brands Brochure</a>
          <a href="#">Kerst Brochure</a>
          <a href="#">Kerst Webshop</a>
          <a href="#">Werken Bij</a>
          <a href="#">Nieuws</a>
          <a href="#">Contact</a>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
          <a class="navbar-brand" href="{{ url('/') }}">
              <img src="{{ asset('images/bickery.png') }}" class="bickery-logo">
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Over ons</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Premium Brands
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Premium Food</a>
                  <a class="dropdown-item" href="#">Premium Drinks</a>
                  <a class="dropdown-item" href="#">Brands Webshop</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Geschenkpakketten
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Thema Collecties</a>
                  <a class="dropdown-item" href="#">Premium Brands</a>
                  <a class="dropdown-item" href="#">Kerst Webshop</a>
                  <a class="dropdown-item" href="#">Kerst Brochure</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Werken bij</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Nieuws</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Contact
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Contact formulier</a>
                  <a class="dropdown-item" href="#">035 656 0244</a>
                  <a class="dropdown-item" href="#">info@bickery.nl</a>
                </div>
              </li>
            </ul>
          </div>
          <language-switcher
            class="nav-link"
            locale="{{ app()->getLocale() }}"
            link-en="{{ route(Route::currentRouteName(), 'en') }}"
            link-nl="{{ route(Route::currentRouteName(), 'nl') }}"
          ></language-switcher>
          <div class="input-group nav-item search-input">
            <input type="text" class="form-control" placeholder="Zoek hier...">
            <div class="input-group-append">
              <button class="btn btn-secondary" type="button">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
        </nav>

        {{--
        <nav class="navbar navbar-expand-md navbar-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/bickery.png') }}" class="bickery-logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <span id="menuButton">MENU <i class="fas fa-bars"></i></span>
                    </ul>
                </div>
            </div>
        </nav>
        --}}

        <main id="main">
            @yield('content')
        </main>
    </div>
</body>
<footer>
    <script src="{{ asset('js/main-client.js') }}" defer></script>

</footer>
</html>
