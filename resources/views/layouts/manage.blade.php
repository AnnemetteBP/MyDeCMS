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
    @include('partials.nav.main')
    <div class="columns">
        <div class="column is-one-fifth">
            @include('partials.nav.manage')
        </div>
        <div class="column m-t-50 is-three-fifths">
            @if (session('status'))
                <div class="is-success">
                    {{ session('status') }}
                </div>
            @elseif (session('error'))
                <div class="is-danger">
                    {{ session('status') }}
                </div>
            @endif
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
