<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // for event listings 
    public function index()
    {
        $event = new Event();
        $events = $event->getPaginatedEvents(15);

        return view('website.event-list', ['events' => $events]);
    }


    // CREATING NEW EVENTS
    /// adds an event to the table if it doesn't already exist
    public function createEvent(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            "name" => "required|unique",
            "description" => "required",
            "date" => "required|date",
            "start_time" => "required",
            "end_time" => "required"
        ]);  

        // add to event table
        $event = Event::create($validatedData);

        return redirect('/events-list')->with('success', 'Event created successfully!');

    }

    // UPDATING Existing Events
    // updates an existing event
    public function updateEvent(Request $request, Event $event)
    {
        // TODO: add id in the route (pass event id)
        $validatedData = $request->validate([
            "name" => "required|unique",
            "description" => "required",
            "date" => "required|date",
            "start_time" => "required",
            "end_time" => "required"
        ]);

        $event->fill($validatedData);

        $event->save();

        return redirect()->route('events-list.show', $event->id)->with('success', 'Event updated successfully.');
    }
}
