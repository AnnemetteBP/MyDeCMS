@extends('layouts.manage')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-content">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                Dashboard
            </div>
        </div>
    </div>
@endsection
