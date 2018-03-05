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

    <script>
        $(document).ready(function () {

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
                defaultDate: '2018-02-12',
                navLinks: true, // can click day/week names to navigate views
                editable: false,
                eventLimit: true, // allow "more" link when too many events
                events: [{
                        title: 'All Day Event',
                        start: '2018-02-01'
                    },
                    {
                        title: 'Long Event',
                        start: '2018-02-07',
                        end: '2018-02-10'
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: '2018-02-09T16:00:00'
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: '2018-02-16T16:00:00'
                    },
                    {
                        title: 'Conference',
                        start: '2018-02-11',
                        end: '2018-02-13'
                    },
                    {
                        title: 'Meeting',
                        start: '2018-02-12T10:30:00',
                        end: '2018-02-12T12:30:00'
                    },
                    {
                        title: 'Lunch',
                        start: '2018-02-12T12:00:00'
                    },
                    {
                        title: 'Meeting',
                        start: '2018-02-12T14:30:00'
                    },
                    {
                        title: 'Happy Hour',
                        start: '2018-02-12T17:30:00'
                    },
                    {
                        title: 'Dinner',
                        start: '2018-02-12T20:00:00'
                    },
                    {
                        title: 'Birthday Party',
                        start: '2018-02-13T07:00:00'
                    },
                    {
                        title: 'Click for Google',
                        url: 'http://google.com/',
                        start: '2018-02-28'
                    }
                ]
            });

        });
    </script>
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
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            {{ Auth::user()->name }}
                            <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
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
            {{-- Content here --}}
            <div class="card">
                <div class="card-body">
                    <div id='calendar'></div>
                </div>
            </div>

        </div>
    </main>


</body>

</html>