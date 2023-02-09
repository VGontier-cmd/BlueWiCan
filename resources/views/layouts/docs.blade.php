<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="{{ url('/images/stellantis-small-logo-white.png') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- styles -->
    @vite(['resources/sass/docs.scss', 'resources/js/docs.js'])
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- copy to clipboard -->
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2/dist/clipboard.min.js"></script>
</head>

<body>
    <div class="docs-banner">
        <div>
            Welcome on the BlueWiCan App documentation written by <span>Théo Carel, Nathan Carel & Vivien
                Gontier.</span>
        </div>
    </div>
    <main id="main">
        <div class="docs-layout">
            <!-- aside -->
            @include('.docs._docs_sidenav')

            <!-- content section -->
            <section class="docs-content">
                <div class="docs-content__wrapper">
                    <div class="docs-content__inner">
                        <div class="docs-main">
                            <div class="main-content">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>
</html>
