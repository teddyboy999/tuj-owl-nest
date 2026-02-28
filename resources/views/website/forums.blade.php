@extends('layouts.web')

@section('content')
  {{-- TODO: MOVE THIS TO web.blade.php --}}
  {{-- Top Navigation and stuff --}}
  <div id = "top-border">
  <div id = "top-nav-bar"></div>

  {{-- Title Box --}}
  <div class = "flex grow p-6 mt-4 mb-4 my-2">
    <p class = "text-black text-6xl font-bold">
      TUJ Owl Nest Forum
    </p>
  </div>

  {{-- Box for all forum posts to show up --}}
  <div class = "p-4 mx-4 my-2 border">
    @foreach($forum_posts as $forum_post)
      {{-- Forum Post Preview Box --}}
      <div class = "grid grid-rows-2 grid-cols-1 px-2 py-2 mt-2 mb-2 bg-red-200 w-full">
        {{-- Title --}}
        <p class = "text-2xl text-black font-semibold"> 
          {{ $forum_post->forum_title }}
        </p>
        {{-- Author and Author Email --}}
        <p class = "text-gray-600 mt-0.5 mb-0.5 indent-3">
          <span class="font-light underline">By:</span> {{ $forum_post->forum_author }}
          (<a class = "hover:underline hover:text-black" href="mailto:{{ $forum_post->forum_author_email }}">{{ $forum_post->forum_author_email }}</a>),
          <span class="font-light underline">Created at:</span> {{ $forum_post->created_at }}
        </p>

        {{-- Created At (Timestamps) --}}
        <p class= "text-gray-400 mt-0.5 mb-1 indent-3">
          
        </p>

        {{-- Description / Forum Post Content --}}
        <p class = "truncate w-full text-gray-500 pt-1">
          {{ $forum_post->forum_content }}
        </p>
      </div>  
    @endforeach()

    {{-- Show links to the next pages returned by paginate --}}
    {{ $forum_posts->links() }}
  </div>

@endsection