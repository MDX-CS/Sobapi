<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Authorization tokens -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sobapi') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('partials.nav')

        @yield('content')

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        {{-- menu --}}
                    </div>

                    <div class="col-xs-12">
                        <span class="copy">
                            sobapi made for middlesex university by <a href="https://pavelkoch.me">@kouks</a>
                        </span>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
