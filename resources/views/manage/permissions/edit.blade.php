@extends('layouts.manage')

@section('title')
    <div class="columns m-t-10">
        <div class="column">
            <h1 class="title">Edit Permission</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="columns">
        <div class="column">
            <form action="{{ route('permissions.update', $permission) }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="field">
                    <label for="name" class="label">Name</label>
                    <p class="control">
                        <input type="text" class="input" name="name" id="name" value="{{ $permission->name }}">
                    </p>
                </div>

                <div class="field">
                    <label for="display-name" class="label">Display Name</label>
                    <p class="control">
                        <input type="text" class="input" name="display_name" id="display-name" value="{{ $permission->display_name }}">
                    </p>
                </div>

                <div class="field">
                    <label for="description" class="label">Description</label>
                    <p class="control">
                        <input type="text" class="input" name="description" id="description" value="{{ $permission->description }}">
                    </p>
                </div>

                <button class="button is-success"><i class="fa fa-optin-monster m-r-10"></i> Save Permission</button>
            </form>
        </div>
    </div>
@endsection