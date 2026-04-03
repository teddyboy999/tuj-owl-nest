@extends('layouts.web')

@section('content')
    <div id="top-border">
        <div id="top-nav-bar"></div>
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

        {{-- profile-edit button --}}
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
    {{-- Will be the comment section --}}
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
@endsection
