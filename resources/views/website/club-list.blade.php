@extends('layouts.web')

@section('content')
    <div id="top-border">
        <div id="top-nav-bar"></div>
    </div>
    <div id="clubs">
        <h1>Clubs</h1>
    </div>

    <div id="club-create">
        <button
            onclick="window.location.href = '/new-club'"
            class="club-create"
        >
            Create New Club
        </button>
    </div>
    <div id="club-edit">
        <button
            onclick="window.location.href = '/club-edit'"
            class="club-create"
        >
            Edit Your Club
        </button>
    </div>
@endsection
