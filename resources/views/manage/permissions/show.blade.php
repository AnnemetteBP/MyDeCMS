@extends('layouts.manage')

@section('content')
    <div class="container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">{{ $permission->name }}</h1>
                <h4 class="subtitle">View Permission Details</h4>
            </div>
        </div>
        <hr class="mt-t-0">

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
    </div>
@endsection