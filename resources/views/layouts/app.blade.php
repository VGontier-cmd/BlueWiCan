<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="{{url('/images/stellantis-small-logo-white.png')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @stack('head')
    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- vue.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.7.14/vue.min.js" integrity="sha512-BAMfk70VjqBkBIyo9UTRLl3TBJ3M0c6uyy2VMUrq370bWs7kchLNN9j1WiJQus9JAJVqcriIUX859JOm12LWtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body page-format="default">
    <div id="app">
        @include('partials.sidenav')
    
        <main id="main-content" class="main-content no-sb">
            <div class="main-wrapper">
                @include('partials.header')
                
                <div id="hero-bg" class="hero-bg"></div>
                <div id="main-inner" class="main-inner container-fluid">
                    <div class="hero">
                        <h1 class="hero-title">{{ $page_title }}</h1>
                        @if (Route::currentRouteName() != 'dashboard')
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="active breadcrumb-item" aria-current="page">{{ $page_subtitle }}</li>
                                </ol>
                            </nav>
                        @else
                            <p class="hero-subtitle">{{ $page_subtitle }}</p>
                        @endif
                    </div>
                    @yield('content')
                </div>
                @include('partials.footer')
            </div>
        </main>
    </div>

    @stack('scripts')
</body>
</html>
