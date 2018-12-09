@extends('layouts.manage')

@section('title')
    <div class="columns">
        <div class="column">
            <h1 class="title">Manage Permissions</h1>
        </div>
        <div class="column">
            <a href="{{ route('permissions.create') }}" class="button is-primary is-pulled-right"><i class="fa fa-user m-r-10"></i>Create New Permission</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="columns">
        <div class="column">
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
                @foreach($permissions as $permission)
                    <tr>
                        <th onclick="location.href='{{ route('permissions.show', $permission) }}'" onMouseOver="this.style.cursor='pointer'">{{ $permission->id }}</th>
                        <td onclick="location.href='{{ route('permissions.show', $permission) }}'" onMouseOver="this.style.cursor='pointer'">{{ $permission->name }}</td>
                        <td onclick="location.href='{{ route('permissions.show', $permission) }}'" onMouseOver="this.style.cursor='pointer'">{{ $permission->display_name }}</td>
                        <td onclick="location.href='{{ route('permissions.show', $permission) }}'" onMouseOver="this.style.cursor='pointer'">{{ $permission->description }}</td>
                        <td onclick="location.href='{{ route('permissions.show', $permission) }}'" onMouseOver="this.style.cursor='pointer'">{{ $permission->created_at->toFormattedDateString() }}</td>
                        <td onclick="location.href='{{ route('permissions.show', $permission) }}'" onMouseOver="this.style.cursor='pointer'">{{ $permission->updated_at->toFormattedDateString() }}</td>
                        <td><a href="{{ route('permissions.edit', $permission->id) }}" class="button is-outlined"><i class="fa fa-user m-r-10"></i> Edit</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('footer')
    <div class="card-footer">
        {{ $permissions->links() }}
    </div>
@endsection