@extends('layouts.app') @section('content')
<div class="container">
    {{-- Alert message --}} @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Hadith</div>

                <div class="card-body">

                    <form class="form-row" action="{{ route('hadith.store') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group col-md-12">
                            <label>Hadith Title: </label>
                            <input type="text" class="form-control" name="hadith_title"> @if ($errors->has('hadith_title'))
                            <div class="text-danger mt-3">
                                <p class="mb-0">{{ $errors->first('hadith_title') }}</p>
                            </div>
                            @endif
                        </div>

                        <div class="form-group col-md-12">
                            <label>Hadith Matan: </label>
                            <input type="text" class="form-control" name="hadith_matan"> @if ($errors->has('hadith_matan'))
                            <div class="text-danger mt-3">
                                <p class="mb-0">{{ $errors->first('hadith_matan') }}</p>
                            </div>
                            @endif
                        </div>

                        <div class="form-group col-md-12">
                            <label>Hadith Meaning: </label>
                            <input type="text" class="form-control" name="hadith_meaning"> @if ($errors->has('hadith_meaning'))
                            <div class="text-danger mt-3">
                                <p class="mb-0">{{ $errors->first('hadith_meaning') }}</p>
                            </div>
                            @endif
                        </div>

                        <div class="form-group col-md-6">
                            <label>Hadith Narrator: </label>
                            <input type="text" class="form-control" name="hadith_narrator"> @if ($errors->has('hadith_narrator'))
                            <div class="text-danger mt-3">
                                <p class="mb-0">{{ $errors->first('hadith_narrator') }}</p>
                            </div>
                            @endif
                        </div>

                        <div class="form-group col-md-6">
                            <label>Hadith Sanad: </label>
                            <input type="text" class="form-control" name="hadith_sanad"> @if ($errors->has('hadith_sanad'))
                            <div class="text-danger mt-3">
                                <p class="mb-0">{{ $errors->first('hadith_sanad') }}</p>
                            </div>
                            @endif
                        </div>

                        <div class="form-group col-md-2">
                            <label style="visibility: hidden;">Create</label>
                            <button type="submit" class="btn btn-primary form-control">Create Hadith!</button>
                        </div>
                    </form>

                </div>
            </div>

            <div class="card mt-2">
                <div class="card-body">
                    <table class="table">

                        <tbody>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Matan</th>
                                <th scope="col">Meaning</th>
                                <th scope="col">Narrator</th>
                                <th scope="col">Sanad</th>
                                <th></th>
                            </tr>
                            @foreach($hadiths as $hadith)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $hadith->hadith_title }}</td>
                                <td>{{ $hadith->hadith_matan }}</td>
                                <td>{{ $hadith->hadith_meaning }}</td>
                                <td>{{ $hadith->hadith_narrator }}</td>
                                <td>{{ $hadith->hadith_sanad }}</td>
                                <td>
                                    <form method="POST" action="{{ route('hadith.destroy', $hadith->id) }}">
                                        @csrf {{ method_field('DELETE') }}
                                        <button class="btn btn-danger btn-sm">Remove</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection