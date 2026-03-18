@extends('layouts.web')

@section('content')
    <div id="top-border">
        <div id="top-nav-bar"></div>
    </div>
    <div id="about" class="fade-in">
        <h1>About Us</h1>
    </div>

    <div id="container" class="m-2 p-2">
        <h1 id="first-paragraph-title" class="mt-2 mb-1">Who are we?</h1>
        <div id="first-paragraph" class="mb-2">
            TUJ Owl Nest is a project made by Alonzo Rico, Bhushith Gujjala
            Hari, and James Donnelly that serves to help current
            <br />
            and prospective TUJ students with navigating through the various
            clubs present in TUJ
            <br />
            This web application serves to streamline the club finding process
            whilst making it more conveneinent for
            <br />
            students to reach out to clubs they're interested in as well as mark
            the ones they've joined'
        </div>

        <h2 id="second-paragraph-title" class="mt-2 mb-1">What's our Vision</h2>
        <div id="second-paragraph" class="mb-2">
            As current students in TUJ, we strive for the convenience of
            students when it comes to any aspect of school. As we strive for
            improvements, so does the community around us.
            <br />
            Another aspect to account for is that two of us are club leaders who
            recognize
            <br />
            the struggle that students encounter when it comes to trying to join
            a new community
        </div>

        <h3 id="third-paragraph-title" class="mt-2 mb-1">Future Visions</h3>
        <div id="third-paragraph" class="mb-2">
            For the future, we plan on expanding this technology to other
            Universities or Communities who need
            <br />
            this type of streamlined information for clubs and other external
            organizations
        </div>

        <div id="about-team-container" class="m-2 mt-4 grid-rows-2 text-black">
            <h4
                id="about-team"
                class="col-span-12 items-center text-center text-3xl font-bold text-black"
            >
                The Team
            </h4>

            <div class="grid grid-cols-12">
                <div id="about-team-1-alonzo" class="col-start-3 col-end-6 p-2 text-center">
                    <h5 id="about-team-1-alonzo">Alonzo Ryan Rico</h5>
                    <p id="about-team-1-alonzo-desc" class="text-center">
                        Alonzo Ryan Rico is currently a senior at Temple
                        University Japan pursuing a Bachelor’s degree, with a
                        strong focus on data analytics and full stack
                        development.
                    </p>
                    <div
                        id="about-team-1-alonzo-links"
                        class="flex grid-cols-2"
                    >
                        LinkedIn Instagram 
                    </div>
                </div>

                <div
                    id="about-team-2-bhushith"
                    class="col-start-6 col-end-9 p-2 text-center"
                >
                    <h5 id="about-team-2-bhushith">Bhushith Gujjala Hari</h5>
                    <p id="about-team-2-bhushith-desc">
                        Bhushith Gujjala Hari
                    </p>
                    <div
                        id="about-team-2-bhushith-links"
                        class="flex grid-cols-2"
                    >
                        LinkedIn Instagram
                    </div>
                </div>

                <div id="about-team-3-james" class="col-start-9 col-end-12 p-2 text-center">
                    <h5 id="about-team-3-james">James Donelly</h5>
                    <p id="about-team-3-james-desc"">
                        James Donnelly
                    </p>
                    <div id="about-team-3-james-links" class="flex grid-cols-2">
                        LinkedIn Instagram
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
