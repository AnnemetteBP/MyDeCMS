@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-half is-offset-one-quarter">
                <div class="card">
                    <div class="card-content">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="content">
                            <h1 class="title is-2">{{ config('app.name') }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection