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
                    <div class="field">
                        <label for="name" class="label">Name</label>
                        <p class="control">
                            <input name="name" type="text" class="input" id="name">
                        </p>
                    </div>

                    <div class="field">
                        <label for="email" class="label">Email</label>
                        <p class="control">
                            <input name="email" type="email" class="input" id="email">
                        </p>
                    </div>

                    <div class="field">
                        <label for="password" class="label">Password</label>
                        <p class="control">
                            <input name="password" type="text" class="input" id="password" :disabled="auto_password">
                            <b-checkbox name="auto_generate" class="m-t-10" v-model="auto_password">Auto Generate Password?</b-checkbox>
                        </p>
                    </div>

                    <button class="button is-success">Create User</button>
                </form>
            </div>
        </div>
    </div>
@endsection
<!-- fix disable on checked -->
@section('scripts')
    <script>
        let app = new Vue({
            el: '#app',
            data: {
                auto_password: true
            }
        });
    </script>
@endsection