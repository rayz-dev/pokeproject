@extends('layouts.app')

@section('content')
<div class="container flex-column flex-grow-1 h-100" id="share-container">

    <div class="row">
        <img src="{{asset('images/content/pokeball.png')}}" alt="Pokeball" class="img-fluid m-auto pokeball-medium loading">
    </div>

    <div class="row animation-hide justify-content-center align-items-center h-100">
        <div class="col-12 col-md-6 text-center pokemon-container">
            
            @for ($i = 0; $i < 5; $i++)
                <div class="row justify-content-center">
                    <div class="col pokemon-teams mb-4">
                        @if (array_key_exists($i,$teams))
                            @php
                                $team = $teams[$i];
                            @endphp
                            <div class="team pointer" id="{{'team-'.$i}}">
                                @for ($x = 0; $x < 6; $x++)
                                    @if (array_key_exists($x,$team))
                                        <img src="{{asset('images/pokemon/icons/'.$team[$x].'.png')}}">
                                    @else
                                        <img src="{{asset('images/content/pixel-pokeball.png')}}" class="pokeball-pixel">
                                    @endif
                                @endfor
                                <img src="{{asset('images/content/pokeball.png')}}" alt="Logo" class="img-fluid pokeball-medium ml-2 ml-md-4 position-absolute">
                            </div>
                        @endif
                    </div>
                </div>
            @endfor

            

                <div class="row justify-content-center buttons mb-5">
                    <div class="col-5">
                        <form action="{{route('feed-post')}}" id="builder-post-form" method="POST">
                            @csrf
            
                            <input type="hidden" name="selected" value="">
                            <a onclick="document.getElementById('builder-post-form').submit()" id="share-team" class="disabled btn btn-outline-primary w-100 py-2">
                                SHARE
                            </a>
                        </form>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <a href="{{route('feed')}}" class="text-secondary"> <i class="fas fa-undo-alt mr-2"></i>Back to feed</a>
                </div>
        </div>
    </div>
</div>

@endsection
