@extends('layouts.web')

{{-- Single page to show the content, posts, and replies to only one forum --}}

@section('content')
    
        {{-- Back Link --}}
        <div
            class="mb-4 ml-2 flex w-fit flex-row items-center justify-center p-2"
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
                href="{{ route("website.event-list") }}"
                class="text-gray-500 hover:text-gray-600 hover:underline"
            >
                Back
            </a>
        </div>

        {{-- Title Box --}}
        <div class="mx-4 my-2 mt-4 mb-4 flex flex-col border p-6">
            {{-- Forum Post Title --}}
            <p class="text-4xl font-bold text-black">
                {{ $event->event_title }}
            </p>
            <div class="flex items-start justify-between">
                {{-- Displaying the Tags Array from your DB - (PS: WHICH IDIOT used an AI to do ts?) --}} 
                <div class="flex gap-1">
                    @if ($event->tags)
                        @foreach ($event->tags as $tag)
                            <span
                                class="rounded-full bg-red-200 px-2 py-0.5 text-xs text-red-800"
                            >
                                {{ $tag }}
                            </span>
                        @endforeach
                    @endif
                </div>
            </div>

            {{-- Author and Author Email --}}
            <p class="mt-0.5 mb-0.5 indent-3 text-gray-600">
                <span class="font-light underline">By:</span>
                {{ $event->event_organizer }} (
                <a
                    class="hover:text-black hover:underline"
                    href="mailto:{{ $event->event_organizer_email }}"
                >
                    {{ $event->event_organizer_email }}
                </a>
                ),
            </p>

            {{-- Event Date and Time (Timestamps) --}}
            <p class="mt-0.5 mb-1 indent-3 text-gray-600">
                Date:
                <span class="text-black font-bold">{{ $event->event_date }}</span>
                
            </p>
            <p class="mt-0.5 mb-1 indent-3 text-gray-600">
                Start Time:
                <span class="text-black font-bold">{{ $event->start_time }}</span>
                
            </p>
            <p class="mt-0.5 mb-1 indent-3 text-gray-600">
                End Time:
                <span class="text-black font-bold">{{ $event->end_time }}</span>
            </p>

            {{-- Forum Description --}}
            <p class="indent-3 text-xl text-gray-600">
                {{ $event->event_description }}
            </p>
        </div>


        {{-- EVENT FORUM --}}
        <div class="mx-4 my-2 mt-4 mb-4 flex flex-col border p-2">
            {{-- Title Box --}}
            <div class="mx-2 mt-2 flex flex-col p-2">
                {{-- Forum Post Title --}}
                <p class="text-4xl font-bold text-black">
                    <span class="font=bold">(FORUM)</span>
                    {{ $forum->forum_title }}
                </p>

                {{-- Author and Author Email --}}
                <p class="mt-0.5 mb-0.5 indent-3 text-gray-600">
                    <span class="font-light underline">By:</span>
                    {{ $forum->forum_author }} (
                    <a
                        class="hover:text-black hover:underline"
                        href="mailto:{{ $forum->forum_author_email }}"
                    >
                        {{ $forum->forum_author_email }}
                    </a>
                    ),
                    <span class="font-light underline">Created at:</span>
                    {{ $forum->created_at }}
                </p>

                {{-- Created At (Timestamps) --}}
                <p class="mt-0.5 mb-1 indent-3 text-gray-400"></p>
            </div>

            <div
                id="create-post-root"
                name="create-post"
                class="px-6 py-4"
                data-forum-id="{{ $forum->id }}"
            ></div>

            {{-- Nested Box for all forum replies to show up --}}
            <div class="mx-4 border-l px-4 indent-1 mb-4">
                <p class="text-3xl font-bold text-black">Replies:</p>
                @foreach ($posts as $post)
                    {{-- Inner box for each forum reply --}}
                    <div class="mx-4 my-2 grid grid-rows-2 border p-4">
                        {{-- Author Details: GRID-ROW-1 --}}
                        <div class="row-start-1 row-end-1">
                            <p class="text-xl text-black">
                                {{-- Author --}}
                                {{ $post->post_author }}

                                {{-- Author Email --}}
                                <span class="text-lg font-light text-black">
                                    (
                                    <a href="mailto:{{ $post->post_author_email }}">
                                        {{ $post->post_author_email }}
                                    </a>
                                    )
                                </span>

                                {{-- Created At --}}
                                <span class="text-sm font-extralight text-black">
                                    at {{ $post->created_at }}
                                </span>
                            </p>
                        </div>

                        {{-- Post Content: GRID-ROW-2 --}}
                        <div class="row-start-2 row-end-2">
                            <p class="indent-4 text-gray-600">
                                {{ $post->post_content }}
                            </p>
                        </div>                
                    </div>
                @endforeach

                <div class="mt-4">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>

        <div class="mx-4 my-4 border px-2 pb-20 indent-4">
            {{-- Members going to the event --}}
            <div class="mx-2 my-2 mt-4 mb-4 flex flex-col p-2">
                {{-- Forum Post Title --}}
                <p class="text-4xl font-bold text-black">
                    Interested Members
                </p>

                <div class="text-black">
                    Interested in this event? Join the list of participants now!
                </div>
            </div>

            {{-- BUTTON: Join the event as an attendee (only for logged in users!) --}}
            <div class="mx-2 my-2 mb-4 ml-4">
                <a 
                    href="{{ route("website.event-list.join", ["eventId" => $event->id]) }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                >
                    Join Event
                </a>    
            </div>

            {{-- List of interested users --}}
            <div class="mx-2 my-2 mb-4 ml-6 grid grid-cols-1">
                @foreach ($users as $user)
                    {{-- Each user's card --}}
                    <div class="flex flex-row m-2 p-2 border-2">

                        <div class="flex flex-row space-x-2">
                            {{-- User Profile Image --}}
                            <div class="w-15">
                                <img src="{{ asset('Website_Images/General/default_user_profile_image.png') }}" />
                            </div>

                            <div class="flex flex-col">
                                {{-- User Name --}}
                                <div class="text-3xl font-bold text-black">
                                    <a
                                        class="text-blue-900 underline visited:text-purple-500 hover:text-blue-500 hover:underline"
                                        href="{{ route('community.show', ['userId' => $user->id]) }}"
                                        target="_blank"
                                    >
                                        {{ $user->name }}
                                    </a>
                                </div>

                                {{-- User Email --}}
                                <div class="text-xl font-semibold text-gray-500">
                                    <a
                                        class="text-blue-900 underline visited:text-purple-500 hover:text-blue-500 hover:underline"
                                        href="mailto:{{ $user->email }}"
                                    >
                                        {{ $user->email }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- NOTE TO SELF: use ml-auto to place at end --}}
                        <div class="ml-auto place-self-center items-center">
                            <a
                                class="text-blue-900 underline visited:text-purple-500 hover:text-blue-500 hover:underline"
                                href="{{ route('community.show', ['userId' => $user->id]) }}"
                                target="_blank"
                            >
                                <x-hugeicons-profile-02 class="w-10 h-10 text-black" />
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
    
   
@endsection
