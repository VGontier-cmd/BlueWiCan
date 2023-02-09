@extends('layouts.auth')

@section('content')
<section class="form-wrapper auth-section">
    <form method="POST" action="{{ route('password.email') }}" class="auth-form">
        @csrf
        @include('partials._flash_alert')
        <div class="header">
            <h1>Forgot your password ?</h1>
            <p>We will send you a reset link by email</p>
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
        <button type="submit" class="app-btn btn--primary btn--form w-100 mb-2">Send link</button>
        <div class="footer">
            <p>Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
        </div>
    </form>
</section>
@endsection