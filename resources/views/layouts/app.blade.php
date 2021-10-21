<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pokeproject') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com"><link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app" class="d-flex flex-column h-100">
        <nav class="navbar navbar-expand navbar-light py-4">
            <div class="container justify-content-center">
                <!-- Authentication Links -->
                @guest
                    <ul class="navbar-nav ml-md-auto align-items-center">
                        <li class="nav-item hover">
                            <span class="{{ Request::is('pokedex*') ? 'active' : '' }}"><a class="nav-link d-inline-block mx-4 text-dark" href="{{ route('pokedex') }}">POKÉDEX</a></span>
                        </li>
                        <li class="nav-item mb-2 mb-md-0">
                            <span><img src="{{asset('images/content/pokeball.png')}}" alt="Pokeball" class="img-fluid pokeball-medium"></span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-inline-block mx-4 text-primary" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                        </li>
                    </ul>
                @else
                <!-- <span class="fas fa-chevron-left mr-4 d-md-none text-primary"></span> -->
                    <ul class="navbar-nav ml-md-auto align-items-center">
                        <li class="nav-item hover">
                            <span class="{{ Request::is('pokedex*') ? 'active' : '' }}"><a class="nav-link d-inline-block mx-4 text-dark" href="{{ route('pokedex') }}">POKÉDEX</a></span>
                        </li>    
                        <li class="nav-item hover">
                            <span class="{{ Request::is('builder*') ? 'active' : '' }}"><a class="nav-link d-inline-block mx-4 text-dark" href="{{ route('builder') }}">TEAM BUILDER</a></span>
                        </li>
                        <li class="nav-item hover">
                            <span class="{{ Request::is('feed*') ? 'active' : '' }}"><a class="nav-link d-inline-block mx-4 text-dark" href="{{ route('feed') }}">FEED</a></span>
                        </li>
                        <li class="nav-item hover">
                            <span class="{{ Request::is('guide*') ? 'active' : '' }}"><a class="nav-link d-inline-block mx-4 text-dark" href="{{ route('guide') }}">USER GUIDE</a></span>
                        </li>
                        <li class="nav-item mb-2 mb-md-0">
                            <span class="mx-4"><img src="{{asset('images/content/pokeball.png')}}" alt="Pokeball" class="img-fluid pokeball-medium"></span>
                        </li>
                        <li class="nav-item">
                            <a class="d-inline-block mx-4 text-primary" href="{{ route('account') }}">{{ Auth::user()->username }}</a>
                        </li>
                    </ul>
                <!-- <span class="fas fa-chevron-right ml-4 d-md-none text-primary"></span>  -->
                @endguest
            </div>
        </nav>

        <main class="py-4 d-flex flex-column flex-grow h-100">
            @yield('content')
        </main>
    </div>

   @include('layouts.footer')
</body>
</html>
