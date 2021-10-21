@extends('layouts.app')

@section('content')
<div class="container flex-column flex-grow-1 h-100" id="builder-manage-container">
    <div class="row">
        <img src="{{asset('images/content/pokeball.png')}}" alt="Pokeball" class="img-fluid m-auto pokeball-medium loading">
    </div>
    <div class="row animation-hide justify-content-center">
        <div class="col-12 text-center">
            
            <div class="row mb-5 mb-md-4">
                <div class="col text-left pl-4">
                    <a href="{{route('builder')}}" class="text-secondary"> <i class="fas fa-undo-alt mr-2"></i>Back to menu</a>
                </div>
            </div> 

            <div class="row justify-content-center mb-5">
                @for ($i = 0; $i < 6; $i++)
                    <div class="col-4 col-lg-2 mb-4 mb-lg-0">
                        <div class="col slot pointer d-flex justify-content-center align-content-center">
                            @if (array_key_exists($i,$team))
                                <img src={{"https://assets.pokemon.com/assets/cms2/img/pokedex/full/".$team[$i].".png"}} class="img-fluid mx-auto d-block pokemon-slot" id={{"slot-".$team[$i]}}>
                            @endif
                        </div>
                        <img src="{{asset('images/content/pokeball.png')}}" alt="Pokeball" class="img-fluid mx-auto d-block pokeball-big">
                    </div>
                @endfor
            </div>

            <div class="row justify-content-center mb-5">
                <div class="col-5 col-md-3 col-lg-2">
                    <form action="{{route('builder-delete')}}" method="POST" id="delete-form">
                        @csrf
                        <input type="hidden" name="team_index" value={{$team_index}}>
                        <input type="submit" value="DELETE" class="btn btn-outline-dark w-100 py-2">
                    </form>
                </div>
                <div class="col-5 col-md-3 col-lg-2">
                    <form id="save-team-form">
                        @csrf
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <input type="hidden" name="team_index" value={{$team_index}}>
                        <input type="submit" value="SAVE" id="save-team" class="btn btn-outline-primary w-100 py-2">
                    </form>
                </div>
            </div>

            <div class="row d-inline-block mb-5 pokemon-container text-center">
                @foreach ($pokemon as $pokemon)
                <div class="pokemon-link position-relative d-inline-block">
                    <img src="{{asset('images/pokemon/icons/'.$pokemon.'.png')}}" class="pokemon-small available pointer" id="{{"pokemon-".$pokemon}}">
                </div>
                @endforeach
            </div>
            
        </div>
    </div>
</div>

@endsection
