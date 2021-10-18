@extends('layouts.app')

@section('content')
<div class="container mt-4" id="generation-container">
    <div class="row">
        <img src="{{asset('images/content/pokeball.png')}}" alt="Pokeball" class="img-fluid m-auto pokeball-medium loading">
    </div>
    <div class="row animation-hide justify-content-center">
        <div class="col-12 text-center">

            <div class="row justify-content-center">
                @if (isset($gen_info))
                <div class="col-6 col-md-4">
                    @else
                <div class="col-10 col-md-8 col-lg-6">
                @endif
                    <div class="generation d-inline-flex flex-row justify-content-center align-items-center h-100">
                        @if (isset($gen_info))
                            <img src={{"https://assets.pokemon.com/assets/cms2/img/pokedex/full/".$gen_info["starter"].".png"}} class="generation-small img-fluid d-inline-block">
                            <p class="h3 text-dark position-absolute"><span class="text-primary">{{$gen_info["ordinal"]}}</span> generation</p>
                        @else
                            <img src={{asset('images/content/gen-all.png')}} class="img-fluid d-inline-block">
                            <p class="h3 text-dark position-absolute"><span class="text-primary">All</span> generations</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row mb-5 pt-5">
                <div class="col-12 text-center">
                    <p><a href="{{ route('pokedex') }}" class="text-secondary"> <i class="fas fa-undo-alt mr-2"></i>Back to pokédex</a></p>
                </div>
            </div>

            <div class="row d-inline-block mb-5 pokemon-container text-center">
                @if (isset($pokemon))
                    @foreach ($pokemon as $pokemon)
                    <div class="pokemon-link position-relative d-inline-block">
                        <a href="{{ route('pokedex-pokemon', [$gen,$pokemon]) }}" class="d-inline-block">
                            <img src="{{asset('images/pokemon/icons/'.$pokemon.'.png')}}" class="pokemon-small">
                        </a>
                        {{-- <img src="{{asset('images/content/pixel-pokeball.png')}}" class="pokeball-pixel position-absolute"> --}}
                    </div>
                   
                    @endforeach
                @elseif (isset($pokemon_all))
                    @foreach ($pokemon_all as $pokemon => $gen)
                    <div class="pokemon-link position-relative d-inline-block">
                        <a href="{{ route('pokedex-pokemon', [$gen,$pokemon]) }}" class="d-inline-block">
                            <img src="{{asset('images/pokemon/icons/'.$pokemon.'.png')}}" class="pokemon-small">
                        </a>
                    </div>
                    @endforeach
                @endif
            </div>
            
            
        </div>
    </div>
</div>
@endsection