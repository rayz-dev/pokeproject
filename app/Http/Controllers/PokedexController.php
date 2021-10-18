<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Pokemon;
use App\Generation;

class PokedexController extends Controller
{

    private $gen_ordinal;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->gen_ordinal = ['First', 'Second', 'Third', 'Fourth', 'Fifth', 'Sixth', 'Seventh', 'Eighth', 'Ninth', 'Tenth'];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($gen = null, $pokemon = null)
    {  
        $types = array("grass","fire","water");
        $random_type = $types[array_rand($types)];
        $generations = Generation::all();
        $generations_info = array();
        $starters = array();
        foreach ($generations as $generation) {
            $starter = "";
            foreach ($generation->starters as $starter_id => $starter_type) {
                if ($starter_type == $random_type) {
                    if (strlen($starter_id) == 1) {
                        $starter = "00".$starter_id;
                    } elseif (strlen($starter_id) == 2) {
                        $starter = "0".$starter_id;
                    } else {
                        $starter = $starter_id;
                    }
                }
                $generations_info[$generation->id]["ordinal"] = $this->gen_ordinal[$generation->id-1];
                $generations_info[$generation->id]["starter"] = $starter;
                $starters[$generation->id] = $starter;
            }
        }

        session()->put('gen_info', $generations_info);

        return view('pokedex.index')
            ->with('generations',$generations_info);
    }

    public function generation($gen) {
        if ($gen > 0) {

            $pokemons = Pokemon::where('generation_data.generation',(int)$gen)
                ->get();

            $pokedex_pokemons = array();

            foreach ($pokemons as $pokemon) {
                foreach ($pokemon->generation_data as $generation_data) {
                    if ($generation_data["generation"] == $gen) {
                        $pokedex_pokemons[$generation_data["data"]["pokedex_index"]] = $pokemon->id;
                    }
                }    
            }

            ksort($pokedex_pokemons);

            $generations_info = session()->get('gen_info');
            foreach ($generations_info as $generation_id => $generation) {
                if ($generation_id == $gen) {
                    $generation_info = $generation;
                }
            }

            return view('pokedex.generation')
            ->with('pokemon',$pokedex_pokemons)
            ->with('gen',$gen)
            ->with('gen_info',$generation_info);

        } else {
            
            $pokedex_pokemons = Pokemon::orderBy('id')->pluck('generation','id')->all();
            return view('pokedex.generation')
            ->with('pokemon_all',$pokedex_pokemons);

        }
    }

    public function detail($gen, $pokemon) {
        $pokemon = Pokemon::where('generation_data.generation',(int)$gen)
        ->where('id',(int)$pokemon)
        ->first();

        if (strlen($pokemon->id) == 1) {
            $pokemon->id = "00".$pokemon->id;
        }
        elseif (strlen($pokemon->id) == 2) {
            $pokemon->id = "0".$pokemon->id;
        }

        $generation_pokemon = array(
            'id' => $pokemon->id,
            'name' => ucfirst($pokemon->name),
            'description' => $pokemon->description,
            'weight' => $pokemon->weight,
            'height' => $pokemon->height,
            'generation' => $pokemon->generation,
            'gender' => $pokemon->gender
        );

        foreach ($pokemon->generation_data as $generation_data) {

            if ($generation_data["generation"] == $gen) {

                $pokedex_index = $generation_data["data"]["pokedex_index"];

                if (strlen($pokedex_index) == 1) {
                    $pokedex_index = "00".$pokedex_index;
                }
                elseif (strlen($pokedex_index) == 2) {
                    $pokedex_index = "0".$pokedex_index;
                }
                
                $generation_pokemon['stats'] = $generation_data["data"]["stats"];
                $generation_pokemon['types'] = $generation_data["data"]["types"];
                $generation_pokemon['abilities'] = $generation_data["data"]["abilities"];
                $generation_pokemon['pokedex_index'] = $pokedex_index;
            }
        }

        return view('pokedex.pokemon')
            ->with('pokemon',$generation_pokemon)
            ->with('gen',$gen);
    }

    public function guide()
    {
        return view('pokedex.guide');
    }

    public function error()
    {
        return view('pokedex.error');
    }
}
