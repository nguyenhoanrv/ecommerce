@extends('layouts.app')

@section('content')
    @extends('layouts.app')

@section('content')

    <div class="page-section mb-60">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                    <!-- Login Form s-->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="login-form">
                            <h4 class="login-title">Login</h4>
                            <div class="row">
                                <div class="col-md-12 col-12 mb-20">
                                    <label>Email Address*</label>
                                    <input class="mb-0 @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                        type="email" placeholder="Email Address" name="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Password</label>
                                    <input class="mb-0 @error('password') is-invalid @enderror" type="password"
                                        name="password" placeholder="Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-8">
                                    <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                        <input type="checkbox" id="remember_me" name="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember_me">Remember me</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-10 mb-20 text-left text-md-right">

                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <button class="register-button mt-0" type="submit">Login</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="login-form">
                            <h4 class="login-title">Register</h4>
                            <div class="row">
                                <div class="col-md-6 col-12 mb-20">
                                    <label>First Name</label>
                                    <input class="mb-0" type="text" placeholder="First Name" @error('first_name') is-invalid
                                        @enderror" name="first_name" value="{{ old('first_name') }}" required
                                        autocomplete="first_name" autofocus>

                                    @error('first_name')
                                        <span class=" invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12 mb-20">
                                    <label>Last Name</label>
                                    <input class="mb-0" type="text" placeholder="Last Name" @error('last_name') is-invalid
                                        @enderror" name="last_name" value="{{ old('last_name') }}" required
                                        autocomplete="last_name" autofocus>

                                    @error('last_name')
                                        <span class=" invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-20">
                                    <label>Email Address*</label>
                                    <input class="mb-0  @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" type="email"
                                        placeholder="Email Address">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-20">
                                    <label>Password</label>
                                    <input class="mb-0 @error('password') is-invalid @enderror" name="password" required
                                        autocomplete="new-password" type=" password" placeholder="Password">
                                    @error('password')
                                        <span class=" invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-20">
                                    <label>Confirm Password</label>
                                    <input class="mb-0" type="password" placeholder="Confirm Password"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <div class="col-12">
                                    <button class="register-button mt-0" type="submit">Register</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
