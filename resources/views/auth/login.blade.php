<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-site-verification" content="n8L-9zrYjhMnZzfseDux-hDAkINoPwZI4YLnuGp8-is" />
        
        <title>Pokeproject</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
    </head>

<body>
    <div class="container pt-5" id="login-container">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-10 col-md-7 col-lg-6 col-xl-5">
                <div class="row mb-4">
                    <div class="col">
                        <img src="{{asset('images/content/pokeball.png')}}" alt="Pokeball" class="img-fluid mx-auto d-block pokeball-login">
                    </div>
                </div>

                <div class="row text-center mb-4">
                    <div class="col">
                        <h1><span class="text-primary">POKE</span>PROJECT</h1>
                    </div>
                </div>
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="login" class="col-12 col-form-label">
                            {{ __('Username or email address') }}
                        </label>
                        
                        <div class="col-12">
                            <input id="login" type="text"
                                    class="form-control{{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="login" value="{{ old('username') ?: old('email') }}" required>
                        
                            @if ($errors->has('username') || $errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-12 col-form-label">{{ __('Password') }}</label>

                        <div class="col-12">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <div class="col-12 text-left">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    <small>{{ __('Remember Me') }}</small>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-4 py-2">
                        <div class="col-12">
                            <div class="row justify-content-around">
                                <div class="col-5 px-0 px-sm-3">
                                    <a href="{{ route('pokedex') }}" class="btn btn-outline-secondary w-100 py-2">
                                        {{ __('GUEST') }}
                                    </a>
                                </div>
                                <div class="col-5 px-0 px-sm-3">
                                    <button type="submit" class="btn btn-outline-primary w-100 py-2">
                                        {{ __('LOGIN') }}
                                    </button>
                                </div>
                            </div>
                            {{-- @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif --}}
                        </div>
                    </div>

                    <div class="form-group row mb-0 py-2">
                        <div class="col-12 text-center">
                            <p>Not registered? <a href="{{ route('register') }}">Create an account</a>.</p>
                        </div>
                    </div>
                </form>
                    
            </div>
        </div>
    </div>
    <footer class="col-12 text-center">
        All content &amp; design © Pokémon Database, 2008-2021. Pokémon images &amp; names © 1995-2021 Nintendo/Game Freak.
    </footer>
</body>