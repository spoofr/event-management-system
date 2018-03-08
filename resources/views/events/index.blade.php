<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('fullcalendar/fullcalendar.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('fullcalendar/fullcalendar.print.min.css') }}" rel="stylesheet" media="print" />

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('fullcalendar/lib/moment.min.js') }}"></script>
    <script src="{{ asset('fullcalendar/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('fullcalendar/fullcalendar.min.js') }}"></script>

    {!! $calendar_details->script() !!}

    <style>
        .fc-title {
            color: #fff;
        }

        .fc-time {
            color: #fff;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand">Favapp</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mr-auto">

                </ul>
                <ul class="navbar-nav ml-auto">
                    @guest
                    <li>
                        <a href="{{ route('login') }}" class="nav-link">Sign In</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdownMenuLink" href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a href="{{ route('event.index') }}" class="dropdown-item">Events</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Sign out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>


    <main class="py-4">
        <div class="container">

            {{-- Alert message --}} @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
            @endif {{-- Content here --}}

            <div class="card mb-4">
                <div class="card-body">
                    <form class="form-row" action="{{ route('event.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group col-md-3">
                            <label>Event name: </label>
                            <input type="text" class="form-control" placeholder="eg: Holiday" name="event_name"> 
                            @if ($errors->has('event_name'))
                            <div class="text-danger mt-3">
                                <p class="mb-0">{{ $errors->first('event_name') }}</p>
                            </div>
                            @endif
                        </div>
                        <div class="form-group col-md-3">
                            <label>Start date: </label>
                            <input type="text" class="form-control" placeholder="yyyy-mm-dd" name="start_date">
                            @if ($errors->has('start_date'))
                            <div class="text-danger mt-3">
                                <p class="mb-0">{{ $errors->first('start_date') }}</p>
                            </div>
                            @endif
                        </div>
                        <div class="form-group col-md-3">
                            <label>End date</label>
                            <input type="text" class="form-control" placeholder="yyyy-mm-dd" name="end_date">
                            @if ($errors->has('end_date'))
                            <div class="text-danger mt-3">
                                <p class="mb-0">{{ $errors->first('end_date') }}</p>
                            </div>
                            @endif
                        </div>
                        <div class="form-group col-md-3">
                            <label style="visibility: hidden;">Create</label>
                            <button type="submit" class="btn btn-primary form-control">Create Event!</button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="card">
                <div class="card-body">
                    {!! $calendar_details->calendar() !!}
                </div>
            </div>
        </div>
    </main>


</body>

</html>