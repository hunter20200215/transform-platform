@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
        <div class="col-md-5 mx-auto">
            <div class="row">
                <div class="col-4">
                    <img class="logo-img" src="/img/logo.png" alt="logo image">
                </div>
                <div class="col-8">
                    <p class="logo-text">Freighty</p>
                </div>
                
            </div>
            
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="auth-header" style="font-family: 'Sofia', sans-serif;">{{ __('Login to your account') }}</div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="form-group row">
                    <div class="offset-md-3 col-md-6">
                        <input id="email" type="email" placeholder="Email" class="rounded-form form-control @error('name') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="offset-md-3 col-md-6">
                        <input id="password" placeholder="Password" type="password" class="rounded-form form-control @error('name') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="offset-md-3 col-md-6">
                        <div class="form-check" style="text-align:center">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                            <!-- @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif -->
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="offset-md-3 col-md-6 d-flex justify-content-center w-100">
                        <button type="submit" class="btn btn-create">
                            {{ __('Login') }}
                        </button>
<!-- 
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
