@extends('layouts.auth')

@section('content')
<section class="auth-section section-bg">
    <div class="auth-bg">
        <img src="{{url('/images/stellantis-small-logo-white.png')}}" />
    </div>
</section>

<section class="form-wrapper grid center auth-section">
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
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
        <div class="mb-4">
            <div class="input-item form-switch">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Remember me</label>
            </div>
        </div>
        <button type="submit" class="app-btn btn--primary btn--form w-100 mb-2">Sign up</button>
        <div class="app-btn btn--form btn--secondary google-sign-in">
            <svg width="148" height="148" viewBox="0 0 148 148" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M144.156 75.6583C144.156 70.7639 143.759 65.8431 142.912 61.0281H75V88.754H113.89C112.276 97.6962 107.091 105.607 99.4982 110.633V128.623H122.7C136.325 116.083 144.156 97.5639 144.156 75.6583Z"
                    fill="#4285F4" />
                <path
                    d="M75.0002 146.005C94.4189 146.005 110.795 139.629 122.726 128.623L99.5249 110.633C93.0696 115.025 84.736 117.512 75.0266 117.512C56.2429 117.512 40.3164 104.839 34.6019 87.8016H10.6592V106.347C22.8819 130.661 47.777 146.005 75.0002 146.005Z"
                    fill="#34A853" />
                <path
                    d="M34.5752 87.8016C31.5592 78.8595 31.5592 69.1766 34.5752 60.2345V41.6888H10.659C0.446995 62.0335 0.446995 86.0026 10.659 106.347L34.5752 87.8016Z"
                    fill="#FBBC04" />
                <path
                    d="M75.0002 30.498C85.2651 30.3393 95.1861 34.2018 102.62 41.2921L123.176 20.7357C110.16 8.51303 92.8844 1.7932 75.0002 2.00485C47.7769 2.00485 22.8819 17.3493 10.6592 41.6889L34.5754 60.2346C40.2634 43.1703 56.2164 30.498 75.0002 30.498Z"
                    fill="#EA4335" />
            </svg>
            Sign up with Google
        </div>
        <div class="footer">
            <p>Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
        </div>
    </form>
</section>
@endsection