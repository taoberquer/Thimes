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
                $fluxBatch = FluxBatch::make($flux->getId());
//                $this->load($flux);
            }
            break;
        }
    }

    protected function load(Flux $flux)
    {
        $remoteRSSAdapter = new Feed();

        foreach ($remoteRSSAdapter->get($flux->getUrl()) as $item) {
            $this->insertArticles($item);
        }
    }

    protected function simpleXMLElementToArray(\SimpleXMLElement $params)
    {
        $toReturn = [];

        foreach ($params as $key => $value) {
             array_push($toReturn, [$key => $value]);
        }

        return $toReturn;
    }

    protected function isRunning(): bool
    {
        //TODO : Faire la vérif avec le fichier .lock
        return false;
    }
}
