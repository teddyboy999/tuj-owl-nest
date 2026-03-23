<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    
    // getPaginatedOrganizations($paginate_num): returns a number of organizations only (15-20)
    public function getPaginatedEvents($paginate_num)
    {
        return $this->paginate($paginate_num);
    }
}
