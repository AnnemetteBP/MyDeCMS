@extends('layouts.manage')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column">
                <h1 class="title">Manage Users</h1>
            </div>
            <div class="column">
                <a href="{{ route('users.create') }}" class="button is-primary is-pulled-right"><i class="fa fa-user-add m-r-10"></i>Create New User</a>
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
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th>{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->toFormattedDateString() }}</td>
                                    <td><a href="{{ route('users.edit', $user->id) }}" class="button is-outlined">Edit</a></td>
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
