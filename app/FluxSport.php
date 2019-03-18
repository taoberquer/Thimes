<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FluxSport extends Model
{
    protected $hidden = [
         'flux-id', 'sport_id'
      ];

    public function getFluxId()
    {
        return $this->flux_id;
    }

    public function getSportId()
    {
        return $this->sport_id;
    }
}
