<?php

namespace App\Models;

use App\Flux;
use App\FluxBatch;
use Illuminate\Support\Collection;

class Engine
{
    protected $fluxCollection;

    public function __construct(Collection $collection)
    {
        $this->fluxCollection = $collection;
    }

    public function run()
    {
        if ($this->isRunning()) {
            throw new \Exception('Impossible de lancer, une mise à jour est déjà en cours.');
        }

        foreach ($this->fluxCollection as $flux) {
            if ($flux->canBeLoaded()) {
                $this->load(FluxBatch::make($flux->getId()));
            }
        }
    }

    protected function load(FluxBatch $fluxBatch)
    {
        $remoteRSSAdapter = new Feed();
        foreach ($remoteRSSAdapter->get($fluxBatch->getFlux()->getUrl())->channel->item as $item) {
            $fluxBatch->addArticleByCustomSimpleXMLElement($item);
            $fluxBatch->setSuccess();
        }
    }

    protected function isRunning(): bool
    {
        //TODO : Faire la vérif avec le fichier .lock
        return false;
    }
}
