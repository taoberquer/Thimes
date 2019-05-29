<?php

namespace App;

use App\Models\CustomSimpleXMLElement;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

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

    public function addArticleByCustomSimpleXMLElement(CustomSimpleXMLElement $param)
    {

        $param->addChild('flux_id', $this->belongsToFlux()->getId());
        $param->addChild('flux_batch', $this->getId());

        $param->addChildIfDoNotExist('author');
        $param->addChildIfDoNotExist('comments');
        $param->addChildIfDoNotExist('guid');
        $param->addChildIfDoNotExist('pubDate');
        $param->addChildIfDoNotExist('source');

        $param->addChild('hash', md5($param->title));

        Article::make($param);
    }

    public function getFlux()
    {
        return $this->belongsToFlux();
    }

    public function setSuccess(bool $success = true)
    {
        $this->success = true;
        $this->ended_at = new Carbon();
        $this->save();
    }

    public static function make(int $fluxId): FluxBatch
    {
        $fluxBatch = new FluxBatch(['flux_id' => $fluxId]);
        $fluxBatch->save();

        return $fluxBatch;
    }

    protected function belongsToFlux(): Flux
    {
        return ($this->belongsTo('App\Flux', 'flux_id', 'id'))->first();
    }
}
