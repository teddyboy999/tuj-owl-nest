{{-- Single page to show ONLY the content, posts, and replies to only one forum --}}

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
<div class="mx-4 border-l px-4 pb-20 indent-4">
    <p class="text-3xl font-bold text-black">Replies:</p>
    @if ($posts)
        @foreach ($posts as $post)
            {{-- Inner box for each forum reply --}}
            <div class="mx-4 my-2 grid grid-cols-2 border p-4">
                <div class="grid grid-rows-3 col-start-1 col-end-1">
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
                

                {{-- POST DELETE BUTTON --}}
                <div class="col-start-2 col-end-2 ml-auto">
                    @if(Auth::user())
                        {{-- Check if the event's organizer_id matches with the current logged in user --}}
                        @if (Auth::user()->id == $post->post_author_id)
                            <form action="{{ route("post.destroy", ["forumId" => $forum->id, "postId" => $post->post_id]) }}" method="POST">
                                @csrf 
                                @method('DELETE')

                                <button 
                                    type="submit"
                                    onclick="alert('Are you sure you want to delete this Post? This action cannot be undone! Your post will be gone forever (a long time)!')"
                                    class="text-sm text-white hover:underline bg-red-600 hover:bg-red-500 max-w-20"
                                >
                                    DELETE THIS POST
                                </button>
                            </form>
                        @endif
                    @endif 
                </div>
            </div>
        @endforeach
    @endif
    
    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</div>

{{-- FORUM DELETE BUTTON --}}
<div class="mb-8 py-4 ml-2">
    @if(Auth::user())
        {{-- Check if the event's organizer_id matches with the current logged in user --}}
        @if (Auth::user()->id == $forum->forum_author_id)
            <form action="{{ route("forums.destroy", ["forumId" => $forum->id]) }}" method="POST">
                @csrf 
                @method('DELETE')

                <button 
                    type="submit"
                    onclick="alert('Are you sure you want to delete this forum and ALL of its child posts? This action cannot be undone! Your forum will be gone forever (a long time)!')"
                    class="p-4 text-white hover:underline bg-red-600 hover:bg-red-500 max-w-48"
                >
                    DELETE THIS FORUM
                </button>
            </form>
        @endif
    @endif 
</div>

