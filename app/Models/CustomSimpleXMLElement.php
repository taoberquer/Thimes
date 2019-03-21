<?php

namespace App\Models;

class CustomSimpleXMLElement extends \SimpleXMLElement
{
    public function toArray(): array
    {
        return $this->toArrayWithParameter($this);
    }

    public function addChildIfDoNotExist($name, $value = null, $namespace = null)
    {
        if (empty($this->{$name})) {
            parent::addChild($name, $value, $namespace);
        }
    }

    protected function toArrayWithParameter(CustomSimpleXMLElement $xmlObject): ?array
    {
        if (empty($xmlObject)) {
            return null;
        }

        foreach ((array) $xmlObject as $index => $value) {
            $toReturn[$index] = is_object($value) ? $this->toArrayWithParameter($value) : $value;
        }

        return $toReturn;
    }
}
