@extends('layouts.manage')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column">
                <h1 class="title">Manage Users</h1>
            </div>
            <div class="column">
                <a href="{{ route('users.create') }}" class="button is-primary is-pulled-right"><i class="fa fa-user m-r-10"></i>Create New User</a>
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
                                    <th>Email</th>
                                    <th>Date Created</th>
                                    <th>Date Updated</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th onclick="location.href='{{ route('users.show', $user) }}'" onMouseOver="this.style.cursor='pointer'">{{ $user->id }}</th>
                                    <td onclick="location.href='{{ route('users.show', $user) }}'" onMouseOver="this.style.cursor='pointer'">{{ $user->name }}</td>
                                    <td onclick="location.href='{{ route('users.show', $user) }}'" onMouseOver="this.style.cursor='pointer'">{{ $user->email }}</td>
                                    <td onclick="location.href='{{ route('users.show', $user) }}'" onMouseOver="this.style.cursor='pointer'">{{ $user->created_at->toFormattedDateString() }}</td>
                                    <td onclick="location.href='{{ route('users.show', $user) }}'" onMouseOver="this.style.cursor='pointer'">{{ $user->updated_at->toFormattedDateString() }}</td>
                                    <td><a href="{{ route('users.edit', $user->id) }}" class="button is-outlined"><i class="fa fa-user m-r-10"></i> Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
