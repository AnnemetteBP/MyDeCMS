@extends('layouts.manage')

@section('content')
    <div class="container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">{{ $user->name }}</h1>
                <h4 class="subtitle">View User Details</h4>
            </div>
        </div>
        <hr class="mt-t-0">

        <div class="columns">
            <div class="column">
                <div class="field">
                    <label for="name" class="label">Name</label>
                    {{ $user->name }}
                </div>

                <div class="field">
                    <label for="email" class="label">Email</label>
                    {{ $user->email }}
                </div>

                <a href="{{ route('users.edit', $user) }}" class="button is-success"><i class="fa fa-user m-r-10"></i> Edit User</a>
            </div>
        </div>
    </div>
@endsection