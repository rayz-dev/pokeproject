<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
</head>

<body>
    <div class="container pt-5" id="register-container">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-10 col-md-8 col-lg-6 col-xl-5">
                
                <div class="row mb-4">
                    <div class="col">
                        <img src="{{asset('images/content/pokeball.png')}}" alt="Pokeball" class="img-fluid mx-auto d-block pokeball-login">
                    </div>
                </div>

                <div class="row text-center mb-4">
                    <div class="col">
                        <h1><span class="text-primary">CREATE</span> YOUR ACCOUNT</h1>
                    </div>
                </div>
                    
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="username" class="col-12 col-form-label ml-2">{{ __('Username') }}</label>

                        <div class="col-12 ml-2">
                            
                            <input id="username" type="text" class="position-relative form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" @error('username') autofocus @enderror>
                            <img src="{{asset('images/content/pokeball.png')}}" alt="Logo" class="img-fluid pokeball-small">
                            
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-12 col-form-label ml-2">{{ __('Email address') }}</label>

                        <div class="col-12 ml-2">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" @error('email') autofocus @enderror>
                            <img src="{{asset('images/content/pokeball.png')}}" alt="Logo" class="img-fluid pokeball-small">
                            
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-12 col-form-label ml-2">{{ __('Password') }}</label>

                        <div class="col-12 ml-2">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" @error('password') autofocus @enderror>
                            <img src="{{asset('images/content/pokeball.png')}}" alt="Logo" class="img-fluid pokeball-small">
                            
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="password-confirm" class="col-12 col-form-label ml-2">{{ __('Confirm password') }}</label>
                        
                        <div class="col-12 ml-2">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            <img src="{{asset('images/content/pokeball.png')}}" alt="Logo" class="img-fluid pokeball-small">
                        </div>
                    </div>

                    <div class="form-group row mb-5">
                        <div class="col-12">
                            <div class="row justify-content-center">
                                <div class="col-6 col-3-lg">
                                    <button type="submit" class="btn btn-outline-primary w-100 py-2">
                                        {{ __('CREATE') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="form-group row mb-0 pb-5">
                        <div class="col-12 text-center">
                            <a href="{{ route('login') }}" class="text-secondary"> <i class="fas fa-undo-alt mr-2"></i>Back to login</a>
                        </div>
                    </div>
                </form>
                  
            </div>
        </div>
    </div>
</body>
