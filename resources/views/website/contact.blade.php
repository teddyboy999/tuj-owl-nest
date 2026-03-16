@extends('layouts.web')

@section('content')
    <div id="top-border">
        <div id="top-nav-bar"></div>
    </div>
    <div id="contact">
        <h1>Contact Us</h1>
    </div>

    <div id="contact-msg">Contact us at someEmail@gmail.com</div>
    <div id="contact-msg">Or reach out to us via form</div>

    <div id="contact-form">
        <form>
            <fieldset>
                <legend id="contact-message">Contact Form</legend>
                <label for="contact-email" id="email">Email</label>
                <input type="text" id="contact-email" />

                <label for="contact-category" id="category">Category</label>
                {{-- Utilizing React Component for Dropdown --}}
                <div name="contact-dropdown"></div>

                <label for="contact-content" id="content">Message</label>
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
