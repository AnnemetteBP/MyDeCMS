@if(Auth::guest())
    <a href="{{ route('login') }}" class="navbar-item is-tab">{{ __('Login') }}</a>
    <a href="{{ route('register') }}" class="navbar-item is-tab">Sign up</a>
@else
    <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
            Welcome {{ Auth::user()->name }}
        </a>

        <div class="navbar-dropdown has-shadow">
            <a href="{{ route('manage.dashboard') }}" class="navbar-item">
                <span class="icon m-r-5"><i class="fa fa-fw fa-user-circle-o"></i></span> Dashboard
            </a>
            <a href="{{ route('users.show', Auth::user()) }}"class="navbar-item">
                <span class="icon m-r-5"><i class="fa fa-fw fa-user-circle-o"></i></span> Profile
            </a>
            <a class="navbar-item">
                <span class="icon m-r-5"><i class="fa fa-fw fa-bell"></i></span> Notifications
            </a>
            <a class="navbar-item">
                <span class="icon m-r-5"><i class="fa fa-fw fa-cog"></i></span> Settings
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                <span class="icon m-r-5"><i class="fa fa-fw fa-sign-out"></i></span>
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
@endif