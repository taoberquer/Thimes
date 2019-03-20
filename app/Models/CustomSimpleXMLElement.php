<?php

namespace App\Models;

class CustomSimpleXMLElement extends \SimpleXMLElement
{
    public function toArray()
    {
        return $this->toArrayWithParameter($this);
    }

    protected function toArrayWithParameter(CustomSimpleXMLElement $xmlObject)
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
