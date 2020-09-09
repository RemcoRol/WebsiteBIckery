<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="ROBOTS" name="NOINDEX, NOFOLLOW">
    <meta http-equiv="PRAGMA" content="NO-CACHE">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/fe3ccb2e89.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/beheer-style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <!-- Bootstrap NavBar -->
        <nav class="navbar navbar-expand-md navbar-dark bg-danger">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img class="bickery-logo" src="{{ asset('images/misc/bickery.png')}}">
            </a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <!-- This menu is hidden in bigger devices with d-sm-none.
                   The sidebar isn't proper for smaller screens imo, so this dropdown menu can keep all the useful sidebar itens exclusively for smaller screens  -->
                    <li class="nav-item dropdown d-sm-block d-md-none">
                        <a class="nav-link dropdown-toggle" href="#" id="smallerscreenmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Menu </a>
                        <div class="dropdown-menu" aria-labelledby="smallerscreenmenu">
                            <a class="dropdown-item" href="#top">hjsahgjsa</a>
                            <a class="dropdown-item" href="#top">Profile</a>
                            <a class="dropdown-item" href="#top">Tasks</a>
                            <a class="dropdown-item" href="#top">Etc ...</a>
                        </div>
                    </li><!-- Smaller devices menu END -->
                </ul>
            </div>
        </nav><!-- NavBar END -->
        <!-- Bootstrap row -->

        <div class="row" id="body-row">
            <!-- Sidebar -->
            @auth
            <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
                <!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
                <!-- Bootstrap List Group -->
                <ul class="list-group">
                    <!-- Separator with title -->
                    <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                        <small>MAIN MENU</small>
                    </li>
                    <!-- /END Separator -->
                    <!-- Menu with submenu -->
                    <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fa fa-dashboard fa-fw mr-3"></span>
                            <span class="menu-collapsed">Dashboard</span>
                            <span class="submenu-icon ml-auto"></span>
                        </div>
                    </a>
                    <!-- Submenu content -->
                    <div id='submenu1' class="collapse sidebar-submenu">
                        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed">Chahgag</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed">Reports</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed">Tables</span>
                        </a>
                    </div>
                    <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fa fa-user fa-fw mr-3"></span>
                            <span class="menu-collapsed">Accounts</span>
                            <span class="submenu-icon ml-auto"></span>
                        </div>
                    </a>
                    <!-- Submenu content -->
                    <div id='submenu2' class="collapse sidebar-submenu">
                        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed">Settings</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed">Password</span>
                        </a>
                    </div>
                    <a href="{{ route('beheer.products.index') }}" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fas fa-cubes fa-fw mr-3"></span>
                            <span class="menu-collapsed">Producten</span>
                            <span class="submenu-icon ml-auto"></span>
                        </div>
                    </a>
                    <a href="{{ route('beheer.brands.index') }}" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="far fa-file fa-fw mr-3"></span>
                            <span class="menu-collapsed">Merken</span>
                            <span class="submenu-icon ml-auto"></span>
                        </div>
                    </a>
                    <a href="{{ route('beheer.categories.index') }}" class="bg-dark list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fa fa-tasks fa-fw mr-3"></span>
                            <span class="menu-collapsed">Categoriën</span>
                        </div>
                    </a>

                    <a href="{{ route('beheer.pages.index') }}" class="bg-dark list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="far fa-file fa-fw mr-3"></span>
                            <span class="menu-collapsed">Pagina's</span>
                            <span class="submenu-icon ml-auto"></span>
                        </div>
                    </a>

                    <a href="{{ route('beheer.menus.index') }}" class="bg-dark list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="far fa-caret-square-down fa-fw mr-3"></span>
                            <span class="menu-collapsed">Menu</span>
                            <span class="submenu-icon ml-auto"></span>
                        </div>
                    </a>

                    <a href="{{ route('beheer.images.index') }}" class="bg-dark list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="far fa-images fa-fw mr-3"></span>
                            <span class="menu-collapsed">Afbeeldingen</span>
                            <span class="submenu-icon ml-auto"></span>
                        </div>
                    </a>

                    <!-- Separator with title -->
                    <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                        <small>OPTIONS</small>
                    </li>
                    <!-- /END Separator -->
                    <a href="#" class="bg-dark list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fa fa-calendar fa-fw mr-3"></span>
                            <span class="menu-collapsed">Onderhoud</span>
                        </div>
                    </a>
                    <!-- Separator without title -->
                    <li class="list-group-item sidebar-separator menu-collapsed"></li>
                    <!-- /END Separator -->
                    <a href="#top" data-toggle="sidebar-colapse" class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                            <span id="collapse-text" class="menu-collapsed">Collapse</span>
                        </div>
                    </a>
                </ul><!-- List Group END-->
            </div><!-- sidebar-container END -->
            @endauth
            <!-- MAIN -->
            <div class="col p-4">
                <main class="py-4">
                    @yield('content')
                </main>
            </div><!-- Main Col END -->
        </div><!-- body-row END -->
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main-beheer.js') }}" defer></script>
</body>
</html>
