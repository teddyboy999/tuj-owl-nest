@extends('layouts.web')

@section('content')
        <div id="top-border">
        <div id="top-nav-bar"></div>
        </div>
        <label for="club-name">Club Name:</label>
        <div id="club-name">
            <input
                type="text"
                id="club-name-input"
                name="club-name-input"
                placeholder="Ex. Coding Club"
            />
        </div>
        <br />
        <label for="club-desc">Description for your Club</label>
        <div id="club-desc">
            <textarea
                id="club-desc-input"
                name="club-desc-input"
                rows="10"
                cols="50"
                placeholder="Ex. This club serves to..."
            ></textarea>
        </div>
        <br />
        <label for="socials">List any socials!</label>
        <div id="socials">
            <input
                type="text"
                id="socials-input"
                name="socials-input"
                placeholder="Instagram: alonzo_rico"
            />
        </div>
        <br />
        <label for="club-pics">Upload any photos of your Club</label>
        <div id="club-pics">
            <div name="file-upload">
                <input
                    type="file"
                    id="club-pics-input"
                    name="club-pics-input"
                    accept="image/png"
                />
                <img src="#" alt="preview-pic" id="preview-pic" style="display: none; max-width: 200px;">
            </div>
        </div>
        <br />
        <br />
        <label for="club-banner">Upload Club Logo</label>
        <div id="club-banner">
            <div name="file-upload">
                <input
                    type="file"
                    id="club-banner-input"
                    name="club-banner-input"
                    accept="image/png"
                />
            </div>

        <br />
        <br />
        <div name="submit-button" id="submit-button"></div>
@endsection