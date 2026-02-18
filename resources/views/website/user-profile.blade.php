@extends('layouts.web')

@section('content')
    <div id="top-border">
        <div id="top-nav-bar"></div>
    </div>
    <div class="profile-pic">
        <h2>Profile Picture</h2>
        <label for="pfp">Upload your Photo</label>
        <div name="file-upload"><input type="file" id="pfp" name="pfp" accept="image/png" /></div>
        <div id="preview">
            <p>Waiting for Upload</p>
        </div>
    </div>

    <div class="name">
        Name: Alonzo Rico
    </div>

    <div class="tuid">
        TUID: 916421654
    </div>

    <div class="view-notification">View notifications:<div name="notification-icon" class="notification-icon"></div>
    </div>

    <div class="current-clubs">Your Current Clubs:<div name="sliding-images"></div>
    </div>
    </div>
@endsection
