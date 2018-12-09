@extends('layouts.manage')

@section('content')
    <div class="container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Edit Role</h1>
            </div>
            <div class="column">

            </div>
        </div>
        <hr class="m-t-0">
        <div class="columns">
            <div class="column">
                <form action="{{ route('roles.update', $role) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="field">
                        <label for="name" class="label">Name</label>
                        <p class="control">
                            <input type="text" class="input" name="name" id="name" value="{{ $role->name }}">
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

                    <button class="button is-success"><i class="fa fa-optin-monster m-r-10"></i> Save Role</button>
                </form>
            </div>
        </div>
    </div>
@endsection