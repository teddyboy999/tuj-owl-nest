@extends('layouts.web')

@section('content')
    <div id="top-border">
        <div id="top-nav-bar"></div>
    </div>
    <div id="contact" class="fade-in">
        <h1>Contact Us</h1>
    </div>

    <div id="contact-msg">Contact us at tus52183@temple.edu</div>
    <div id="contact-msg">Or reach out to us via form</div>

    <div id="contact-form">
        <form>
            <fieldset>
                <legend id="contact-message">Contact Form</legend>
                <label for="contact-email" id="email">Your Email</label>
                <input
                    type="text"
                    id="contact-email"
                    placeholder="eg. tus52183@temple.edu"
                />

                <label for="contact-category" id="category">Category</label>
                {{-- Utilizing React Component for Dropdown --}}
                <div name="contact-dropdown"></div>

                <label for="contact-content" id="content">Your Message</label>
                <textarea
                    id="contact-content"
                    rows="12"
                    cols="100"
                    placeholder="Write your message"
                ></textarea>

                <br />

                <div name="submit-button"></div>
            </fieldset>
        </form>
    </div>
@endsection
