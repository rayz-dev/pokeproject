<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class FeedController extends Controller
{

    public function index()
    {   
        $posts = Post::orderBy('updated_at','desc')->get();
        return view('feed.index')->with('posts',$posts);
    }

    public function share()
    {   
        $user = \Auth::user();
        return view('feed.share')->with('teams',$user->teams);
    }

    public function create(Request $request)
    {
        $user = \Auth::user();
        $team_id = $request->input('selected');
        $posts = Post::all();
        Post::create([
            'id' => count($posts)+1,
            'team' => $user->teams[$team_id],
            'username' => $user->username,
            'votes' => [ 
                'user_votes' => [],
                'total' => 0
            ]
        ]);

        return redirect()->route('feed');
    }

    public function upvote($post_id)
    {   
        $user = \Auth::user();
        $post = Post::find((int)$post_id);
        $votes = array();
        $new_votes = array();
        $voted = false;

        foreach ($post->votes["user_votes"] as $user_vote) {
            foreach ($user_vote as $user_name => $value) {
                if ($user_name == $user->username) {
                    $user_vote[$user_name] = 1;
                    $voted = true;
                }
                
            }
            array_push($new_votes,$user_vote);
        }
    

        if (!$voted){
            $vote = [
                $user->username => 1
            ];
            array_push($new_votes, $vote);
        }

        $votes["user_votes"] = $new_votes;
        $votes["total"] = $this->countVotes($votes["user_votes"]);
        $post->votes = $votes;
        $post->save();
        
        return $votes["total"];
    }

    public function downvote($post_id)
    {   
        $user = \Auth::user();
        $post = Post::find((int)$post_id);
        $votes = array();
        $new_votes = array();
        $voted = false;

        foreach ($post->votes["user_votes"] as $user_vote) {
            foreach ($user_vote as $user_name => $value) {
                if ($user_name == $user->username) {
                    $user_vote[$user_name] = -1;
                    $voted = true;
                }
                
            }
            array_push($new_votes,$user_vote);
        }
    

        if (!$voted){
            $vote = [
                $user->username => -1
            ];
            array_push($new_votes, $vote);
        }

        $votes["user_votes"] = $new_votes;
        $votes["total"] = $this->countVotes($votes["user_votes"]);
        $post->votes = $votes;
        $post->save();
        
        return $votes["total"];
    }

    public function undovote($post_id) {
        $user = \Auth::user();
        $post = Post::find((int)$post_id);
        $votes = array();
        $new_votes = array();
        $voted = false;

        foreach ($post->votes["user_votes"] as $user_vote) {
            if (!in_array($user->username,array_keys($user_vote))) {
                array_push($new_votes,$user_vote);
            }
        }

        $votes["user_votes"] = $new_votes;
        $votes["total"] = $this->countVotes($votes["user_votes"]);
        $post->votes = $votes;
        $post->save();
        
        return $votes["total"];
    }

    public function countVotes($votes)
    {
        $total = 0;
        foreach ($votes as $vote) {
            foreach ($vote as $key => $vote) {
                $total+=$vote;
            }
        }
        return $total;
    }

}
