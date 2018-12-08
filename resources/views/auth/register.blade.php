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
                    <h1 class="title is-1">Sign up</h1>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="field">
                            <label for="name" class="label">{{ __('Name') }}</label>

                            <div class="control">
                                <input id="name" type="text" class="input{{ $errors->has('name') ? ' is-danger' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block is-danger" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="field">
                            <label for="email" class="label">{{ __('E-Mail Address') }}</label>

                            <div class="control">
                                <input id="email" type="email" class="input{{ $errors->has('email') ? ' is-danger' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block is-danger" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="columns">
                            <div class="column">
                                <div class="field">
                                    <label for="password" class="label">{{ __('Password') }}</label>
                                    <div class="control">
                                        <input id="password" type="password" class="input{{ $errors->has('password') ? ' is-danger' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block is-danger" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>
                                    <div class="control">
                                        <input id="password-confirm" type="password" class="input" name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button is-outlined is-fullwidth is-primary">
                                    {{ __('Register') }}
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
            @if (Route::has('login'))
                <a class="is-muted" href="{{ route('login') }}">
                    {{ __('Already a user?') }}
                </a>
            @endif
        </div>
    </div>
</div>
@endsection
