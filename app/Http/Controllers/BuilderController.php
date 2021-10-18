<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pokemon;
use App\User;

class BuilderController extends Controller
{

    public function index()
    {   
        $user = \Auth::user();
        return view('builder.index')->with('teams',$user->teams);
    }

    public function create()
    {
        $pokemon = Pokemon::orderBy('id')->pluck('id')->all();
        return view('builder.create')->with('pokemon',$pokemon);
    }
    
    public function manage(Request $request)
    {   
        $user = \Auth::user();
        $pokemon = Pokemon::orderBy('id')->pluck('id')->all();
        $team_input = $request->input('selected');
        $team = $user->teams[$team_input];
        foreach ($team as $key => $value) {
            if (strlen($value) == 1) {
                $team[$key] = "00".$value;
            }
            elseif (strlen($value) == 2) {
                $team[$key] = "0".$value;
            }
        }
        return view('builder.manage')
            ->with('team',$team)
            ->with('team_index',$team_input)
            ->with('pokemon',$pokemon);
    }

    public function delete(Request $request)
    {
        $team_index = $request->input('team_index');
        $user = \Auth::user();

        $user_teams = $user->teams;
        array_splice($user_teams, $team_index, 1);
        
        $user->teams = $user_teams;
        $user->save();

        return redirect()->route('builder');
    }

    public function ajaxCreate(Request $request)
    {
        $team = $request->team;
        $user = \Auth::user();

        $user_teams = array();
        if ($user->teams) {
            foreach ($user->teams as $user_team) {
                array_push($user_teams, $user_team);
            }
        }
        array_push($user_teams, $team);
        
        $user->teams = $user_teams; 
        $user->save();
    }

    public function ajaxSave(Request $request)
    {
        $team = $request->team;
        $team_index = $request->team_index;
        $user = \Auth::user();

        var_dump($team_index);
        $user_teams = array();

        if ($user->teams) {
            foreach ($user->teams as $index => $user_team) {
                if ($index == $team_index) {
                    array_push($user_teams, $team);
                } else {
                    array_push($user_teams, $user_team);
                }
            }
        }
        $user->teams = $user_teams; 
        $user->save();
    }

}
