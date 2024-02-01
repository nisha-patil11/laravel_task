@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
            <div class="row p-2">
                <div class="d-grid gap-2 d-md-block">
                <a href="{{ route('client.index') }}" class="btn btn-primary">Client</a>
                <a href="{{ route('employee.index') }}" class="btn btn-primary">Employee</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
