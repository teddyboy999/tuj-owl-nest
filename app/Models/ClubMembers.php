<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

// Model to represent the table to show which participant is interested in what event
class ClubMembers extends Model
{
    // fillable to define mass_assignment
    protected $fillable = ['user_id', 'club_id'];

    // Get all the members related to the club
    public function getPaginatedOrgMembers($clubId, $paginate_num)
    {
        $userIds = $this->where("club_id", $clubId)->get("user_id"); // first get the user ids of everyone in the club
        $users = User::whereIn("id", $userIds)->paginate($paginate_num); // then get their users, paginated 

        return $users;
    }
}
