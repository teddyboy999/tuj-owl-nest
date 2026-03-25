@extends('layouts.web')

@section('content')
    <div id="top-border">
        <div id="top-nav-bar"></div>
    </div>
    <div id="clubs" class="fade-in">
        <h1>Clubs</h1>
    </div>

    <div id="club-create">
        <button
            onclick="window.location.href = '/new-club'"
            class="club-create"
        >
            Create New Club
        </button>
    </div>
    <div id="cards">
        {{-- Template for Club Cards --}}
        <article id="card">
            <img
                src="{{ asset('Website_Images/Club_images/coding-club-logo.png') }}"
            />
            <hr />
            <h1 class="text-center text-2xl font-bold text-black">
                TUJ Coding Club
            </h1>

            <p class="p-6 text-center text-black">
                Club for all CS majors and Programmers alike! Come and meet
                other fellow coders and strengthen your coding skills!
            </p>
        </article>

        <article id="card">
            <img
                src="{{ asset('Website_Images/Club_images/TUJ_CS_Society.jpg') }}"
                id="club-pic-1"
            />
            <hr />
            <h1 class="text-center text-2xl font-bold text-black">
                TUJ CS Society
            </h1>
            <p class="p-6 text-center text-black">
                Organization that serves to bring together all those interested
                in the CS space
            </p>
        </article>

        {{-- Get All Clubs / Organizations --}}
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

                <p class="truncate p-6 text-center text-black">
                    {{ $club->org_description }}
                </p>

                <a
                    href="{{ route('clubs.show', ['clubId' => $club->id]) }}"
                    class="m-2 text-center text-blue-700 visited:text-purple-500 hover:text-blue-400 hover:underline"
                >
                    Show more...
                </a>
            </article>
        @endforeach
    </div>
@endsection
