<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // So, to get started, you should define which model attributes you want to make mass assignable. 
    // You may do this using the $fillable property on the model
    /**
     * The attributes that are mass assignable.
     *
     * @var array<
     */
    protected $fillable = [
        "event_organizer", 
        "event_organizer_email", 
        "event_affiliation", 
        "tags", 
        "event_title", 
        "event_description", 
        "event_date", 
        "start_time", 
        "end_time"
    ];

    protected $casts = [
    'tags' => 'array', // This turns the JSON string into a React-friendly array
    ];

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

    public function getEventByTitle($event_title)
    {
        return $this->where("event_title", $event_title);
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
