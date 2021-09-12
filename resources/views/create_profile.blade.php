@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <img class="logo-image" src="/img/logo.jpeg" alt="logo image">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="auth-header" style="font-family: 'Sofia', sans-serif;">{{ __('Create Artist-Profile') }}</div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="first-step">
                        <div class="form-group row">
                            <div class="offset-md-3 col-md-6">
                                <input id="user_name" type="text" placeholder="User Name" class="rounded-form form-control @error('name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>
                                
                                @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="offset-md-3 col-md-6">
                                <select name="experience" id="experience" class="rounded-form form-control">
                                    <option value="">Experience</option>
                                    <option value="Bengineer">Bengineer (1~3 years)</option>
                                    <option value="Expert">Expert (5+ years)</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="offset-md-3 col-md-6">
                                <input id="styles" type="text" placeholder="Styles" class="rounded-form form-control @error('styles') is-invalid @enderror" name="styles" value="{{ old('styles') }}" required autocomplete="styles" autofocus>
                                
                                @error('styles')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="offset-md-3 col-md-6">
                                <select name="work_place" id="work_place" class="rounded-form form-control">
                                    <option value="">Where do you Tatoo?</option>
                                    <option value="tattoo-shop">In a tattoo-shop</option>
                                    <option value="company">At company</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="offset-md-3 col-md-6">
                                <input id="biography" type="text" placeholder="Biography" class="rounded-form form-control @error('biography') is-invalid @enderror" name="biography" value="{{ old('biography') }}" required autocomplete="biography" autofocus>
                                
                                @error('biography')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- <div class="form-group row mb-0">
                            <div class="offset-md-3 col-md-6 d-flex justify-content-center w-100">
                                <span  class="btn btn-create" id= "next-page">
                                    {{ __('Next') }}
                                </span>
                            </div>
                        </div> -->
                    </div>

                    <div class="second-step">
                        <!-- <div class="form-group row">
                            <div class="offset-md-3 col-md-6">
                                <input id="residential_address" type="file" placeholder="Residential Address" class="rounded-form form-control @error('residential_address') is-invalid @enderror" name="residential_address" value="{{ old('residential_address') }}" required autocomplete="user_name" autofocus>
                                
                                @error('residential_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="offset-md-3 col-md-6">
                                <input id="residential_address" type="file" placeholder="Residential Address" class="rounded-form form-control @error('residential_address') is-invalid @enderror" name="residential_address" value="{{ old('residential_address') }}" required autocomplete="user_name" autofocus multiple/>
                                
                                @error('residential_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> -->

                        <div class="form-group row mb-0">
                            <div class="offset-md-3 col-md-6 d-flex justify-content-center w-100">
                                <button type="submit" class="btn btn-create">
                                    {{ __('Create Profile') }}
                                </button>
        <!-- 
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif -->
                            </div>
                        </div>

                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection