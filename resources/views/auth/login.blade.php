@extends('layouts.auth')

@section('content')
<section class="form-wrapper auth-section">
    
    <form method="POST" action="{{ route('login') }}" class="auth-form">
        @csrf
        @include('partials._flash_alert')
        <div class="header">
            <h1>Welcome Back</h1>
            <p>Welcome back, Please enter your details</p>
        </div>
        <div class="field">
            <label for="email">Email address</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Your email" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="field">
            <label for="email">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Your password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="d-flex justify-content-between mb-4">
            <div class="input-item form-switch">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Remember me</label>
            </div>
            <a href="#" class="link-primary">Forgot password?</a>
        </div>
        <button type="submit" class="app-btn btn--primary btn--form w-100 mb-2">Sign in</button>
        <div class="footer">
            <p>Dont have an account? <a href="{{ route('register') }}">Sign up</a></p>
        </div>
    </form>
</section>


<section class="auth-section section-bg">
    <div class="auth-bg">
        <img src="{{url('/images/stellantis-small-logo-white.png')}}" />
    </div>
</section>
@endsection