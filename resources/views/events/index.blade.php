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

    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li>
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                            <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('event.index') }}">Events</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

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
                <div class="card-header">Create Events</div>
                <div class="card-body">
                    <form class="form-row" action="{{ route('event.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group col-md-4">
                            <label>Event name: </label>
                            <input type="text" class="form-control" placeholder="eg: Holiday" name="event_name"> @if ($errors->has('event_name'))
                            <div class="text-danger mt-3">
                                <p class="mb-0">{{ $errors->first('event_name') }}</p>
                            </div>
                            @endif
                        </div>
                        <div class="form-group col-md-3">
                            <label>Start date: </label>
                            <input type="text" class="form-control" placeholder="yyyy-mm-dd" name="start_date"> @if ($errors->has('start_date'))
                            <div class="text-danger mt-3">
                                <p class="mb-0">{{ $errors->first('start_date') }}</p>
                            </div>
                            @endif
                        </div>
                        <div class="form-group col-md-3">
                            <label>End date</label>
                            <input type="text" class="form-control" placeholder="yyyy-mm-dd" name="end_date"> @if ($errors->has('end_date'))
                            <div class="text-danger mt-3">
                                <p class="mb-0">{{ $errors->first('end_date') }}</p>
                            </div>
                            @endif
                        </div>
                        <div class="form-group col-md-2">
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