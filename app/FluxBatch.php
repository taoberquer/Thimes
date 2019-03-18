<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class FluxBatch extends Model
{
    protected $hidden = [
         'id', 'flux_id', 'started_at', 'ended_at',
         'success'
      ];

    public function getId(): int
    {
        return $this->id;
    }

    public function getStartedAt(): Carbon
    {
        return $this->started_at;
    }

    public function getEndedAt(): Carbon
    {
        return $this->ended_at;
    }

    public function isSuccess(): bool
    {
        return $this->success;
    }
}
