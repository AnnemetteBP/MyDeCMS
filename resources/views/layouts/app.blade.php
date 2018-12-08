<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
        <div class="navbar-menu has-shadow">
            <div class="navbar-start m-l-100">
                <a class="navbar-item" href="{{route('home')}}">
                    <img src="{{asset('storage/images/decemsailogo.png')}}" alt="MyDeCMS">
                </a>
                <a href="" class="navbar-item is-tab is-hidden-mobile m-l-20">Learn</a>
                <a href="" class="navbar-item is-tab is-hidden-mobile m-l-10">Discuss</a>
                <a href="" class="navbar-item is-tab is-hidden-mobile m-l-10">Share</a>
            </div>

            <div class="navbar-end m-r-75">
                @if(Auth::guest())
                    <a href="{{ route('login') }}" class="navbar-item is-tab">{{ __('Login') }}</a>
                    <a href="{{ route('register') }}" class="navbar-item is-tab">Sign up</a>
                @else
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a href="{{ route('home') }}" class="navbar-link">
                            Hi user <span class="icon m-r-5"><i class="fa fa-caret-down"></i></span>
                        </a>

                        <div class="navbar-dropdown has-shadow">
                            <a class="navbar-item">
                                <span class="icon m-r-5"><i class="fa fa-fw fa-user-circle-o"></i></span> Profile
                            </a>
                            <a class="navbar-item">
                                <span class="icon m-r-5"><i class="fa fa-fw fa-bell"></i></span> Notifications
                            </a>
                            <a class="navbar-item">
                                <span class="icon m-r-5"><i class="fa fa-fw fa-cog"></i></span> Settings
                            </a>
                            <hr class="navbar-divider">
                            <a href="{{ route('logout') }}" class="navbar-item">
                                <span class="icon m-r-5"><i class="fa fa-fw fa-sign-out"></i></span> Logout
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="m-t-100">
            @yield('content')
        </div>
    </div>
</body>
</html>
