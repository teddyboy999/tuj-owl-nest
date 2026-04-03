<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

// Model to represent the table to show which participant is interested in what event
class ClubMembers extends Model
{
    // gets paginated participants according to the event id
    public function getPaginatedOrgMembers($clubId, $paginate_num)
    {
        $userIds = $this->where("club_id", $clubId)->paginate($paginate_num)->value("user_id");

        $users = User::findMany($userIds);

        return $users;
    }
}
