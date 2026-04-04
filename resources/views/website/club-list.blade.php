@extends('layouts.web')

@section('content')
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
    <div id="club-create">
        <button
            onclick="window.location.href = '/club-edit'"
            class="club-create"
        >
            Edit Your Club
        </button>
    </div>

    {{-- Search and filter features --}}
    <div class="mx-4 my-2 border p-4">
        <div class="text-black">
            <form action="{{ route("website.club-list.filter") }}" method="POST">
                @csrf
                <div class="grid grid-rows-2 space-y-2">
                    <h1 class="text-2xl font-bold text-black my-2">Search / Filter Clubs</h1>
                    <div class="grid grid-cols-3">
                        {{-- Search Field (Can be NAME / EMAIL) --}}
                        <div>
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" placeholder=" Name"
                                class="rounded-md bg-gray-200 border-2"
                            />
                        </div>

                        {{-- Search EMAIL --}}
                        <div>
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" placeholder=" Email"
                                class="rounded-md bg-gray-200 border-2"
                            />
                        </div>

                        <div class="flex flex-row-reverse space-x-2 space-x-reverse">
                            {{-- CLEAR FILTERS button --}}
                            <a href="{{ route("website.club-list") }}" class="text-center px-4 py-4 bg-red-700 rounded-2xl text-white hover:underline hover:bg-red-600">
                                Clear Filters
                            </a>
                            
                            {{-- SUBMIT button --}}
                            <button type="submit" class="px-4 py-2 bg-red-700 rounded-2xl text-white hover:underline hover:bg-red-600">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="cards">
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
    <div class="mx-4 mt-4 mb-6">
        {{ $clubs->links() }}
    </div>
@endsection
