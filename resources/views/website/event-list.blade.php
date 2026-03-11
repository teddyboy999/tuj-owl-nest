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
    {{-- TODO: Ask Prof. Farid if we can have TAGS (for event types / event affiliation = org || society || etc) as a database element --}}

    {{-- Box for all events to show up --}}
    <div class = "p-4 mx-4 indent-4 border-2 rounded-sm">

        @foreach ($events as $event)
            {{-- Card Layout for each event to be displayed --}}
            <div class = "p-2 mt-2 mb-2 mx-2 border-2 rounded-lg ">
                {{-- Event Tilte --}}
                <p class = "text-4xl text-red-300 font-bold ">
                    {{ $event->event_title }}
                </p>

                {{-- Event Organizer Details --}}
                <p class = "p-2 mt-2 mb-2 text-black indent-2">
                    {{-- Name and Email --}}
                    <span>
                        <span class="font-bold underline">Organized By:</span> {{ $event->event_organizer }}
                        (
                            <a class = "hover:underline hover:text-black text-gray-600 font-light" href="mailto:{{ $event->event_organizer_email }}">
                                {{ $event->event_organizer_email }}
                            </a>
                        )
                    </span>

                    {{-- Event Affiliation: Club / Society / Org / etc. --}}
                    @if ($event->event_affiliation != null)
                        , <span class="font-bold underline">in Affiliation with:</span> {{ $event->event_affiliation }}
                    @endif
                </p>

                

                {{-- Slightly Indented div for more details --}}
                <span class="mx-2 mb-1 p-2 text-lg text-black underline font-semibold">Event Details:</span>
                <div class="ml-8 mb-2">
                    {{-- Event Details: Category, Date, and Times --}}
                    <ul class = "text-black list-inside">
                        <li>
                            <span class="font-semibold">Category:</span> {{ $event->event_category }}
                        </li>
                        <li>
                            <span class="font-semibold">Date:</span> {{ $event->event_date }}
                        </li>
                        <li>
                            <span class="font-semibold">Start Time:</span> {{ $event->start_time }}
                        </li>
                        <li>
                            <span class="font-semibold">End Time:</span> {{ $event->end_time }}
                        </li>
                    </ul>
                </div>

                {{-- Event Description --}}
                <p class = "text-gray-600">
                    {{ $event->event_description }}
                </p>
            </div>
        @endforeach

        {{-- Show the pages for other events --}}
        {{ $events->links() }}
    </div>


@endsection
