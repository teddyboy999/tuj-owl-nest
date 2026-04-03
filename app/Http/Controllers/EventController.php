<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventParticipant;
use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EventController extends Controller
{
    // for event listings 
    public function index()
    {
        $event = new Event();
        $events = $event->getPaginatedEvents(15);

        return view('website.event-list', ['events' => $events]);
    }

    // show individual event
    public function show($eventId)
    {
        // If your filter is the primary key of your table, you can just use find() to find the record
        $event = Event::find($eventId);

        // get the forum linked to this event
        $forum_obj = new Forum();
        $forum = $forum_obj->find($event->forum_id);
        $posts = $forum_obj->getChildPosts($event->forum_id, 5); // paginated by 5
        
        // Get members interested in event (needs separate table)
        $event_participant = new EventParticipant();
        $attendees = $event_participant->getPaginatedInterestedUsers($eventId, 10);

        return view("website.event", 
                    ["event" => $event, 
                     "forum" => $forum, 
                     "posts" => $posts, 
                     "users" => $attendees] // users because i copied code from community.blade
                   );
    }

    // function that's called when users click "join event" button
    public function joinEvent($eventId)
    {
        $user = Auth::user();

        // if the user is authenticated, then join the event!
        if ($user)
        {
            $event_participant = new EventParticipant();
            $event_participant->user_id = $user->id;
            $event_participant->event_id = $eventId;

            $event_participant->save();
        }

        // just refresh the page
        return redirect()->route('website.event-list.show', ['eventId' => $eventId]);
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

        // Create new forum for this event
        $forum = new Forum();
        $forum->forum_author = $validatedData["event_organizer"];
        $forum->forum_author_email = $validatedData["event_email"];
        $forum->forum_title = $validatedData["eventName"] . " Forum";
        $forum->tags = $validatedData['tags'];
        $forum->forum_content = $validatedData["description"];
        $forum->save(); // insert into forum

        $event->forum_id = $forum->id;

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
