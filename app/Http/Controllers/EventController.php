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
            'eventName' => 'required|string|max:255',
            'event_organizer'  => 'required|string|max:255',
            'event_email' => 'required|string|max:255',
            'description' => 'nullable|string',
            'affiliation' => 'required|string',
            'tags' => 'array',
            'eventDate' => 'required|date',
            'startTime' => 'required',
            'endTime' => 'required',
        ]);  

        
        $event = new Event();


        $event->event_title = $validatedData['eventName'];
        $event->event_organizer = $validatedData['event_organizer'];
        $event->event_description = $validatedData['description'];
        $event->event_affiliation = $validatedData['affiliation'];
        $event->event_date = $validatedData['eventDate'];
        $event->start_time = $validatedData['startTime'];
        $event->end_time = $validatedData['endTime'];
        $event->tags = $validatedData['tags'];
        $event->event_organizer_email = $validatedData['event_email'];

        $event->save();

        // TODO: fix make it refresh  the page
        // return redirect('/events-list')->with('success', 'Event created successfully!');
        return response()->json([
        'message' => 'Event created successfully!',
        'event'   => $event
    ], 201);

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

        return redirect()->route('events-list', $event->id)->with('success', 'Event updated successfully.');
    }
}
