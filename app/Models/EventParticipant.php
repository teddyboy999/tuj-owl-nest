<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

// Model to represent the table to show which participant is interested in what event
class EventParticipant extends Model
{
    protected $fillable = ['user_id', 'event_id'];

    // gets paginated participants according to the event id
    public function getPaginatedInterestedUsers($eventId, $paginate_num)
    {
        $userIds = $this->where("club_id", $eventId)->get("user_id"); // first get the user ids of everyone interested in the event
        $users = User::whereIn("id", $userIds)->paginate($paginate_num); // then get their users, paginated 

        return $users;
    }
}
