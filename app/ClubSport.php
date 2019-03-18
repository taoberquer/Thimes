<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClubSport extends Model
{
    protected $hidden = [
       'club_id', 'sport_id'
    ];

    public function getClubId()
    {
        return $this->club_id;
    }

    public function getSportId()
    {
        retunr $this->sport_id;
    }
}
