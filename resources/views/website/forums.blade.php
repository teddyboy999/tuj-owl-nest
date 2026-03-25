@extends('layouts.web')

@section('content')
    <div id="top-border">
        <div id="top-nav-bar"></div>
    </div>

    <div id="forum" class="fade-in">
        <p class="p-4 text-3xl font-bold">Forums</p>
    </div>

    <div name="create-forum"></div>

    <div class="mx-4 my-2 border p-4">
        @foreach ($forum_posts as $forum_post)
            <div
                class="mt-2 mb-2 flex w-full flex-col border-l-4 border-red-300 bg-red-50 px-4 py-3 shadow-sm"
            >
                {{-- Title and Tags --}}
                <div class="flex items-start justify-between">
                    <p class="text-2xl font-semibold text-black">
                        {{ $forum_post->post_title }}
                    </p>

                    {{-- Displaying the Tags Array from your DB --}}
                    <div class="flex gap-1">
                        @if ($forum_post->tags)
                            @foreach ($forum_post->tags as $tag)
                                <span
                                    class="rounded-full bg-red-200 px-2 py-0.5 text-xs text-red-800"
                                >
                                    {{ $tag }}
                                </span>
                            @endforeach
                        @endif
                    </div>
                </div>

                {{-- Author Details --}}
                <p class="mt-1 text-sm text-gray-600">
                    <span class="font-medium">By:</span>
                    {{ $forum_post->post_author }}
                    <span class="text-gray-400">|</span>
                    <a
                        href="mailto:{{ $forum_post->post_author_email }}"
                        class="text-blue-500 hover:underline"
                    >
                        {{ $forum_post->post_author_email }}
                    </a>
                </p>

                {{-- Created At --}}
                <p class="mt-1 text-xs text-gray-400">
                    Posted on:
                    {{ $forum_post->created_at->format('M d, Y @ g:i A') }}
                </p>

                {{-- Content Preview --}}
                <p
                    class="mt-3 border-t border-red-100 pt-2 leading-relaxed text-gray-700"
                >
                    {{ $forum_post->post_content }}
                </p>
            </div>
        @endforeach

        <div class="mt-4">
            {{ $forum_posts->links() }}
        </div>
    </div>
@endsection
