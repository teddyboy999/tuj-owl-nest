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
}
