@extends('layouts.app')

@section('content')
<div class="container flex-column flex-grow-1 h-100" id="feed-container">

    <div class="row">
        <img src="{{asset('images/content/pokeball.png')}}" alt="Pokeball" class="img-fluid m-auto pokeball-medium loading">
    </div>

    <div class="row animation-hide justify-content-center h-100">
        <div class="col-auto pokemon-container">

            <div class="row justify-content-center mb-5">
                <div class="col-auto">
                    <a href="{{route('feed-share')}}" class="btn btn-outline-primary w-100 py-2">
                        SHARE A TEAM
                    </a>
                </div>
            </div>

            @if (count($posts) > 0)
                @for ($i = 0; $i < count($posts); $i++)
                    @php
                        $post = $posts[$i];
                    @endphp
                    <div class="row justify-content-center mb-5">
                        <div class="col-auto post" id={{"post-".$post->id}}>
                            <!-- Mobile distr -->
                            <div class="row d-sm-none justify-content-center">
                                <div class="col-auto">
                                    <img src="{{asset('images/content/avatar-'.$post->user->avatar.'.png')}}" alt="Profile avatar" class="d-block avatar-small img-fluid">
                                    <p class="text-primary">{{$post->user->username}}</p>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-arrow-up d-block mb-1 upvote-style pointer
                                        <?php
                                            $voted = false;
                                            foreach ($post->votes["user_votes"] as $vote) {
                                                if (array_key_exists(Auth::user()->username,$vote)) {
                                                    if ($vote[Auth::user()->username] == 1) {
                                                        $voted = true;
                                                    }
                                                }
                                            }
                                            if (!$voted){
                                                echo "upvote";
                                            } else {
                                                echo "text-success undovote";
                                            }
                                        ?>
                                    "></i>
                                    
                                    <span class="vote d-block text-center text-secondary">{{$post->votes["total"]}}</span>
                                    <i class="fas fa-arrow-down downvote-style pointer
                                        <?php
                                            $voted = false;
                                            foreach ($post->votes["user_votes"] as $vote) {
                                                if (array_key_exists(Auth::user()->username,$vote)) {
                                                    if ($vote[Auth::user()->username] == -1) {
                                                        $voted = true;
                                                    }
                                                }
                                            }
                                            if (!$voted){
                                                echo "downvote";
                                            } else {
                                                echo "text-info undovote";
                                            }
                                        ?>
                                    "></i>
                                </div>
                            </div>
                            <div class="post-team position-relative">
                                <div class="team d-inline-block">
                                    <div class="placeholder d-none d-sm-inline-block"></div>
                                    @for ($x = 0; $x < 6; $x++)
                                        @if (array_key_exists($x,$post->team))
                                            <img src="{{asset('images/pokemon/icons/'.$post->team[$x].'.png')}}">
                                        @else
                                            <img src="{{asset('images/content/pixel-pokeball.png')}}" class="pokeball-pixel">
                                        @endif      
                                    @endfor
                                    <div class="background"></div>
                                </div>
                            </div>
                            <!-- Deskt distr -->
                            <div class="post-user text-center d-none d-sm-block">
                                <img src="{{asset('images/content/avatar-'.$post->user->avatar.'.png')}}" alt="Profile avatar" class="d-block position-relative avatar-small img-fluid">
                                <p class="text-primary">{{$post->user->username}}</p>
                            </div>
                            <div class="post-votes text-secondary text-center d-none d-sm-block">
                                <i class="fas fa-arrow-up d-block mb-1 upvote-style pointer
                                    <?php
                                        $voted = false;
                                        foreach ($post->votes["user_votes"] as $vote) {
                                            if (array_key_exists(Auth::user()->username,$vote)) {
                                                if ($vote[Auth::user()->username] == 1) {
                                                    $voted = true;
                                                }
                                            }
                                        }
                                        if (!$voted){
                                            echo "upvote";
                                        } else {
                                            echo "text-success undovote";
                                        }
                                    ?>
                                "></i>
                                
                                <span class="vote d-block">{{$post->votes["total"]}}</span>
                                <i class="fas fa-arrow-down downvote-style pointer
                                    <?php
                                        $voted = false;
                                        foreach ($post->votes["user_votes"] as $vote) {
                                            if (array_key_exists(Auth::user()->username,$vote)) {
                                                if ($vote[Auth::user()->username] == -1) {
                                                    $voted = true;
                                                }
                                            }
                                        }
                                        if (!$voted){
                                            echo "downvote";
                                        } else {
                                            echo "text-info undovote";
                                        }
                                    ?>
                                "></i>
                            </div>
                        </div>
                    </div>
                    @if ($i < count($posts)-1)
                        <div class="row mb-5">
                            <div class="col">
                                <img src="{{asset('images/content/separador.png')}}" class="d-block w-100">
                            </div>
                        </div>
                    @endif
                @endfor
            @else
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <img src="{{asset('images/content/empty.png')}}" alt="" class="w-25 mb-3">
                        <p class="h5"><span class="text-danger font-weight-bold">Wow!</span> such empty :(</p>
                    </div>
                </div>

            @endif

        </div>
    </div>
</div>
@endsection
