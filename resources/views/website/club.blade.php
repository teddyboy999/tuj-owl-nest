@extends('layouts.web')

@section('content')
    {{-- Banner / Image Scroll layer --}}
    <div class="text-black">BANNER GOES HERE</div>

    {{-- LOGO AND TITLE --}}
    <div class="mt-2 mb-4 flex flex-row space-x-1.5">
        {{-- LOGO --}}
        <img
            src="{{ asset('Website_Images/Club_images/TUJ_CS_Society.jpg') }}"
            width="50em"
        />

        {{-- TITLE --}}
        <h1 class="text-4xl font-bold text-black">
            {{ $club->org_name }}
        </h1>
    </div>

    <div class="p-2">
        {{-- DESCRIPTION --}}
        <p class="m-2 text-black">
            {{ $club->org_description }}
        </p>

        <h1 class="text-2xl font-semibold text-black">More Details:</h1>
        <ul class="text-black">
            <li>Meeting Times:</li>
        </ul>
    </div>
@endsection
