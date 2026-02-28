@extends('layouts.web')

{{-- Single page to show the content, posts, and replies to only one forum --}}

@section('content')
  {{-- TODO: MOVE THIS TO web.blade.php --}}
  {{-- TODO: ADD PAGINATION TO FORUM REPLIES/POSTS PLEASE --}}
  {{-- Top Navigation and stuff --}}
  <div id = "top-border">
  <div id = "top-nav-bar"></div>

  {{-- Title Box --}}
  <div class = "flex flex-col p-6 mt-4 mb-4 mx-4 my-2 border">
    {{-- Forum Post Title --}}
    <p class = "text-black text-4xl font-bold">
        {{ $forum_post->forum_title }}
    </p>

    {{-- Author and Author Email --}}
    <p class = "text-gray-600 mt-0.5 mb-0.5 indent-3">
        <span class="font-light underline">By:</span> {{ $forum_post->forum_author }}
        (<a class = "hover:underline hover:text-black" href="mailto:{{ $forum_post->forum_author_email }}">{{ $forum_post->forum_author_email }}</a>),
        <span class="font-light underline">Created at:</span> {{ $forum_post->created_at }}
    </p>

    {{-- Created At (Timestamps) --}}
    <p class= "text-gray-400 mt-0.5 mb-1 indent-3"></p>

    {{-- Forum Post Description --}}
    <p class = "text-gray-600 text-xl indent-3">
        {{ $forum_post->forum_content }}
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