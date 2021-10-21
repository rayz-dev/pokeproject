@extends('layouts.app')

@section('content')
<div class="container flex-column flex-grow-1 h-100 mt-5" id="builder-container">

    <div class="row">
        <img src="{{asset('images/content/pokeball.png')}}" alt="Pokeball" class="img-fluid m-auto pokeball-medium loading">
    </div>

    <div class="row animation-hide justify-content-center align-items-center h-100">
        <div class="col-12 col-md-6 text-center pokemon-container">
            
            @for ($i = 0; $i < 5; $i++)
                <div class="row justify-content-center">
                    <div class="col pokemon-teams mb-5">
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
                        @else
                            <div class="create d-inline-flex flex-row justify-content-center align-items-center h-100">
                                <img src={{asset('images/content/gear.png')}} class="gear img-fluid d-inline-block">
                            <a href="{{route('builder-create')}}" class="nav-link text-dark position-absolute"><span class="text-primary">Create</span> a team</a>
                            </div>
                        @endif
                    </div>
                </div>
            @endfor

            

                <div class="row justify-content-center buttons mt-md-5">
                    <div class="col-5 col-4-lg">
                        <form action="{{route('feed-post')}}" id="builder-post-form" method="POST">
                            @csrf
            
                            <input type="hidden" name="selected" value="">
                            <a onclick="document.getElementById('builder-post-form').submit()" class="disabled btn btn-outline-dark w-100 p-2">
                                SHARE
                            </a>
                        </form>
                    </div>
                    <div class="col-5 col-4-lg">
                        <form action="{{route('builder-manage')}}" id="builder-manage-form" method="POST">
                            @csrf
            
                            <input type="hidden" name="selected" value="">
                            <a onclick="document.getElementById('builder-manage-form').submit()" class="disabled btn btn-outline-primary w-100 p-2">
                                MANAGE
                            </a>
                        </form>
                    </div>
                </div>

            

        </div>
    </div>
</div>

@endsection