@extends('layouts.app')

@section('content')
<div class="container mt-4" id="pokemon-container">
    <div class="row justify-content-center">
        <div class="col-12 text-center">

            <div class="row justify-content-center mb-4">
                <div class="col-12 d-md-none">
                    <div class="row justify-content-center">
                        <div class="col-auto text-right mt-auto">
                            <p class="text-primary h5 m-0">#{{($pokemon["pokedex_index"])}}</p>
                            <p class="h3 m-0">{{strtoupper($pokemon["name"])}}</p>
                        </div>
                        <div class="col-auto px-0">
                            @foreach ($pokemon["types"] as $type)
                                <div class="{{"d-inline-flex justify-content-center align-items-center type type-".$type}}"><img src={{asset("images/types/".$type.".png")}} class="img-fluid"></div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="w-100 d-md-none"></div>
                <div class="col-6 col-md-3 col-lg-2 align-self-center">
                    <img src={{"https://assets.pokemon.com/assets/cms2/img/pokedex/full/".$pokemon["id"].".png"}} class="pokemon-big img-fluid">
                </div>
                <div class="col-8 d-md-none my-2">
                    <p class="text-secondary">{{$pokemon["description"]}}</p>
                </div>
                <div class="w-100 d-md-none"></div>
                <div class="w-100 d-md-none"></div>
                <div class="col-7 col-md-6 col-lg-4 align-self-center d-none d-md-block">
                    <div class="row mb-3">
                        <div class="col-auto text-right mt-auto">
                            <p class="text-primary h5 m-0">#{{($pokemon["pokedex_index"])}}</p>
                            <p class="h3 m-0">{{strtoupper($pokemon["name"])}}</p>
                        </div>
                        <div class="col-auto px-0 mr-auto">
                            @foreach ($pokemon["types"] as $type)
                                <div class="{{"d-inline-flex justify-content-center align-items-center type type-".$type}}"><img src={{asset("images/types/".$type.".png")}} class="img-fluid"></div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="text-secondary text-left">{{$pokemon["description"]}}</p>
                        </div>
                    </div>
                    
                    
                </div>
            </div>

            <div class="row justify-content-center mb-5">
                <div class="col-10 col-md-8">
                    <div class="row">
                        @if (count($pokemon["abilities"]) > 0)
                            <div class="col-12 col-sm mb-4">
                                    <p class="h5">Abilities</p>
                                    <p class="h5 text-primary">
                                        @foreach ($pokemon["abilities"] as $ability)
                                            <span>{{$ability}}</span>
                                        @endforeach
                                    </p>
                            </div>
                        @endif
                        <div class="col-6 col-sm mb-4">
                            <p class="h5">Generation</p>
                            <p>
                                <img src="{{asset('images/content/gen-'.$pokemon['generation'].'.png')}}">
                            </p>
                        </div>
                        <div class="col-6 col-sm">
                            <p class="h5">Gender</p>
                            @if (count($pokemon["gender"]) > 0)
                                @foreach ($pokemon["gender"] as $gender)
                                    <img src="{{asset('images/content/'.strtolower($gender).'.png')}}" class="gender">
                                @endforeach
                            @else
                                <p class="h5 text-secondary">Unknown</p>
                            @endif
                        </div>
                        <div class="col-6 col-sm">
                            <p class="h5">Weight</p>
                            <p class="h5 text-secondary">{{$pokemon["weight"]}} Kg</p>
                        </div>
                        <div class="col-6 col-sm">
                            <p class="h5">Size</p>
                            <p class="h5 text-secondary">{{$pokemon["height"]}} m</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mb-5">
                <div class="col-12 col-md-7 align-self-center px-0">
                    <div class="row justify-content-center align-items-end stats">
                        @foreach ($pokemon["stats"] as $i => $stat)
                            @php
                                $stats =  ["HP","ATK","DEF","SP ATK","SP DEF","SPE"];
                            @endphp
                            <div class="col-12 col-md-auto col-lg mb-3 text-center text-md-center">
                                @php
                                    if (0 <= $stat['base_stat'] && $stat['base_stat'] <= 59) {
                                        $color = "#E30613";
                                    } elseif (60 <= $stat['base_stat'] && $stat['base_stat'] <= 79) {
                                        $color = "#E35606";
                                    } elseif (80 <= $stat['base_stat'] && $stat['base_stat'] <= 99) {
                                        $color = "#E3A506";
                                    } elseif (100 <= $stat['base_stat'] && $stat['base_stat'] <= 119) {
                                        $color = "#82E306";
                                    } elseif (120 <= $stat['base_stat'] && $stat['base_stat'] <= 159) {
                                        $color = "#25E306";
                                    } elseif (160 <= $stat['base_stat'] && $stat['base_stat'] <= 200) {
                                        $color = "#06E386";
                                    } elseif (201 <= $stat['base_stat']) {
                                        $color = "#06D6E3";
                                    }
                                @endphp
                                <p class="d-none d-md-block stat vertical-stat mx-auto" stat-value={{$stat["base_stat"]}} stat-color={{$color}}></p>
                                <p class="d-none d-md-block h5 text-primary" >{{$stat["base_stat"]}}</p>
                                <p class="d-none d-md-block h5" >{{$stats[$i]}}</p>

                                <p class="d-inline-block d-md-none h5 mr-2">{{$stats[$i]}}</p>
                                <p class="d-inline-block d-md-none h5 text-primary">{{$stat["base_stat"]}}</p>

                                <p class="d-block d-md-none mb-4 mx-auto stat horizontal-stat" stat-value={{$stat["base_stat"]}} stat-color={{$color}}></p>

                            </div>
                            <div class="w-100 d-md-none"></div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row pb-5">
                <div class="col-12 text-center">
                    <p><a href="{{ route('pokedex-generation', [$gen]) }}" class="text-secondary"> <i class="fas fa-undo-alt mr-2"></i>Back to generation</a></p>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection