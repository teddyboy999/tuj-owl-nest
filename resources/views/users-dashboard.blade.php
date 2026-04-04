@extends('layouts.web')

@section('content')
    <!-- BACK LINK -->
    <div
        class="mb-4 flex w-fit flex-row items-center justify-center p-2"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            height="24px"
            viewBox="0 -960 960 960"
            width="24px"
            fill="#e3e3e3"
        >
            <path
                d="M560-240 320-480l240-240 56 56-184 184 184 184-56 56Z"
            />
        </svg>
        <a
            href="{{ route('website.community') }}"
            class="text-gray-500 hover:text-gray-600 hover:underline"
        >
            Back
        </a>
    </div>


    {{-- Profile Picture border --}}
    <div
        class="mx-4 mt-2 mb-4 flex flex-row items-center justify-start space-x-1.5"
    >
        {{-- Profile Pic Logic --}}

        <img
            src="{{ $user->profile_photo_path ? asset($user->profile_photo_path) : asset('Website_Images/General/default_user_profile_image.png') }}"
            alt="placeholder"
            class="border-black-600 h-20 w-20 rounded-full border-4"
        />

        <div class="ml-5 flex flex-col">
            <h1 class="mt-5 text-4xl font-bold text-black">
                {{-- Profile Name --}}
                {{ $user->name ?? 'TUJ Student' }}
            </h1>

            <h2 class="text-2xl font-bold text-black">
                {{-- Email --}}
                ({{ $user->email }})
            </h2>

            <p class="m-2 font-bold text-black">
                {{-- Bio --}}
                {{ $user->bio ?? 'No bio added. Please edit profile and add a bio!' }}
            </p>
        </div>

        {{-- profile-edit button: ONLY SHOW FOR CURRENT LOGGED IN USERS --}}
        @if ($isCurrentUser)
            <div class="ml-auto flex flex-col items-end space-y-2">
                <div name="profile-edit"></div>
                {{-- Socials --}}
                <div id="profile-pic-container" class="ml-auto w-20">
                    <img
                        src="{{ asset('Website_Images/instagram.jpg') }}"
                        id="profile-pic"
                        alt="profile-pic"
                    />
                </div>
            </div>
        @endif
    </div>

    <div class="ml-5 flex flex-row gap-15">
        {{-- Year --}}
        <p class="m-2 font-bold text-black italic">
            Year: {{ $user->user_year ?? 'N/A' }}
        </p>

        {{-- Major --}}
        <p class="m-2 font-bold text-black italic">
            Major: {{ $user->user_major ?? 'N/A' }}
        </p>
        {{-- Age --}}
        <p class="m-2 font-bold text-black italic">
            Age: {{ $user->age ?? 'N/A' }}
        </p>
    </div>


    {{-- Active clubs section --}}
    <h1 class="m-2 p-4 text-black text-3xl font-bold">
        Joined Clubs
    </h1>
    @if ( is_null($clubs) ||  count($clubs) == 0)
        {{-- don't show anything pretty much --}}
        <div class="text-xl text-gray-600 mt-2 mb-2 ml-6 px-4">
            No Clubs joined yet.
        </div>
    @else
        <div class="ml-5 flex flex-row gap-15">
            @foreach ($clubs as $club)
                <article id="card">
                    {{-- Check if the logo exists or not, otherwise, we display the placeholder TUJ logo --}}

                    @if (is_null($club->org_logo_url))
                        <img
                            src="{{ asset('Website_Images/tuj_logo.png') }}"
                            alt="placeholder"
                            id="club-pic-1"
                        />
                    @elseif (file_exists(public_path($club->org_logo_url)))
                        <img
                            src="{{ asset($club->org_logo_url) }}"
                            alt="Logo"
                            id="club-pic-1"
                        />
                    @endif

                    <hr />
                    <h1 class="text-center text-2xl font-bold text-black">
                        {{ $club->org_name }}
                    </h1>

                    <a
                        href="{{ route('clubs.show', ['clubId' => $club->id]) }}"
                        class="m-2 text-center text-blue-700 visited:text-purple-500 hover:text-blue-400 hover:underline"
                    >
                        Show more...
                    </a>
                </article>
            @endforeach
        </div>
    @endif
    


    {{-- Events User is participating in --}}
    <h1 class="m-2 p-4 text-black text-3xl font-bold">
        Events Joined
    </h1>
    @if ( is_null($events) ||  count($events) == 0)
        {{-- don't show anything pretty much --}}
        <div class="text-xl text-gray-600 mt-2 mb-2 ml-6 px-4">
            No Events joined yet.
        </div>
    @else
        <div class="mx-4 mb-6 rounded-sm border-2 p-4 indent-4">
            @foreach ($events as $event)
                {{-- Card Layout for each event to be displayed --}}
                <div class="mx-2 mt-2 mb-2 rounded-lg border-2 p-2">
                    {{-- Event Title --}}
                    <p class="text-3xl font-bold text-red-300">
                        {{ $event->event_title }}
                    </p>

                    {{-- Event Organizer Details --}}
                    <p class="p-2 indent-2 text-black">
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
                                {{ $event->event_date }} ; 
                                <span class="font-semibold">Start Time:</span>
                                {{ $event->start_time }} ;
                                <span class="font-semibold">End Time:</span>
                                {{ $event->end_time }}.
                            </li>
                        </ul>
                    </div>

                    {{-- Event Description --}}
                    <span
                        class="mx-2 mb-1 p-2 text-lg font-semibold text-black underline"
                    >
                        Description:
                    </span>
                    <p class="text-gray-600 truncate w-3/4">
                        {{ $event->event_description }}
                    </p>

                    {{-- Show more button to open the event in a detailed page (and to click join!) --}}
                    <a href="{{ route('website.event-list.show', ['eventId' => $event->id]) }}">
                        <span
                            class="mx-2 mb-1 p-2 text-lg font-semibold text-blue-600 underline hover:underline hover:blue-200 visited:text-purple-500"
                        >   
                            Show More
                        </span>
                    </a>
                </div>
            @endforeach

            {{-- Show the pages for other events --}}
            {{ $events->links() }}
        </div>
    @endif





    {{-- Will be the comment section --}}
    <h1 class="m-2 p-4 text-black text-3xl font-bold">
        Profile Comments
    </h1>
    <div
        id="create-comment-root"
        name="create-comment"
        class="px-6 ml-4"
        data-forum-id="{{ $user->id }}"
    ></div>
    @if ( is_null($comments) ||  count($comments) == 0)
        {{-- don't show anything pretty much --}}
        <div class="text-xl text-gray-600 mt-2 mb-8 ml-6 px-4">
            No Comments yet.
        </div>
        
    @else
        <div class="mx-4 border-l px-4 pb-4 indent-4">
            @foreach ($comments as $comment)
                {{-- Inner box for each forum reply --}}
                <div class="mx-4 my-2 grid grid-rows-2 border p-4">
                    {{-- Author Details: GRID-ROW-1 --}}
                    <div class="row-start-1 row-end-1">
                        <p class="text-xl text-black">
                            {{-- Author --}}
                            {{ $comment->post_author }}

                            {{-- Author Email --}}
                            <span class="text-lg font-light text-black">
                                (
                                <a href="mailto:{{ $comment->post_author_email }}">
                                    {{ $comment->post_author_email }}
                                </a>
                                )
                            </span>

                            {{-- Created At --}}
                            <span class="text-sm font-extralight text-black">
                                at {{ $comment->created_at }}
                            </span>
                        </p>
                    </div>

                    {{-- Post Content: GRID-ROW-2 --}}
                    <div class="row-start-2 row-end-2">
                        <p class="indent-1 text-gray-600">
                            {{ $comment->post_content }}
                        </p>
                    </div>
                </div>
            @endforeach

            <div class="mt-4">
                {{ $comments->links() }}
            </div>
        </div>
    @endif
@endsection
