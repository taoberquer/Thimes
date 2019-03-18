<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FluxSport extends Model
{
    protected $hidden = [
         'flux-id', 'sport_id'
      ];

    public function getFluxId(): int
    {
        return $this->flux_id;
    }

    public function getSportId(): int
    {
        return $this->sport_id;
    }
}
