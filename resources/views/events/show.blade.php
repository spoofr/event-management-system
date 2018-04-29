@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <b>{{ $event->event_name }}</b>
                </div>
                <div class="card-body">
                    <p>Event ID:
                        <b>{{ $event->id }}</b>
                    </p>
                    <p>Event Name:
                        <b>{{ $event->event_name }}</b>
                    </p>
                    <p>Start Date:
                        <b>{{ $event->start_date }}</b>
                    </p>
                    <p>End Date:
                        <b>{{ $event->end_date }}</b>
                    </p>

                    <a href="{{ route('event.index') }}" class="btn btn-primary">Back</a>
                    <a href="#" class="btn btn-danger float-right" onclick="event.preventDefault();document.getElementById('delete-event-form-{{ $event->id }}').submit();">Remove</a>
                    <button type="button" class="btn btn-primary float-right mr-1" data-toggle="modal" data-target="#update-event">
                        Update
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="update-event" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Event - {{ $event->event_name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="update-event-form" action="{{ route('event.update', $event->id) }}" method="POST">
                                        @csrf {{ method_field('PATCH') }}
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Event ID:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" readonly class="form-control-plaintext" name="id" value="{{ $event->id }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Event Name: </label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="event_name" value="{{ $event->event_name }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Start date: </label>
                                                <div class="col-sm-10">
                                                    <input type="date" class="form-control" name="start_date" value="{{ $event->start_date }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">End Name: </label>
                                                <div class="col-sm-10">
                                                    <input type="date" class="form-control" name="end_date" value="{{ $event->end_date }}">
                                                </div>
                                            </div>
                                        </form>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="event.preventDefault();
                                    document.getElementById('update-event-form').submit();">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form id="delete-event-form-{{ $event->id }}" method="POST" action="{{ route('event.destroy', $event->id) }}">
    @csrf {{ method_field('DELETE') }}
</form>
@endsection