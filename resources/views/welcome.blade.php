@extends('layouts.web')

@section('content')
    <div id="top-border">
        <div id="top-nav-bar"></div>
    </div>
    <div id="welcome" class="fade-in">
        <h1>TUJ Owl Nest</h1>
    </div>

    <div id="title-text" class="fade-in">Where Community meets Convenience</div>

    {{-- Insert an image --}}
    <div id="mission-container">
        <div id="mission-title">What is TUJ Owl Nest?</div>
        <div id="mission-text">
            TUJ Owl Nest is a Temple based platform that serves
            <br />
            to provide convenience to students in finding communities with ease
        </div>
    </div>
    <div id="event-container">
        <div id="event-text">See what events are going on!</div>
        <img src="{{ asset('Website_Images/events.jpg') }}" />
        <button
            onclick="window.location.href = '/event-list'"
            id="event-button"
        >
            Learn More
        </button>
    </div>
    <div id="middle-img">
        <img
            src="{{ asset('Website_Images/Owl-logo.png') }}"
            id="middle-img"
        />
    </div>
    <div id="forum-container">
        <div id="forum-text">Reach out to other Temple students!</div>
        <img src="{{ asset('Website_Images/students.jpg') }}" />
        <button onclick="window.location.href = '/forums'" id="forum-button">
            Learn More
        </button>
    </div>

    <div id="contact-container">
        <div id="contact-text">Reach out to us for any questions!</div>
        <img src="{{ asset('Website_Images/contact.jpg') }}" />
        <button onclick="window.location.href = '/contact'" id="contact-button">
            Learn More
        </button>
    </div>
@endsection
