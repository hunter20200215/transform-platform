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
            <h1 class="auth-header" style="font-family: 'Sofia', sans-serif;font-size:40px;">{{ __('Less Think, More Ink.') }}</h1>
            <!-- <form method="POST" action="{{ route('register') }} " style="margin-bottom:20px; margin-top:30px;"> -->
            <a href="/register/1">
                <input id="type" type="hidden"  name="type" value="customer">
                <div class="form-group row mb-1">
                    <div class="offset-md-3 col-md-6 d-flex justify-content-center w-100">
                    
                            <button type="submit" class="btn btn-create">
                                {{ __('Join as customer') }}
                            </button>
                    </div>
                </div>
            </a>
            <!-- </form> -->
            <!-- <form method="POST" action="{{ route('register') }}"> -->
            <a href = "/register/2" >
                <input id="type" type="hidden"  name="type" value="artist">
                <div class="form-group row mb-0">
                    <div class="offset-md-3 col-md-6 d-flex justify-content-center w-100">
                    
                            <button type="submit" class="btn" style="border-radius: 20px;border: 1px solid;width: 100%;">
                                {{ __('Join as artist') }}
                            </button>
                    </div>
                    
                </div>
            </a>
            <!-- </form> -->
            <div class="form-group row mb-0" style="font-size:18px;">
                <div class="offset-md-3 col-md-6 d-flex justify-content-center w-100 mt-2">
                    Already have an account?
                    <a href=" {{ url('login') }}"> Login</a>
                </div>
            </div>
        </div>
        <div class="form-group row mb-0">
            <div style="margin-top:10px;color:black">By signing up, you agree to our <span style=" color: black;font-weight: bolder;font-size: 15px;">Terms & Privacy Policy</span>
            </div>
        </div>
    </div>
</div>

@endsection
