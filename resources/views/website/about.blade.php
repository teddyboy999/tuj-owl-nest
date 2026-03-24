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

            <div class="grid grid-cols-12 gap-2">
                <div id="about-team-1-alonzo" class="col-start-2 col-span-3 p-2 text-center">
                    
                    <div id="team-image" class="flex items-center justify-center p-4">
                        <img src="{{ asset("Website_Images/Team_Photos/owlnest_team_alonzo.jpg") }}" class="h-48 items-center">
                    </div>

                    <div class="flex flex-row space-x-2 items-center justify-center">
                        <h5 id="about-team-1-alonzo" class="text-xl font-bold">Alonzo Ryan Rico</h5>

                        <a href="https://www.linkedin.com/in/alonzo-rico/" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
                            </svg>
                        </a>
                    </div>
                
                    <p id="about-team-1-alonzo-desc" class="text-center">
                        Alonzo Ryan Rico is currently a senior at Temple
                        University Japan pursuing a Bachelor’s degree, with a
                        strong focus on data analytics and full stack
                        development.
                    </p>

                </div>

                <div id="about-team-2-bhushith" class="col-start-5 col-span-4 p-2 text-center">
                    <div id="team-image" class="flex items-center justify-center p-4">
                        <img src="{{ asset("Website_Images/Team_Photos/owlnest_team_bhushith.jpg") }}" class="h-48">
                    </div>

                    <div class="flex flex-row space-x-2 items-center justify-center">
                        <h5 id="about-team-2-bhushith" class="text-xl font-bold">Bhushith Gujjala Hari</h5>

                        <a href="https://www.linkedin.com/in/bhushith-gujjala-hari-9a5876276/" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
                            </svg>
                        </a>
                    </div>
                    
                    <p id="about-team-2-bhushith-desc">
                        Bhushith is a passionate fourth year computer science student with experience from multiple solo projects, 2 research projects in Machine Learning, and two internships.
                        He's the leader of the CS Society and helps organize hackathons, and other events. 
                    </p>
                </div>

                <div id="about-team-3-james" class="col-start-9 col-span-3 p-2 text-center">
                    <div id="team-image" class="flex items-center justify-center p-4">
                        <img src="{{ asset("Website_Images/Team_Photos/owlnest_team_james.png") }}" class="h-48">
                    </div>

                    <div class="flex flex-row space-x-2 items-center justify-center">
                        <h5 id="about-team-3-james" class="text-xl font-bold">James Donelly</h5>
                        <a href="https://www.linkedin.com/in/james-donnelly-92a8b819/" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
                            </svg>
                        </a>
                    </div>
                    
                    <p id="about-team-3-james-desc"">
                        James Donnelly is a second year Computer Science student from Temple University, Japan. 
                        He is experienced in web development and Python, even winning multiple Hackathons hosted at TUJ.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
