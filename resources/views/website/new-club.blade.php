@extends('layouts.web')

@section('content')
    <div id="top-border">
        <div id="top-nav-bar"></div>
    </div>
    <div class="page-container">
        <div class="form-container">
            <form action="" method="" autocomplete="on">
                <fieldset class="club-form-fieldset">
                    <h2 style="text-align: center;">Create a New Club</h2>
                    <div id="club-name" class="club-name">
                        <label for="club-name-input" class="club-label">Club Name:</label>
                        <input type="text" id="club-name-input" name="club-name-input" placeholder="Ex. Coding Club" class="club-input"/>
                    </div>
                    <br />
                    <label for="club-desc" class="club-label">Description for your Club</label>
                    <div id="club-desc">
                        <textarea id="club-desc-input" name="club-desc-input" rows="10" cols="50"
                            placeholder="Ex. This club serves to..." class="club-input"></textarea>
                    </div>
                    <br />
                    <br />
                    <div class="input-align">   
                        <div class="leader-group">
                            <label for="leader-input" class="club-label">Club leader:</label>
                            <input type="text" id="leader-name" name="leader-input" class="club-input" placeholder="Alan Turing" /> Name
                            <input type="text" id="leader-email" name="leader-email" class="club-input" placeholder="tuu1234@temple.edu" /> TU e-mail
                            <input type="text" id="leader-tuid" name="leader-tuid" class="club-input" placeholder="912345678" /> TUID <br>
                            <input type="radio" id="UGBP" name="leader-program" value="UGBP"><label for="UBGP">Undergraduate/Bridge Program at TUJ</label><br>
                            <input type="radio" id="SA" name="leader-program" value="SA"><label for="SA">Study Abroad (SA) Program (Short Term)</label><br>
                            <input type="radio" id="AEP" name="leader-program" value="AEP"><label for="AEP">Academic English Program (AEP)</label>
                        </div>
                        <div class="coleader-group">
                            <label for="coleader-input" class="club-label">Co-leader:</label>
                            <input type="text" id="coleader-input" name="coleader-input" class="club-input" placeholder="Tony Hoare" /> Name <br>
                            <input type="text" id="coleader-email" name="coleader-email" class="club-input" placeholder="tuu1234@temple.edu" /> TU e-mail <br>
                            <input type="text" id="coleader-tuid" name="coleader-tuid" class="club-input" placeholder="912345678" /> TUID <br>
                            <input type="radio" id="UGBP" name="coleader-program" value="UGBP"><label for="UBGP">Undergraduate/Bridge Program at TUJ</label><br>
                            <input type="radio" id="SA" name="coleader-program" value="SA"><label for="SA">Study Abroad (SA) Program (Short Term)</label><br>
                            <input type="radio" id="AEP" name="coleader-program" value="AEP"><label for="AEP">Academic English Program (AEP)</label>
                        </div>
                        <div class="semester-group">
                            <label for="semester" class="club-label">For semester:</label>
                            <select name="semester" id="semester" class="club-input">
                                <option value="2026-2">Summer '26</option>
                                <option value="2026-3">Fall '26</option>
                                <option value="2027-1">Spring '27</option>
                            </select>
                        </div>
                        <div class="num-members-group">
                            <label for="num-members" class="club-label">Number of club members:</label>
                            <input type="number" id="num-members" name="num-members" class="club-input" placeholder="0" />  Minimum 8
                        </div>
                        <div class="socials-group">
                            <label for="socials" class="club-label">List any socials!</label>
                            <textarea id="socials-input" class="club-input" name="socials-input" placeholder="Instagram: tuj_cs_society" rows="3" cols="30"></textarea>
                        </div>
                        <div class="emails-group">
                            <label for="member-emails" class="club-label">Input club member emails:</label>
                            <textarea id="member-emails" name="member-emails" class="club-input" rows="6" cols="30" placeholder="tuu123@temple.edu"></textarea>
                        </div>
                        <div class="photos-group">
                            <label for="club-pics" class="club-label">Upload club photos</label>
                            <div id="club-pics">
                                <div name="file-upload">
                                    <input type="file" id="club-pics-input" name="club-pics-input" accept="image/png" />
                                    <img src="#" alt="preview-pic" id="preview-pic" style="display: none; max-width: 200px;">
                                </div>
                            </div>
                        </div>
                        <div class="logo-group">
                            <label for="club-banner" class="club-label">Upload club logo</label>
                            <div id="club-banner">
                                <div name="file-upload">
                                    <input type="file" id="club-banner-input" name="club-banner-input" accept="image/png" />
                                </div>
                            </div>
                        </div>
                        <div class="showa-group">
                            <p class="club-label">Are there Showa students in your club?</p>
                            <input type="radio" id="yes-showa" name="showa-members" value="Yes"><label for="yes-showa">Yes</label>
                            <input type="radio" id="no-showa" name="showa-members" value="No" checked class="club-input"><label for="no-showa">No</label>
                        </div>
                        <div class="meeting-group">
                            <label for="meeting-input" class="club-label">Input your club meeting day and time:</label>
                            <input type="text" name="meeting-input" id="meeting-input" class="club-input" placeholder="e.g. Mondays 3pm" />
                            <label for="location-input" class="club-label">Input your club meeting location:</label>
                            <input type="text" name="location-input" id="location-input" class="club-input" placeholder="e.g. Room 310" />
                        </div>
                        <div class="location-agree-group">
                            <p class="club-label">Club leaders or appointed members must contact TUJ Facilities 
                                at facilities@tuj.temple.edu to reserve a space on campus "every semester" AFTER submitting this form.</p>
                            <input type="checkbox" name="location-agree" id="location-agree" class="club-input" /><label for="location-agree"> I understand</label>
                        </div>
                        <div class="locker-group">
                            <p class="club-label">Do you need a locker for your group?</p>
                            <input type="radio" id="yes-locker" name="club-locker" value="Yes"><label for="yes-locker">Yes</label>
                            <input type="radio" id="no-locker" name="club-locker" value="No" checked class="club-input"><label for="no-locker">No</label>
                        </div>
                        
                        <div name="submit-button" id="submit-button" class="submit-club-button"></div>
            </fieldset>
        </div> 
    </div>
@endsection
