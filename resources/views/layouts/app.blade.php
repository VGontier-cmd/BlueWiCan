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
<body>
    @include('partials.header')

    <main id="main" class="main">
        @yield('main')
    </main>

    @include('partials.footer')

    @yield('scripts')
</body>
</html>
