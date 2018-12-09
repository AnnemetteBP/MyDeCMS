<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} Management</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="container is-fullwidth m-l-0 m-r-0">
        @include('nav.main')
        <div class="columns">
            <div class="column is-one-fifth">
                @include('manage.nav.manage')
            </div>
            <div class="column m-t-50 is-one-fifths">
                @if (session('status'))
                    <div class="is-success">
                        {{ session('status') }}
                    </div>
                @elseif (session('error'))
                    <div class="is-danger">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="car-header m-t-10 m-l-10 m-r-10">
                        <div class="card-hearder-title">
                            @yield('title')
                        </div>
                        <hr class="m-t-10">
                        @yield('subtitle')
                    </div>
                    <div class="card-content">
                        @yield('content')
                    </div>
                    <div class="card-footer">
                        @yield('footer')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
