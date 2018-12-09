@extends('layouts.manage')

@section('title')
    <div class="columns">
        <div class="column">
            <h1 class="title">{{ $role->name }}</h1>
        </div>
    </div>
@endsection

@section('subtitle')
    <div class="columns">
        <div class="column">
            <h4 class="subtitle">View Role Details</h4>
        </div>
    </div>
@endsection

@section('content')
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

    <hr class="m-t-0">
    <div class="columns">
        <div class="column">
            <h4 class="title">Permissions</h4>
            <table class="table is-fullwidth is-narrow">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Display Name</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                @foreach($role->permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->display_name }}</td>
                        <td>{{ $permission->description }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection