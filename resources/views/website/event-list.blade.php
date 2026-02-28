@extends('layouts.web')

@section('content')
    <div id="top-border">
        <div id="top-nav-bar"></div>
    </div>
    <div id="events">
        <h1>Events</h1>
    </div>

    {{-- TODO: Decide specific colors for different majors / different organizers (society, clubs, private, etc.) --}}
    {{-- ^^Makes for a uniform design, can set the colors as variables in app.css - like a theme --}}
    {{-- TODO: Ask Prof. Farid if we can have TAGS as a database element --}}

    {{-- Box for all events to show up --}}
    <div class = "p-4 mx-4 indent-4 border-2 rounded-sm">

        {{-- Card Layout for each event to be displayed --}}
        <div class = "p-2 mt-2 mb-2 mx-2 border-2 rounded-lg ">
            {{-- Event Tilte --}}
            <p class = "text-4xl text-red-300 font-bold ">
                
            </p>

        </div>

    </div>


@endsection
