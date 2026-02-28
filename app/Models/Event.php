<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // getAllEvents(): returns all events
    public function getAllEvents()
    {
        return $this->all();
    }

    // getPaginatedEvents($paginate_num): returns a number of events only (15-20)
    public function getPaginatedEvents($paginate_num)
    {
        return $this->paginate($paginate_num);
    }

    // getEventById($event_id): get event by id
    public function getEventById($event_id)
    {
        return $this->where("id", $event_id);
    }

    // getEventsByCategory($category): get all events by category
    public function getEventsByCategory($category)
    {
        return $this->where("event_category", $category);
    }

    // getPaginatedEventsByCategory($category, $paginate_num): get all events by category and paginate them to only give a number of records
    public function getPaginatedEventsByCategory($category, $paginate_num)
    {
        return $this->where("event_category", $category)->paginate($paginate_num);
    }

    // getEventsByOrganizer($organizer): gets events by organizer
    public function getEventsByOrganizer($organizer)
    {
        return $this->where("event_organizer", $organizer);
    }

    // getEventsSortedByDate()
    public function getEventsSortedByDate()
    {
        return $this->orderBy("event_date", "asc")->get();
    }
}
