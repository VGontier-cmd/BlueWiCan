<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta http-equiv="content-language" content="fr-FR"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @stack('head')
    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body page-format="default">
    <div id="app">
        <div id="toast-wrapper" class="toast-wrapper">
            @include('partials._toast')
        </div>
        
        @include('partials.header')
        @include('partials.sidenav')
    
        <main id="main-content" class="main-content no-sb">
            <div class="main-wrapper">
                <div class="main-inner container-fluid">
                    @yield('content')
                </div>
                @include('partials.footer')
            </div>
        </main>
    </div>

    @stack('scripts')
</body>
</html>
