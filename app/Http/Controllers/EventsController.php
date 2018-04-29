<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Calendar;
use App\Event;

class EventsController extends Controller
{
    public function index()
    {   
        // $events = Event::all();
        // return view('events.index', compact('events'));

        // https://github.com/maddhatter/laravel-fullcalendar
        $events = Event::get();
        $event_list = [];
        foreach($events as $key => $event){
            $event_list[] = Calendar::event(
                $event->event_name, // Event title
                true, // Full day event?
                new \DateTime($event->start_date), // Start date
                new \DateTime($event->end_date.' +1 day'), // End date
                $event->id, // Optional event id
                    [
                        'color' => '#f05050',
                        'url' => '/events/' . $event->id,
                    ]
            );
        }
        $calendar_details = Calendar::addEvents($event_list);

        // Simply return page
        return view('events.index', compact('calendar_details'));
    }

    public function store(Request $request)
    {   
        // Validation, untuk pastikan data yang user masukkan betul
        $this->validate($request, [
            'event_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);
        
        // Create new object instance
        $event = new Event; 

        // Assign data in request (data yg user masukkan dalam form) to the new object
        $event->event_name = $request->event_name;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;

        // Save to database
        $event->save();

        // Create session to flash message 
        Session::flash('success', 'Event created!');

        // Return views
        return redirect()->route('event.index');
    }

    public function show($id)
    {
        $event = Event::find($id);
        return view('events.show', compact('event'));
    }

    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        Session::flash('success', 'Event has been successfully deleted!');
        return redirect()->route('event.index');
    }
    public function update(Request $request, $id) 
    {
        $event = Event::find($id);
        $event->event_name = $request->event_name;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->save();
        Session::flash('success', 'Event updated!');
        return redirect()->route('event.index');
    }
}