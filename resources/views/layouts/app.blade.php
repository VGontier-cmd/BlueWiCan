<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta http-equiv="content-language" content="fr-FR"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('head')
    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>
<body page-format="default">
    @include('partials.header')
    @include('partials.sidenav')
    
    <main id="main-content" class="main-content no-sb">
        <div class="main-wrapper">
            <div class="main-inner container-fluid p-4">
                <div class="row">
                    @yield('content')
                </div>
            </div>
            @include('partials.footer')
        </div>
    </main>

    @stack('scripts')
</body>
</html>
