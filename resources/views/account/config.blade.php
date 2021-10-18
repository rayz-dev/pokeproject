@extends('layouts.app')

@section('content')
<div class="container" id="config-container">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <div class="row">
                <img src="{{asset('images/content/pokeball.png')}}" alt="Pokeball" class="img-fluid m-auto pokeball-medium loading">
            </div>
            <div class="row animation-hide justify-content-center text-left">
                <div class="pokemon-container col-12 col-md-8 col-lg-6 col-xl-5 px-5 text-center px-md-0">
                    <form action="{{ route('account-update') }}" method="POST">
                        @csrf
    
                        <div class="form-group row mb-5">
                            <div class="col-auto">
                                <img src="{{asset('images/content/gear.png')}}" class="gear img-fluid">
                            </div>
                            <div class="col-auto px-0 align-self-end">
                                <label for="username" class="h5 col-12 px-0">{{ __('Username') }}</label>
                            </div>

                            <div class="col-12 mt-3">
                                
                                <input id="username" type="text" class="position-relative form-control @error('username') is-invalid @enderror" name="username" value="{{old('username')}}" autocomplete="username" @error('username') autofocus @enderror>
                                
                                @error('username')
                                    <span class="invalid-feedback text-left" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="form-group row mb-5">
                            <div class="col-auto">
                                <img src="{{asset('images/content/gear.png')}}" class="gear img-fluid">
                            </div>
                            <div class="col-auto px-0 align-self-end">
                                <label for="email" class="h5 col-12 px-0">{{ __('Email address') }}</label>
                            </div>
                            <div class="col-12 mt-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" autocomplete="email" @error('email') autofocus @enderror>
                                
                                @error('email')
                                    <span class="invalid-feedback text-left" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="form-group row mb-5">
                            <div class="col-auto">
                                <img src="{{asset('images/content/gear.png')}}" class="gear img-fluid">
                            </div>
                            <div class="col-auto px-0 align-self-end">
                                <label for="new_password" class="h5 col-12 px-0">{{ __('New password') }}</label>
                            </div>
                            
    
                            <div class="col-12 mt-3">
                                <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" autocomplete="new-password" @error('new_password') autofocus @enderror>
                                
                                @error('new_password')
                                    <span class="invalid-feedback text-left" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="form-group row mb-5">
                            <div class="col-auto">
                                <img src="{{asset('images/content/gear.png')}}" class="gear img-fluid">
                            </div>
                            <div class="col-auto px-0 align-self-end">
                                <label for="new_password_confirmation" class="h5 col-12 px-0">{{ __('Confirm new password') }}</label>
                            </div>
                            
                            <div class="col-12 mt-3">
                                <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <div class="col-auto">
                                <img src="{{asset('images/content/gear.png')}}" class="gear img-fluid">
                            </div>
                            <div class="col-auto px-0 align-self-end">
                                <label for="avatar" class="h5 col-12 px-0">{{ __('Profile picture') }}</label>
                                <input id="avatar" name="avatar" type="hidden" value={{Auth::user()->avatar}}>
                            </div>
                            
                            <div class="col-12 mt-3 text-center">
                                <img src="{{asset('images/content/avatar-'.Auth::user()->avatar.'.png')}}" alt="Profile avatar"  id="current-avatar" class="avatar-small img-fluid">
                            </div>

                            <div class="col-12 mt-3 text-center">
                                @for ($i = 1; $i <= 20; $i++)
                                    <img src="{{asset('images/content/avatar-'.$i.'.png')}}" alt="Profile avatar" class="avatar-extra-small m-2 img-fluid pointer <?php if ($i == Auth::user()->avatar) echo "selected"?>" id={{"avatar-".$i}}>
                                @endfor
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <div class="col-auto">
                                <img src="{{asset('images/content/gear.png')}}" class="gear img-fluid">
                            </div>
                            <div class="col-auto px-0 align-self-end">
                                <label for="password" class="h5 col-12 px-0">{{ __('Current password') }}</label>
                            </div>
                            
                            <div class="col-12 mt-3">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" @error('password') autofocus @enderror>
                                <img src="{{asset('images/content/pokeball.png')}}" alt="Logo" class="img-fluid pokeball-small">
                                @error('password')
                                    <span class="invalid-feedback text-left" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-6">
                                <a href="{{route('account')}}" class="text-secondary"> <i class="fas fa-undo-alt mr-2"></i>Back to account</a>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-outline-primary px-4 py-2">
                                    SAVE CHANGES
                                </button>
                            </div>
                        </div>
                    </form>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
