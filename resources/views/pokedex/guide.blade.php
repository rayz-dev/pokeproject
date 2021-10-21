@extends('layouts.app')

@section('content')
<div class="container flex-column flex-grow-1 h-100" id="guide-container">
    <div class="row justify-content-center">
        <div class="col-12 text-center">

            <div class="row justify-content-center py-5 mb-5">
                <div class="col">
                    <img src="{{asset('images/content/pokeball.png')}}" alt="Pokeball" class="img-fluid pokeball-medium d-inline-block mr-3">
                    <h1 class="d-inline-block align-middle my-auto">USER <span class="text-primary">GUIDE</span></h1>
                </div>
            </div>

            <div class="row text-left mb-5">
                <div class="col-12 mb-3">
                    <img src="{{asset('images/content/pokedex.png')}}" alt="Pokedex" class="img-fluid pokeball-medium d-inline-block mr-3">
                    <h3 class="d-inline-block align-middle my-auto">POKÉDEX</h3>
                </div>
                <div class="col-12">
                    <p>
                        Welcome to our Pokédex application! We wanted to build a Pokédex application that actually reminded a Pokédex and could help you out during your game runs, so you will find a Pokédex for each generation. You will be able to navigate through all Pokémon from each regions and check their data, which will of course relate to which Pokédex you chose. Of course there's also an option that lets you see all Pokémon from all generations.
                    </p>
                </div>
            </div>

            <div class="row text-left mb-5">
                <div class="col-12 mb-3">
                    <img src="{{asset('images/content/pokeballs.png')}}" alt="Pokedex" class="img-fluid pokeball-medium d-inline-block mr-3">
                    <h3 class="d-inline-block align-middle my-auto">TEAM BUILDER</h3>
                </div>
                <div class="col-12">
                    <p>
                        In this section you will be able to manage Pokémon teams! You can create up to 5 teams. You can delete them, edit them and you can even share them so other people can check out your amazing teams!
                    </p>
                </div>
            </div>

            <div class="row text-left">
                <div class="col-12 mb-3">
                    <img src="{{asset('images/content/smartphone.png')}}" alt="Pokedex" class="img-fluid pokeball-medium d-inline-block mr-3">
                    <h3 class="d-inline-block align-middle my-auto">FEED</h3>
                </div>
                <div class="col-12">
                    <p>
                        This is where your shared teams will be seen, and also where you will see Pokémon teams from Pokémon lovers all around the world! Vote for your favourites and amaze people with your teams!
                    </p>
                </div>
            </div>
            

        </div>
    </div>
</div>

@endsection