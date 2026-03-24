@extends('layouts.web')

{{-- Single page to show the content, posts, and replies to only one forum --}}

@section('content')
  {{-- TODO: MOVE THIS TO web.blade.php --}}
  {{-- TODO: ADD PAGINATION TO FORUM REPLIES/POSTS PLEASE --}}
  {{-- Top Navigation and stuff --}}
  <div id = "top-border">
  <div id = "top-nav-bar"></div>

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
            href="{{ url()->previous() }}"
            class="text-gray-500 hover:text-gray-600 hover:underline"
        >
            Back
        </a>
  </div>

  {{-- Title Box --}}
  <div class = "flex flex-col p-6 mt-4 mb-4 mx-4 my-2 border">
    {{-- Forum Post Title --}}
    <p class = "text-black text-4xl font-bold">
        {{ $forum->forum_title }}
    </p>

    {{-- Author and Author Email --}}
    <p class = "text-gray-600 mt-0.5 mb-0.5 indent-3">
        <span class="font-light underline">By:</span> {{ $forum->forum_author }}
        (<a class = "hover:underline hover:text-black" href="mailto:{{ $forum->forum_author_email }}">{{ $forum->forum_author_email }}</a>),
        <span class="font-light underline">Created at:</span> {{ $forum->created_at }}
    </p>

    {{-- Created At (Timestamps) --}}
    <p class= "text-gray-400 mt-0.5 mb-1 indent-3"></p>

    {{-- Forum Description --}}
    <p class = "text-gray-600 text-xl indent-3">
        {{ $forum->forum_content }}
    </p>
  </div>

  {{-- Nested Box for all forum replies to show up --}}
  <div class = "pb-4 px-4 mx-4 indent-4 border-l">
    <p class = "text-black text-3xl font-bold">
        Replies:
    </p>
    @foreach ($posts as $post)
        {{-- Inner box for each forum reply --}}
        <div class = "p-4 my-2 mx-4 border grid grid-rows-2">
            {{-- Author Details: GRID-ROW-1 --}}
            <div class="row-start-1 row-end-1"> 
                <p class = "text-black text-xl">
                    {{-- Author --}}
                    {{ $post->post_author }}

                    {{-- Author Email --}}
                    <span class = "text-black font-light text-lg">
                        (<a href="mailto:{{ $post->post_author_email }}">{{ $post->post_author_email }}</a>)
                    </span>

                    {{-- Created At --}}
                    <span class = "text-black font-extralight text-sm">
                        at {{ $post->created_at }}
                    </span>

                </p>
            </div>
            
            {{-- Post Content: GRID-ROW-2 --}}
            <div class = "row-start-2 row-end-2">
                <p class = "text-gray-600 indent-1">
                    {{ $post->post_content }}
                </p>
            </div>
        </div>
    @endforeach
  </div>

@endsection