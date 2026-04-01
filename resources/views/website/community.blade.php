@extends('layouts.web')

@section('content')
    <div id="forum" class="fade-in">
        <p class="p-4 text-3xl font-bold">Community</p>
    </div>

    {{-- Main Container --}}
    <div class="mx-4 my-2 border p-4">
        <div class="grid grid-cols-1">
            @foreach ($users as $user)
                {{-- Each user's card --}}
                <div class="flex flex-row m-2 p-2 border-2">

                    <div class="flex flex-row space-x-2">
                        {{-- User Profile Image --}}
                        <div class="w-15">
                            <img src="{{ asset('Website_Images/General/default_user_profile_image.png') }}" />
                        </div>

                        <div class="flex flex-col">
                            {{-- User Name --}}
                            <div class="text-3xl font-bold text-black">
                                <a
                                    class="text-blue-900 underline visited:text-purple-500 hover:text-blue-500 hover:underline"
                                    href="{{ route('community.show', ['userId' => $user->id]) }}"
                                >
                                    {{ $user->name }}
                                </a>
                            </div>

                            {{-- User Email --}}
                            <div class="text-xl font-semibold text-gray-500">
                                <a
                                    class="text-blue-900 underline visited:text-purple-500 hover:text-blue-500 hover:underline"
                                    href="mailto:{{ $user->mail }}"
                                >
                                    {{ $user->email }}
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- NOTE TO SELF: use ml-auto to place at end --}}
                    <div class="ml-auto place-self-center items-center">
                        <a
                            class="text-blue-900 underline visited:text-purple-500 hover:text-blue-500 hover:underline"
                            href="{{ route('community.show', ['userId' => $user->id]) }}"
                        >
                            <x-hugeicons-profile-02 class="w-10 h-10 text-black" />
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
