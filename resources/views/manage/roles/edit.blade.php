@extends('layouts.manage')

@section('title')
    <div class="columns">
        <div class="column">
            <h1 class="title">Edit Role</h1>
        </div>
    </div>
@endsection

@section('content')
    <form action="{{ route('roles.update', $role) }}" method="POST">
        <hr class="m-t-0">
        <div class="columns">
            <div class="column">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="field">
                    <label for="name" class="label">Name (Can not be edited)</label>
                    <p class="control">
                        <input type="text" class="input" name="name" id="name" disabled value="{{ $role->name }}">
                    </p>
                </div>

                <div class="field">
                    <label for="display-name" class="label">Display Name</label>
                    <p class="control">
                        <input type="text" class="input" name="display_name" id="display-name" value="{{ $role->display_name }}">
                    </p>
                </div>

                <div class="field">
                    <label for="description" class="label">Description</label>
                    <p class="control">
                        <input type="text" class="input" name="description" id="description" value="{{ $role->description }}">
                    </p>
                </div>
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
                        <th>Active</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->display_name }}</td>
                            <td>{{ $permission->description }}</td>
                            <td>
                                <b-checkbox name="{{ 'active-' . $permission->id }}" value="{{ $role->permissions->contains($permission) ? 'true' : 'false' }}"></b-checkbox>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <button class="button is-success"><i class="fa fa-optin-monster m-r-10"></i> Save Role</button>
    </form>
@endsection