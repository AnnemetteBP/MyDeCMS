@extends('layouts.manage')

@section('title')
    <div class="columns">
        <div class="column">
            <h1 class="title">{{ $permission->name }}</h1>
        </div>
    </div>
@endsection

@section('subtitle')
    <div class="columns">
        <div class="column">
            <h4 class="subtitle">View Permission Details</h4>
        </div>
    </div>
@endsection

@section('content')
    <div class="columns">
        <div class="column">
            <div class="field">
                <label for="name" class="label">Name</label>
                {{ $permission->name }}
            </div>

            <div class="field">
                <label for="name" class="label">Display Name</label>
                {{ $permission->display_name }}
            </div>

            <div class="field">
                <label for="name" class="label">Description</label>
                {{ $permission->description }}
            </div>

            <a href="{{ route('permissions.edit', $permission) }}" class="button is-success"><i class="fa fa-optin-monster m-r-10"></i> Edit Permission</a>
        </div>
    </div>
@endsection