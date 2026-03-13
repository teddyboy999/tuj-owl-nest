@extends('layouts.web')

@section('content')
    {{-- TODO: MOVE THIS TO web.blade.php --}}
    {{-- Top Navigation and stuff --}}
    <div id="top-border">
        <div id="top-nav-bar"></div>
    </div>

    {{-- Title Box --}}
    <div class="my-2 mt-4 mb-4 flex grow p-6">
        <p class="text-6xl font-bold text-black">TUJ Owl Nest Forum</p>
    </div>
    {{-- Create Forum Button --}}
    <div name="create-forum"></div>
    {{-- Box for all forum posts to show up --}}
    <div class="mx-4 my-2 border p-4">
        @foreach ($forum_posts as $forum_post)
            {{-- Forum Post Preview Box --}}
            <div
                class="mt-2 mb-2 grid w-full grid-cols-1 grid-rows-2 bg-red-200 px-2 py-2"
            >
                {{-- Title --}}
                <p class="text-2xl font-semibold text-black">
                    {{ $forum_post->forum_title }}
                </p>
                {{-- Author and Author Email --}}
                <p class="mt-0.5 mb-0.5 indent-3 text-gray-600">
                    <span class="font-light underline">By:</span>
                    {{ $forum_post->forum_author }} (
                    <a
                        class="hover:text-black hover:underline"
                        href="mailto:{{ $forum_post->forum_author_email }}"
                    >
                        {{ $forum_post->forum_author_email }}
                    </a>
                    ),
                    <span class="font-light underline">Created at:</span>
                    {{ $forum_post->created_at }}
                </p>

                {{-- Created At (Timestamps) --}}
                <p class="mt-0.5 mb-1 indent-3 text-gray-400"></p>

                {{-- Description / Forum Post Content --}}
                <p class="w-full truncate pt-1 text-gray-500">
                    {{ $forum_post->forum_content }}
                </p>
            </div>
        @endforeach()

        {{-- Show links to the next pages returned by paginate --}}
        {{ $forum_posts->links() }}
    </div>
@endsection
