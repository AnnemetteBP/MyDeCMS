@extends('layouts.manage')

@section('title')
    <div class="columns">
        <div class="column">
            <h1 class="title">
                Dashboard
            </h1>
        </div>
    </div>
@endsection

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
@endsection
