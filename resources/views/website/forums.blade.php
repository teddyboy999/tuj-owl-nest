@extends('layouts.web')

@section('content')
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
  <div class = "flex grow flex-col-reverse p-4 mx-4 my-2 border">

    {{-- Forum Post Preview Box --}}
    <div class = "grid grid-rows-2 grid-cols-1 p-4 mt-2 mb-2 bg-red-200 w-full">
      {{-- Title --}}
      <p class = "text-2xl text-black font-semibold"> 
        TITLE 
      </p>
      {{-- Description --}}
      <p class = "truncate w-48 text-gray-400">
        DESCRIPTION
      </p>
    </div>

    {{-- Forum Post Preview Box --}}
    <div class = "grid grid-rows-2 grid-cols-1 p-4 mt-2 mb-2 bg-red-200 w-full">
      {{-- Title --}}
      <p class = "text-2xl text-black font-semibold"> 
        TITLE 
      </p>
      {{-- Description --}}
      <p class = "truncate w-48 text-gray-400">
        DESCRIPTION
      </p>
    </div>

    {{-- Forum Post Preview Box --}}
    <div class = "grid grid-rows-2 grid-cols-1 p-4 mt-2 mb-2 bg-red-200 w-full">
      {{-- Title --}}
      <p class = "text-2xl text-black font-semibold"> 
        TITLE 
      </p>
      {{-- Description --}}
      <p class = "truncate w-48 text-gray-400">
        DESCRIPTION
      </p>
    </div>
  </div>

@endsection