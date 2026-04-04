<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use Illuminate\Support\Facades\Auth;
use App\Models\ClubMembers;
use App\Models\Forum;
use App\Models\User;

class OrganizationController extends Controller
{
    // SHOW all clubs / organizations - paginated by 15
    public function index()
    {
        $organization = new Organization;
        $clubs = $organization->getPaginatedOrganizations(8);

        return view('website.club-list', ['clubs' => $clubs]);
    }

    // SHOW individual clubs / organizations based on ID and details about them
    public function show($orgId)
    {
        // If your filter is the primary key of your table, you can just use find() to find the record
        $organization = Organization::find($orgId);

        // Organization Forum (that's created when the org is made)
        $forum_obj = new Forum();
        $org_forum = $forum_obj->find($organization->forum_id);
        $posts = $forum_obj->getChildPosts($organization->forum_id, 5);
        
        // Get members of the club / organization
        $organization_participant = new ClubMembers();
        $members = $organization_participant->getPaginatedOrgMembers($orgId, 10);

        // compact("var_name") is same as ["var_name" => value]
        return view("website.club", 
                    ["club" => $organization, 
                    "users" => $members,
                    "forum" => $org_forum,
                    "posts" => $posts
                    ]);
    }

    // CREATING new Clubs / Organizations
    public function createOrganization(Request $request)
    {
        //echo "Create orgy request";
        
        $validatedData = $this->validateRequest($request);    

        $organization = new Organization;
        $organization->org_leader_id = Auth::user()->id;
        $organization->org_name = $validatedData["name"];
        $organization->org_description = $validatedData["description"];
        $organization->org_email = $validatedData["leader_email"];

        $organization->org_leader_temple_id = $validatedData["leader_tuid"];
        $organization->org_leader_name = $validatedData["leader_name"];
        $organization->org_leader_email = $validatedData["leader_email"];
        $organization->org_leader_program = $validatedData["leader_program"];

        $organization->org_co_leader_temple_id = $validatedData["co_leader_tuid"];
        $organization->org_co_leader_name = $validatedData["co_leader_name"];
        $organization->org_co_leader_email = $validatedData["co_leader_email"];
        $organization->org_co_leader_program = $validatedData["co_leader_program"];

        $organization->org_type = "organization";
        $organization->org_is_active = true;

        //$organization->org_logo_url = $validatedData["logo"];
        //$organization->org_images = $validatedData["org_images"];

        $organization->org_semester = $validatedData["semester"];
        $organization->org_number_of_members = (int) $validatedData["member_count"];
        $organization->org_has_showa_students = $validatedData["showa-members"];
        $organization->org_needs_locker = $validatedData["club-locker"];

        // Org Meeting times
        $organization->org_meeting_time = $validatedData["meeting-input"];
        $organization->org_meeting_location = $validatedData["location-input"];

        // Org Socials (nullable)
        $organization->org_socials = $validatedData["socials-input"];

        // Member emails
        $organization->org_member_emails = $validatedData["member-emails"];

        // TEST
        // echo "Organization as JSON: ";
        // $jsonStrOrganization = json_encode($organization);
        // echo $jsonStrOrganization;

        // FORUM: Create a forum specific to the organization / club
        // Create new forum for this event
        $forum = new Forum();
        $forum->forum_author_id = Auth::user()->id;
        $forum->forum_author = $validatedData["leader_name"];
        $forum->forum_author_email = $validatedData["leader_email"];
        $forum->forum_title = $validatedData["name"] . " Forum";
        $forum->forum_content = $validatedData["description"];
        $forum->save(); // insert into forum

        $organization->forum_id = $forum->id;

        // save
        $organization->save();

        return redirect()->route("clubs.show", ["clubId" => $organization->id])->with('success', 'Organization created successfully!');
    }

    
    public function joinClub($clubId)
    {
        $user = Auth::user();

        // if the user is authenticated, then join the event!
        if ($user)
        {
            $club_participant = new ClubMembers();
            $club_participant->user_id = $user->id;
            $club_participant->club_id = $clubId;

            $club_participant->save();
        }

        // just refresh the page
        return redirect()->route('clubs.show', ['clubId' => $clubId]);
    }

    public function updateOrganization(Request $request, Organization $organization)
    {
        $validatedData = $this->validateRequest($request);

        $organization->fill($validatedData);

        // TODO: Add id and return that club's specific page
        return redirect('/club-list')->with('success', 'Event created successfully!');
    }

    public function destroy($orgId)
    {
        $organization = Organization::findOrFail($orgId);

        // Remove every record from ClubMembers Table
        ClubMembers::where("club_id", $orgId)->delete();

        // Delete the forum linked to this club as well
        Forum::where("id", $organization->forum_id)->delete();

        // Finally delete the organization
        $organization->delete();

        return redirect()->route("website.club-list")->with("success", "Club deleted successfully!");
    }

    // HELPER METHODS
    public function validateRequest(Request $request): array
    {
        // Validate request data
        $validatedData = $request->validate([
            "name" => "required",
            "description" => "required",

            "leader_tuid" => "required",
            "leader_name" => "required",
            "leader_email" => "required",
            "leader_program" => "required", // SA || UG || AEP

            "co_leader_tuid" => "required", 
            "co_leader_name" => "required",
            "co_leader_email" => "required",
            "co_leader_program" => "required", 

            //"type" => "required", // has to be one of: organization, affinity, sports, culture, veteran.

            //"is_active" => "required|boolean", // no need, automatically becomes active

            // TODO: Club Images 
            //"logo" => "nullable",
            //"org_images" => "nullable|json",

            // CLUB Details: Meeting Dates and Times
            "meeting-input" => "required",
            "location-input" => "required",
            "member-emails" => "required",

            // Socials
            "socials-input" => "nullable",

            // Other details
            "semester" => "required",
            "member_count" => "required",
            
            "showa-members" => "required",
            "club-locker" => "required",
        ]);

        return $validatedData;
    }
}
