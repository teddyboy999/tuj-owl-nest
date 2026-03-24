@extends('layouts.web')

{{-- Single page to show the content, posts, and replies to only one forum --}}

@section('content')
    {{-- TODO: MOVE THIS TO web.blade.php --}}
    {{-- TODO: ADD PAGINATION TO FORUM REPLIES/POSTS PLEASE --}}
    {{-- Top Navigation and stuff --}}
    <div id="top-border">
        <div id="top-nav-bar"></div>

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
                href="/foru"
                class="text-gray-500 hover:text-gray-600 hover:underline"
            >
                Back
            </a>
        </div>

        {{-- Title Box --}}
        <div class="mx-4 my-2 mt-4 mb-4 flex flex-col border p-6">
            {{-- Forum Post Title --}}
            <p class="text-4xl font-bold text-black">
                {{ $forum->forum_title }}
            </p>
            <div class="flex items-start justify-between">
             {{-- Displaying the Tags Array from your DB --}}
            <div class="flex gap-1">
                @if ($forum->tags)
                    @foreach ($forum->tags as $tag)
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

        {{-- Forum Description --}}
        <p class="indent-3 text-xl text-gray-600">
            {{ $forum->forum_content }}
        </p>
    </div>

    <div
        id="create-post-root"
        name="create-post"
        class="px-6 py-4"
        data-forum-id="{{ $forum->id }}"
    ></div>

    {{-- Nested Box for all forum replies to show up --}}
    <div class="mx-4 border-l px-4 pb-4 indent-4">
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
                    <p class="indent-1 text-gray-600">
                        {{ $post->post_content }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
