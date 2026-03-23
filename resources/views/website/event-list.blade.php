@extends('layouts.web')

@section('content')
    <div id="top-border">
        <div id="top-nav-bar"></div>
    </div>
    <div id="events" class="fade-in">
        <h1>Events</h1>
    </div>

    {{-- TODO: Decide specific colors for different majors / different organizers (society, clubs, private, etc.) --}}
    {{-- ^^Makes for a uniform design, can set the colors as variables in app.css - like a theme --}}
    {{-- TODO: Ask Prof. Farid if we can have TAGS (for event types / event affiliation = org || society || etc) as a database element --}}

    {{-- Box for all events to show up --}}

    <div name="create-event"></div>

    <div class="mx-4 rounded-sm border-2 p-4 indent-4">
        @foreach ($events as $event)
            {{-- Card Layout for each event to be displayed --}}
            <div class="mx-2 mt-2 mb-2 rounded-lg border-2 p-2">
                {{-- Event Tilte --}}
                <p class="text-4xl font-bold text-red-300">
                    {{ $event->event_title }}
                </p>

                {{-- Event Organizer Details --}}
                <p class="mt-2 mb-2 p-2 indent-2 text-black">
                    {{-- Name and Email --}}
                    <span>
                        <span class="font-bold underline">Organized By:</span>
                        {{ $event->event_organizer }} (
                        <a
                            class="font-light text-gray-600 hover:text-black hover:underline"
                            href="mailto:{{ $event->event_organizer_email }}"
                        >
                            {{ $event->event_organizer_email }}
                        </a>
                        )
                    </span>

                    {{-- Event Affiliation: Club / Society / Org / etc. --}}
                    @if ($event->event_affiliation != null)
                        ,
                        <span class="font-bold underline">Affiliation:</span>
                        {{ $event->event_affiliation }}
                    @endif
                </p>

                {{-- Slightly Indented div for more details --}}
                <span
                    class="mx-2 mb-1 p-2 text-lg font-semibold text-black underline"
                >
                    Event Details:
                </span>
                <div class="mb-2 ml-8">
                    {{-- Event Details: Category, Date, and Times --}}
                    <ul class="list-inside text-black">
                        <li>
                            <span class="font-semibold">Category:</span>
                            @if ($event->tags)
                                @foreach ($event->tags as $tag)
                                    <span
                                        class="rounded-full border border-blue-200 bg-blue-100 px-2 py-0.5 text-xs font-medium text-blue-800"
                                    >
                                        {{ $tag }}
                                    </span>
                                @endforeach
                            @else
                                <span class="text-sm text-gray-400 italic">
                                    None
                                </span>
                            @endif
                        </li>
                        <li>
                            <span class="font-semibold">Date:</span>
                            {{ $event->event_date }}
                        </li>
                        <li>
                            <span class="font-semibold">Start Time:</span>
                            {{ $event->start_time }}
                        </li>
                        <li>
                            <span class="font-semibold">End Time:</span>
                            {{ $event->end_time }}
                        </li>
                    </ul>
                </div>

                {{-- Event Description --}}
                <span
                    class="mx-2 mb-1 p-2 text-lg font-semibold text-black underline"
                >
                    Description:
                </span>
                <p class="text-gray-600">
                    {{ $event->event_description }}
                </p>
            </div>
        @endforeach

        {{-- Show the pages for other events --}}
        {{ $events->links() }}
    </div>
@endsection
