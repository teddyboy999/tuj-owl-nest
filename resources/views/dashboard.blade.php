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
            src="data:image/jpeg;base64,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"
            alt="placeholder"
            class="w-40"
        />

        <div class="ml-5 flex flex-col">
            <h1 class="mt-5 text-4xl font-bold text-black">
                {{-- Profile Name --}}
                Alonzo
            </h1>

            <h2 class="text-2xl font-bold text-black">
                {{-- Email --}}
                (arico.glis@gmail.com)
            </h2>

            <p class="m-2 font-bold text-black">
                {{-- Bio --}}
                I like women. Oh yeah, I also study Computer Science too I guess
            </p>
        </div>

        {{-- Socials --}}
        <img
            src="{{ asset('Website_Images/Owl-logo.png') }}"
            class="ml-auto w-20"
        />
    </div>

    <div class="ml-5 flex flex-row gap-15">
        {{-- Year --}}
        <p class="m-2 font-bold text-black italic">Year: 4th Year</p>

        {{-- Major --}}
        <p class="m-2 font-bold text-black italic">Major: Computer Science</p>
        {{-- Age --}}
        <p class="m-2 font-bold text-black italic">Age: 21</p>
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
