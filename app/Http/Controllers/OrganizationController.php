<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;

class OrganizationController extends Controller
{
    // SHOW all clubs / organizations - paginated by 15
    public function index()
    {
        $organization = new Organization;
        $clubs = $organization->getPaginatedOrganizations(15);

        return view('club-list', ['clubs' => $clubs]);
    }

    // SHOW individual clubs / organizations based on ID and details about them
    public function show($postId)
    {
        // If your filter is the primary key of your table, you can just use find() to find the record
        $organization = Organization::find($postId);

        // compact("var_name") is same as ["var_name" => value]
        return view("organization", ["club" => $organization]);
    }

    // CREATING new Clubs / Organizations
    public function createOrganization(Request $request)
    {
        $validatedData = $this->validateRequest($request);    

        $organization = new Organization;

        $organization->org_name = $validatedData["name"];

        $organization->save();

        // TODO: Add id and return that club's specific page
        return redirect('/club-list')->with('success', 'Event created successfully!');
    }

    public function updateOrganization(Request $request, Organization $organization)
    {
        $validatedData = $this->validateRequest($request);

        $organization->fill($validatedData);

        // TODO: Add id and return that club's specific page
        return redirect('/club-list')->with('success', 'Event created successfully!');
    }

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

            "type" => "required", // has to be one of: organization, affinity, sports, culture, veteran.

            "is_active" => "required|boolean",

            // Club Images 
            "logo" => "nullable",
            "org_images" => "nullable|json",

            // Other details
            "semester" => "required",
            "member_count" => "integer",
            "has_showa_students" => "required|boolean",
            "needs_locker" => "boolean",

            // Meeting Dates and Times
            "meeting_times" => "required",
            "meeting_location" => "required"
        ]);

        return $validatedData;
    }
}
