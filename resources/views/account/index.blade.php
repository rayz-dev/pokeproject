@extends('layouts.app')

@section('content')
<div class="container" id="profile-container">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            
            <div class="row justify-content-center mb-3">
                <img src="{{asset('images/content/player.png')}}" alt="Profile" class="player img-fluid">
            </div>

            <div class="row justify-content-center mb-5">
                <div class="col-auto">
                    <a class="text-secondary" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    
                        <i class="fas fa-arrow-left mr-2"></i>{{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>

            <div class="row justify-content-center align-items-end mb-3">
                <div class="col-auto px-2">
                    <img src="{{asset('images/content/gear.png')}}" class="gear img-fluid">
                </div>
                <div class="col-auto px-2">
                    <p class="h5">Username</p>
                </div>
            </div>
            
            <div class="row mb-4">
                <div class="col">
                    <p class="text-primary h6">{{Auth::user()->username}}</p>
                </div>
            </div>

            <div class="row justify-content-center align-items-end mb-3">
                <div class="col-auto px-2">
                    <img src="{{asset('images/content/gear.png')}}" class="gear img-fluid">
                </div>
                <div class="col-auto px-2">
                    <p class="h5">Email address</p>
                </div>
            </div>
            
            <div class="row mb-4">
                <div class="col">
                    <p class="text-primary h6">{{Auth::user()->email}}</p>
                </div>
            </div>

            <div class="row justify-content-center align-items-end mb-3">
                <div class="col-auto px-2">
                    <img src="{{asset('images/content/gear.png')}}" class="gear img-fluid">
                </div>
                <div class="col-auto px-2">
                    <p class="h5">Profile picture</p>
                </div>
            </div>
            
            <div class="row mb-5">
                <div class="col">
                    <img src="{{asset('images/content/avatar-'.Auth::user()->avatar.'.png')}}" alt="Profile avatar" class="avatar-small img-fluid">
                </div>
            </div>

            <div class="row justify-content-center mb-3">
                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="{{ route('account-config') }}" class="btn btn-outline-primary w-100 py-2">
                        EDIT ACCOUNT
                    </a>
                </div>
            </div>

            @if(session('message'))
                <div class="row">
                    <div class="col">
                        <span class="valid-feedback d-block" role="alert">
                            <strong> {{session('message')}}</strong>
                        </span>
                    </div>
                </div>
            @endif
            
        </div>
    </div>
</div>
@endsection
