@extends('layouts.web')

@section('content')
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
    <div id="test-container">
        <div id="container-item">
            <div id="event-text" class="fade-in">
                See what events are going on!
            </div>
            <img
                src="{{ asset('Website_Images/events.jpg') }}"
                class="fade-in"
            />
            <button
                onclick="window.location.href = '/event-list'"
                id="learn-more"
            >
                Learn More
            </button>
        </div>

        <div id="container-item">
            <div id="forum-text" class="fade-in">
                Reach out to other Temple students!
            </div>
            <img
                src="{{ asset('Website_Images/team-temple-students.jpg') }}"
                class="fade-in"
            />
            <button onclick="window.location.href = '/forums'" id="learn-more">
                Learn More
            </button>
        </div>

        <div id="container-item">
            <div id="contact-text" class="fade-in">
                Reach out to us for any questions!
            </div>
            <img
                src="{{ asset('Website_Images/contact.jpg') }}"
                class="fade-in"
            />
            <button onclick="window.location.href = '/contact'" id="learn-more">
                Learn More
            </button>
        </div>
    </div>
@endsection
