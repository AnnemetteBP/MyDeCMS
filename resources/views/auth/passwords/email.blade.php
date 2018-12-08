@extends('layouts.app')

@section('content')

<div class="container">
    <div class="columns">
        <div class="column is-one-third is-offset-one-third">
            <div class="card">
                <div class="card-content">
                    <h1 class="title is-2">{{ __('Forgot password?') }}</h1>
                    @if (session('status'))
                        <div class="notification is-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="field">
                            <label for="email" class="label">{{ __('E-Mail Address') }}</label>

                            <div class="control">
                                <input id="email" type="email" class="input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button is-fullwidth is-outlined is-primary">
                                    {{ __('Send Password Reset Link') }}
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
                    <i class="fa fa-caret-left"></i>
                    {{ __('Back to login.') }}
                </a>
            @endif
        </div>
    </div>
</div>
@endsection
