@extends('layouts.web')

@section('content')
    {{-- Outer Container for entire page --}}
    <div class="p-6">
        {{-- BACK LINK --}}
        <a
            href=" {{ route('website.club-list') }}"
            class="text-gray-500 hover:text-gray-600 hover:underline"
        >
            Back
        </a>

        {{-- Banner / Image Scroll layer --}}
        <div class="text-black">BANNER GOES HERE</div>

        {{-- LOGO AND TITLE --}}
        <div class="mt-2 mb-4 flex flex-row space-x-1.5">
            {{-- LOGO: Check if it exists, otherwise just display placeholder --}}

            @if (is_null($club->org_logo_url))
                <img
                    src="{{ asset('Website_Images/tuj_logo.png') }}"
                    alt="placeholder"
                    class="w-20"
                />
            @elseif (file_exists(public_path($club->org_logo_url)))
                <img
                    src="{{ asset($club->org_logo_url) }}"
                    alt="Logo"
                    class="w-20"
                />
            @endif

            {{-- TITLE --}}
            <h1 class="text-4xl font-bold text-black">
                {{ $club->org_name }}
            </h1>
        </div>

        <div class="p-2">
            {{-- DESCRIPTION --}}
            <p class="m-2 text-black">
                {{ $club->org_description }}
            </p>

            <h1 class="text-2xl font-semibold text-black">Contact:</h1>
            <div class="mt-2 mb-4 flex flex-row space-x-2">
                {{-- LEADER INFORMATION --}}
                <ul class="text-xl font-medium text-black">
                    <li>
                        Leader:
                        <span class="font-bold">
                            {{ $club->org_leader_name }}
                        </span>
                    </li>
                    <li>
                        Email:
                        <span class="font-bold">
                            <a
                                href="mailto:{{ $club->org_leader_email }}"
                                class="text-blue-700 visited:text-purple-500 hover:text-blue-300 hover:underline"
                            >
                                {{ $club->org_leader_email }}
                            </a>
                        </span>
                    </li>
                </ul>
                {{-- CO LEADER INFORMATION --}}
                <ul class="text-xl font-medium text-black">
                    <li>
                        Co-Leader:
                        <span class="font-bold">
                            {{ $club->org_co_leader_name }}
                        </span>
                    </li>
                    <li>
                        Email:
                        <span class="font-bold">
                            <a
                                href="mailto:{{ $club->org_co_leader_email }}"
                                class="text-blue-700 visited:text-purple-500 hover:text-blue-300 hover:underline"
                            >
                                {{ $club->org_co_leader_email }}
                            </a>
                        </span>
                    </li>
                </ul>
            </div>

            {{-- MORE DETAILS --}}
            <h1 class="text-2xl font-semibold text-black">More Details:</h1>
            <ul class="indent-2 text-black">
                <li>
                    Meeting Times:
                    <span class="font-bold">
                        {{ $club->org_meeting_time }}
                    </span>
                </li>
                <li>
                    Meeting Location:
                    <span class="font-bold">
                        {{ $club->org_meeting_location }}
                    </span>
                </li>
                <li>
                    Active Semester:
                    <span class="font-bold">
                        {{ $club->org_semester }}
                    </span>
                </li>
                <li>
                    Number of Members:
                    <span class="font-bold">
                        {{ $club->org_number_of_members }}
                    </span>
                </li>
                <li>
                    <span class="underline">Club Socials:</span>
                    <ul class="p-2 indent-3">
                        <li>
                            Website:
                            <span class="font-bold">
                                {{ $club->org_website ?? 'None' }}
                            </span>
                        </li>
                        <li>
                            Instagram:
                            {{-- value ?? checks if its null, if it is, the default text next to ?? is displated --}}
                            <span class="font-bold">
                                {{ $club->org_instagram ?? 'None' }}
                            </span>
                        </li>
                        <li>
                            Discord:
                            <span class="font-bold">
                                {{ $club->org_discord ?? 'None' }}
                            </span>
                        </li>
                        <li>
                            Twitter:
                            <span class="font-bold">
                                {{ $club->org_twitter ?? 'None' }}
                            </span>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="mx-4 my-4 border px-2 pb-20 indent-4">
            {{-- Members in club --}}
            <div class="mx-2 my-2 mt-4 mb-4 flex flex-col p-2">
                {{-- Forum Post Title --}}
                <p class="text-4xl font-bold text-black">Active Members</p>

                <div class="text-black">Interested in this Club? Join Now!</div>
            </div>

            {{-- BUTTON: Join the event as an attendee (only for logged in users!) --}}
            <div class="mx-2 my-2 mb-4 ml-4">
                <a
                    href="{{ route('website.clubs-list.join', ['clubId' => $club->id]) }}"
                    class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700"
                >
                    Join Event
                </a>
            </div>

            {{-- List of interested users --}}
            <div class="mx-2 my-2 mb-4 ml-6 grid grid-cols-1">
                @foreach ($users as $user)
                    {{-- Each user's card --}}
                    <div class="m-2 flex flex-row border-2 p-2">
                        <div class="flex flex-row space-x-2">
                            {{-- User Profile Image --}}
                            <div class="w-15">
                                <img
                                    src="{{ asset('Website_Images/General/default_user_profile_image.png') }}"
                                />
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
                                <div
                                    class="text-xl font-semibold text-gray-500"
                                >
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
                        <div class="ml-auto items-center place-self-center">
                            <a
                                class="text-blue-900 underline visited:text-purple-500 hover:text-blue-500 hover:underline"
                                href="{{ route('community.show', ['userId' => $user->id]) }}"
                                target="_blank"
                            >
                                <x-hugeicons-profile-02
                                    class="h-10 w-10 text-black"
                                />
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
