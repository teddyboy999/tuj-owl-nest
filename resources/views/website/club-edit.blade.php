@extends('layouts.web')

@section('content')
        <div id="top-border">
        <div id="top-nav-bar"></div>
        </div>
        <div class="page-container">
        <div class="form-container">
        <form action="" method="" autocomplete="on">
            <fieldset class="club-form-fieldset">
        <label for="club-name" class="club-label">Club Name:</label>
        
        <div id="club-name">
            <input
                type="text"
                id="club-name-input"
                name="club-name-input"
                placeholder="Ex. Coding Club"
            />
        </div>
        <br />
        <label for="club-desc" class="club-label">Description for your Club</label>
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
        <div class="input-align">
        <label for="leader-input" class="club-label">Club leader:</label>
        <label for="semester" class="club-label">For semester:</label>
        <br>
            <input 
                type="text" 
                id="leader-input" 
                name="leader-input"
                placeholder="Sota Takeda"/>
        
            <select name="semester" id="semester">
                <option value="20262">Summer '26</option>
                <option value="20263">Fall '26</option>
                <option value="20271">Spring '27</option>
            </select>
        <br>
        <label for="coleader-input" class="club-label">Co-leader:</label>
            <input 
                type="text" 
                id="coleader-input" 
                name="coleader-input"
                placeholder="Belle Delphine"/>
        <br>
        <label for="socials" class="club-label">List any socials!</label>
            <input
                type="text"
                id="socials-input"
                name="socials-input"
                placeholder="Instagram: alonzo_rico"
            />
        
        <br />
        <label for=""></label>
    </div>
        <label for="club-pics" class="club-label">Upload any photos of your Club</label>
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
        <label for="club-banner" class="club-label">Upload Club Logo</label>
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
        </fieldset></div></div>
@endsection