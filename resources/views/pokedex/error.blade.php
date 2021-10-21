<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pokeproject</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
    </head>

<body>
    <div class="container" id="error-container">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-10 col-md-7 col-lg-6 col-xl-5">
                <div class="row mb-4">
                    <div class="col">
                        <img src="{{asset('images/content/pokeball.png')}}" alt="Pokeball" class="img-fluid mx-auto d-block pokeball-big">
                    </div>
                </div>

                <div class="row text-center mb-4">
                    <div class="col">
                        <h1 class="text-primary">SORRY!</h1>
                        <h3>The page you requested doesn't exist.</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>