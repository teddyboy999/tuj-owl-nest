@extends('layouts.web')

@section('content')
    <div id="top-border">
        <div id="top-nav-bar"></div>
    </div>

    <div id="forum" class="fade-in">
        <p class="p-4 text-3xl font-bold">Forums</p>
    </div>

    <div name="create-forum" class="px-6 py-4"></div>

    <div class="mx-4 my-2 border p-4">
        @foreach ($forum_posts as $forum)
            <div
                class="mt-2 mb-2 flex w-full flex-col border-l-4 border-red-300 bg-red-50 px-4 py-3 shadow-sm"
            >
                {{-- Title and Tags --}}
                <div class="flex items-start justify-between">
                    <p class="text-2xl font-semibold text-black">
                        {{ $forum->forum_title }}
                    </p>

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

                {{-- Author Details --}}
                <p class="mt-1 text-sm text-gray-600">
                    <span class="font-medium">By:</span>
                    {{ $forum->forum_author }}
                    <span class="text-gray-400">|</span>
                    <a
                        href="mailto:{{ $forum->forum_author_email }}"
                        class="text-blue-500 hover:underline"
                    >
                        {{ $forum->forum_author_email }}
                    </a>
                </p>

                {{-- Created At --}}
                <p class="mt-1 text-xs text-gray-400">
                    Posted on:
                    {{ $forum->created_at->format('M d, Y @ g:i A') }}
                </p>

                {{-- Content Preview --}}
                <p
                    class="mt-3 w-3/4 truncate border-t border-red-100 pt-2 leading-relaxed text-gray-700"
                >
                    {{ $forum->forum_content }}
                </p>
                <a
                    class="text-blue-900 underline visited:text-purple-500 hover:text-blue-500 hover:underline"
                    href="{{ route('forums.show', ['forumId' => $forum->id]) }}"
                >
                    ...Read more.
                </a>
            </div>
        @endforeach

        <div class="mt-4">
            {{ $forum_posts->links() }}
        </div>
    </div>
@endsection
