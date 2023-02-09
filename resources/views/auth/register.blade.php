@extends('layouts.auth')

@section('content')
<section class="auth-section section-bg">
    <div class="auth-bg">
        <img src="{{url('/images/stellantis-small-logo-white.png')}}" />
    </div>
</section>

<section class="form-wrapper auth-section">
    <form method="POST" action="{{ route('register') }}" class="auth-form">
        @csrf
        <div class="header">
            <h1>You are new ?</h1>
            <p>Welcome and create your account</p>
        </div>
        <div class="field">
            <label for="name">Name</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter Your name" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="field">
            <label for="email">Email address</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Your email" required autocomplete="email">
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
        <div class="field">
            <label for="email">Confirm your password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Your password" required autocomplete="new-password">
        </div>
        <div class="mb-4">
            <div class="input-item form-switch">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Remember me</label>
            </div>
        </div>
        <button type="submit" class="app-btn btn--primary btn--form w-100 mb-2">Sign up</button>
        <div class="footer">
            <p>Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
        </div>
    </form>
</section>
@endsection