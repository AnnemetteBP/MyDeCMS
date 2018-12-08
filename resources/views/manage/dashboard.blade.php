@extends('layouts.manage')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-half is-offset-one-quarter">
                <div class="card">
                    <div class="card-content">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
