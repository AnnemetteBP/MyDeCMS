@extends('layouts.manage')

@section('content')
    <div class="container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Edit User</h1>
            </div>
            <div class="column">

            </div>
        </div>
        <form action="{{ route('users.update', $user) }}" method="POST">
            <hr class="m-t-0">
            <div class="columns">
                <div class="column">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="field">
                        <label for="name" class="label">Name</label>
                        <p class="control">
                            <input type="text" class="input" name="name" id="name" value="{{ $user->name }}">
                        </p>
                    </div>

                    <div class="field">
                        <label for="email" class="label">Email</label>
                        <p class="control">
                            <input type="text" class="input" name="email" id="email" value="{{ $user->email }}">
                        </p>
                    </div>

                    <div class="field">
                        <label for="password" class="label" v-if="!auto_password">Password</label>
                        <div class="block">
                            <b-radio name="password_options" v-model="password_options" native-value="keep" class="m-t-10">Do not change password.</b-radio>
                            <br>
                            <b-radio name="password_options" v-model="password_options" native-value="auto" class="m-t-10">Auto-Generate new password.</b-radio>
                            <br>
                            <b-radio name="password_options" v-model="password_options" native-value="manual" class="m-t-10">Manually set new password.</b-radio>
                            <p class="control">
                                <input name="password" type="password" class="input m-t-10" id="password" v-if="password_options == 'manual'" placeholder="Enter password manually">
                            </p>
                        </div>
                    </div>
                </div>
            </div>


            <hr class="m-t-0">
            <div class="columns">
                <div class="column">
                    <h4 class="title">Roles</h4>
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
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->display_name }}</td>
                                <td>{{ $role->description }}</td>
                                <td>
                                    <b-checkbox name="{{ 'active-' . $role->id }}" value="{{ $user->roles->contains($role) ? 'true' : 'false' }}"></b-checkbox>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <button class="button is-success"><i class="fa fa-user m-r-10"></i> Save User</button>
        </form>
    </div>
@endsection