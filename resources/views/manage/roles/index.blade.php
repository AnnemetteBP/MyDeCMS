@extends('layouts.manage')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column">
                <h1 class="title">Manage Roles</h1>
            </div>
            <div class="column">
                <a href="{{ route('roles.create') }}" class="button is-primary is-pulled-right"><i class="fa fa-user m-r-10"></i>Create New Role</a>
            </div>
        </div>
        <hr>
        <div class="columns">
            <div class="column">
                <div class="card">
                    <div class="card-content">
                        <table class="table is-fullwidth is-narrow">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Display Name</th>
                                    <th>Description</th>
                                    <th>Date Created</th>
                                    <th>Date Updated</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <th onclick="location.href='{{ route('roles.show', $role) }}'" onMouseOver="this.style.cursor='pointer'">{{ $role->id }}</th>
                                    <td onclick="location.href='{{ route('roles.show', $role) }}'" onMouseOver="this.style.cursor='pointer'">{{ $role->name }}</td>
                                    <td onclick="location.href='{{ route('roles.show', $role) }}'" onMouseOver="this.style.cursor='pointer'">{{ $role->display_name }}</td>
                                    <td onclick="location.href='{{ route('roles.show', $role) }}'" onMouseOver="this.style.cursor='pointer'">{{ $role->description }}</td>
                                    <td onclick="location.href='{{ route('roles.show', $role) }}'" onMouseOver="this.style.cursor='pointer'">{{ $role->created_at->toFormattedDateString() }}</td>
                                    <td onclick="location.href='{{ route('roles.show', $role) }}'" onMouseOver="this.style.cursor='pointer'">{{ $role->updated_at->toFormattedDateString() }}</td>
                                    <td><a href="{{ route('roles.edit', $role->id) }}" class="button is-outlined"><i class="fa fa-user m-r-10"></i> Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $roles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
