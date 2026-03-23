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
            onclick="window.location.href = '/club-edit'"
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
        @foreach ()
        <article id="card">
            <img
                src="{{ asset('Website_Images/Club_images/TUJ_CS_Society.jpg') }}"
                id="club-pic-1"
            />
            <hr />
            <h1 class="text-center text-2xl font-bold text-black">
                TUJ CS Society
            </h1>
            <p class="truncate p-6 text-center text-black"></p>
        </article>
    </div>
@endsection
