<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class FluxBatch extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['flux_id'];

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
        return new Carbon($this->started_at);
    }

    public function getEndedAt(): ?Carbon
    {
        return new Carbon($this->ended_at);
    }

    public function isSuccess(): bool
    {
        return $this->success;
    }

    public function addArticles(array $params)
    {
        array_push($params, [
           'flux_id' => $this->belongsToFlux()->getId(),
            'flux_batch_id' => $this->getId(),
        ]);

        Article::make($params);
    }

    public static function make(int $fluxId): FluxBatch
    {
        $fluxBatch = new FluxBatch(['flux_id' => $fluxId]);
        $fluxBatch->save();

        return $fluxBatch;
    }

    protected function belongsToFlux(): Flux
    {
        return $this->belongsTo('App\Flux', 'flux_id', 'id');
    }
}
