@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <p>Assalamualaikum {{ Auth::user()->name }}! You are logged in.</p>

                    <a href="{{ route('event.index') }}" class="btn btn-primary">Event</a>
                    <a href="{{ route('solat.index') }}" class="btn btn-primary">Waktu Solat</a>
                    <a class="btn btn-primary" href="{{ route('hadith.create') }}">Hadith</a>

                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">Hadith</div>
                <div class="card-body">
                    @foreach($hadiths as $hadith)
                    <h4 class="text-center mb-2">
                        <u>{{ $hadith->hadith_title }}</u>
                    </h4>
                    <h3 class="text-center">{{ $hadith->hadith_matan }}</h3>
                    <p class="text-center mb-0 mb-1">{{ $hadith->hadith_meaning }}</p>
                    <p class="text-center"><i>{{ $hadith->hadith_narrator }} | {{ $hadith->hadith_sanad }}</i></p>

                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endsection