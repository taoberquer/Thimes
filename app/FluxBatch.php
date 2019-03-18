<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FluxBatch extends Model
{
    protected $hidden = [
         'id', 'flux_id', 'started_at', 'ended_at',
         'success'
      ];

    public function getId()
    {
        return $this->id;
    }

    public function getFluxId()
    {
        return $this->flux_id;
    }

    public function getStartedAt()
    {
        return $this->started_at;
    }

    public function getEndedAt()
    {
        return $this->ended_at;
    }

    public function getSuccess()
    {
        return $this->success;
    }
}
