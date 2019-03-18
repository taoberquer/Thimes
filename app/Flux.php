<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Flux extends Model
{
    protected $hidden = [
             'id', 'title', 'url', 'ttl', 'active',
             'active', 'date_success'
          ];

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getTTL(): int
    {
        return $this->ttl;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function getDateSuccess(): Carbon
    {
        return $this->date_success;
    }

    public function canBeLoaded(): bool
    {
        if (!$this->isActive()) {
            return false;
        }

    //    if () {
    //        return true;
    //    }
    }

    protected function isTTLBeenPassed(): bool
    {
        $lastCreatedFluxBatch = $this->getLastCreatedFluxBatch();

        if (!empty($lastCreatedFluxBatch)) {
            if ($lastCreatedFluxBatch->getSuccess()) {
                if ($lastCreatedFluxBatch->getEndedAt()) {
                }
            }

            return true;
        }
    }

    protected function getLastCreatedFluxBatch(): FluxBatch
    {
        $lastestFluxBatch = $this->hasManyFluxBatch()->latest();

        if (!empty($lastestFluxBatch)) {
            return $lastestFluxBatch;
        }

        return null;
    }

    protected function hasManyFluxBatch()
    {
        return $this->hasMany('App\FluxBatch', 'id', 'flux_id');
    }

    public static function findGuid($guid): Flux
    {
        $flux = Flux::all()->where('guid', $guid)->first();

        if (!empty($flux)) {
            return $flux;
        }

        return null;
    }
}
