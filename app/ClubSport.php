<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClubSport extends Model
{
    protected $guarded = [];

    protected $hidden = [
       'club_id', 'sport_id'
    ];

    public function getClubId(): int
    {
        return $this->club_id;
    }

    public function getSportId(): int
    {
        return $this->sport_id;
    }
}
