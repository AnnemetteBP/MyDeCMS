@extends('layouts.manage')

@section('content')
    <div class="container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">{{ $role->name }}</h1>
                <h4 class="subtitle">View Role Details</h4>
            </div>
        </div>
        <hr class="mt-t-0">

        <div class="columns">
            <div class="column">
                <div class="field">
                    <label for="name" class="label">Name</label>
                    {{ $role->name }}
                </div>

                <div class="field">
                    <label for="name" class="label">Display Name</label>
                    {{ $role->display_name }}
                </div>

                <div class="field">
                    <label for="name" class="label">Description</label>
                    {{ $role->description }}
                </div>

                <a href="{{ route('roles.edit', $role) }}" class="button is-success"><i class="fa fa-optin-monster m-r-10"></i> Edit Role</a>
            </div>
        </div>
    </div>
@endsection