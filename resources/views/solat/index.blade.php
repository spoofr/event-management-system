<!--
Created By : Afif Zafri
Date : 17/05/2016
Contact Me : http://fb.me/afzafri
Using my own PHP API, see "api.php"
References :  http://ijat.my/e-solat-xmljsonp-api, http://stackoverflow.com/
Original PHP Project : https://github.com/afzafri/Waktu-Solat/
Sensei : Mohd Shahril, thanks for zone.json :P
-->
<html>

<head>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="./template/images/favicon.ico">
    <title>Prayer Time</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

</head>

<body>
    <div class="se-pre-con"></div>
    <!-- loading spinner -->
    <div class="container">
        <center>

            <div class="row">
                <h1>
                    <font color="black">Prayer Time</font>
                </h1>
                <hr>
            </div>

            <div class="row">
                <div class="col-md-6 center-block">
                    <div class="panel panel-success">
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                            <!-- pilih negeri -->
                            <select name='pilih_negeri' id='pilih_negeri' class="form-control">
                                <option value=''>Select States</option>
                                <option value="Johor">Johor</option>
                                <option value="Kedah">Kedah</option>
                                <option value="Kelantan">Kelantan</option>
                                <option value="Kuala Lumpur">Kuala Lumpur</option>
                                <option value="Labuan">Labuan</option>
                                <option value="Melaka">Melaka</option>
                                <option value="Negeri_Sembilan">Negeri Sembilan</option>
                                <option value="Pahang">Pahang</option>
                                <option value="Perak">Perak</option>
                                <option value="Perlis">Perlis</option>
                                <option value="Pulau_Pinang">Pulau Pinang</option>
                                <option value="Putrajaya">Putrajaya</option>
                                <option value="Sabah">Sabah</option>
                                <option value="Sarawak">Sarawak</option>
                                <option value="Selangor">Selangor</option>
                                <option value="Terengganu">Terengganu</option>
                            </select>

                            <!-- pilih zone -->
                            <select id='pilih_zone' name='pilih_zone' class="form-control">
                                <option value=''>Select Zone</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>


                <!-- append result here -->
                <div id="results"></div>


        </center>
    </div>
</body>

</html>

{{-- 
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Malaysia Prayer Time</div>

               
            </div>
        </div>
    </div>
</div>
@endsection --}}

{{-- 
<html>

<head>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Prayer Time</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

</head>

<body>
    <div class="se-pre-con"></div>
    <!-- loading spinner -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Malaysia Prayer Time</div>
                    <div class="card-body">
                        <select name="pilih_negeri" id="pilih_negeri" class="custom-select custom-select-lg mb-2">
                            <option selected>Select State</option>
                            <option value="Johor">Johor</option>
                            <option value="Kedah">Kedah</option>
                            <option value="Kelantan">Kelantan</option>
                            <option value="Kuala Lumpur">Kuala Lumpur</option>
                            <option value="Labuan">Labuan</option>
                            <option value="Melaka">Melaka</option>
                            <option value="Negeri_Sembilan">Negeri Sembilan</option>
                            <option value="Pahang">Pahang</option>
                            <option value="Perak">Perak</option>
                            <option value="Perlis">Perlis</option>
                            <option value="Pulau_Pinang">Pulau Pinang</option>
                            <option value="Putrajaya">Putrajaya</option>
                            <option value="Sabah">Sabah</option>
                            <option value="Sarawak">Sarawak</option>
                            <option value="Selangor">Selangor</option>
                            <option value="Terengganu">Terengganu</option>
                        </select>

                        <select id="pilih_zone" name="pilih_zone" class="custom-select custom-select-lg">
                            <option selected>Select Zone</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <!-- append result here -->
                    <div id="results"></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html> --}}