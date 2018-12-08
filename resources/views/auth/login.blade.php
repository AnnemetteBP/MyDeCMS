@extends('layouts.app')

@section('content')
@if(session('status'))
    <div class="notification is-success">
        {{ session('status') }}
    </div>
@endif

<div class="container">
    <div class="columns">
        <div class="column is-one-third is-offset-one-third">
            <div class="card">
                <div class="card-content">
                    <h1 class="title is-1">{{ __('Log in') }}</h1>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="field">
                            <label for="email" class="label">{{ __('E-Mail Address') }}</label>

                            <div class="control">
                                <input id="email" type="email" class="input{{ $errors->has('email') ? ' is-danger' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block is-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="field">
                            <label for="password" class="label">{{ __('Password') }}</label>

                            <div class="control">
                                <input id="password" type="password" class="input{{ $errors->has('password') ? ' is-danger' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block is-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="field is-pulled-right">
                            <b-checkbox class="m-t-20" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>{{ __('Remember me?') }}</b-checkbox>
                        </div>

                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button is-outlined is-fullwidth is-primary">
                                    {{ __('Log in') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="columns">
        <div class="column is-one-third is-offset-one-third has-text-centered">
            @if (Route::has('password.request'))
                <a class="is-muted" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
    </div>
</div>
@endsection
