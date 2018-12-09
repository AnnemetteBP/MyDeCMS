@extends('layouts.manage')

@section('content')
    <div class="container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Create User</h1>
            </div>
            <div class="column">

            </div>
        </div>
        <hr class="m-t-0">
        <div class="columns">
            <div class="column">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="field">
                        <label for="name" class="label">Name</label>
                        <p class="control">
                            <input type="text" class="input" name="name" id="name">
                        </p>
                    </div>

                    <div class="field">
                        <label for="email" class="label">Email</label>
                        <p class="control">
                            <input type="text" class="input" name="email" id="email">
                        </p>
                    </div>

                    <div class="field" id="app2">
                        <label for="password" class="label" v-if="!auto_password">Password</label>
                        <p class="control">
                            <input name="password" type="text" class="input" id="password" v-if="!auto_password" placeholder="Enter password manually">
                            <b-checkbox name="auto_generate" class="m-t-15" v-model="auto_password">Auto Generate Password?</b-checkbox>
                        </p>
                    </div>

                    <button class="button is-success"><i class="fa fa-user m-r-10"></i> Create User</button>
                </form>
            </div>
        </div>
    </div>
@endsection