@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>You are logged in!</p>

                    <a href="{{ route('event.index') }}" class="btn btn-primary">Event</a>
                    <a href="{{ route('solat.index') }}" class="btn btn-primary">Waktu Solat</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
