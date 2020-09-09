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
            link-en="{{ route(Route::currentRouteName(), ['en', Request::segment(2)]) }}"
            link-nl="{{ route(Route::currentRouteName(), ['nl', Request::segment(2)]) }}"
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
              <img src="{{ asset('images/misc/bickery.png') }}" class="bickery-logo">
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              @foreach($menus as $menu)
                  @if(count($menu->childs))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('site.navigation.' . $menu->page->page_slug) }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @include('layouts.manageChild',['childs' => $menu->childs])
                        </div>
                    </li>

                  @else
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('*/' . $menu->page->page_slug) ? 'active' : ''}}" href="{{ $menu->page ? $menu->page->getRedirectUrl() : '' }}">{{ __('site.navigation.' . $menu->page->page_slug) }}</a>
                    </li>
                  @endif
              @endforeach
            </ul>
          </div>
          <language-switcher
            class="nav-link"
            locale="{{ app()->getLocale() }}"
            link-en="{{ route(Route::currentRouteName(), ['en', Request::segment(2)]) }}"
            link-nl="{{ route(Route::currentRouteName(), ['nl', Request::segment(2)]) }}"
          ></language-switcher>
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
