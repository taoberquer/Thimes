<?php

namespace App\Models;

class Feed
{
    public function get($url)
    {
        return $this->parse($this->load($url));
    }

    public function load($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_USERAGENT, "curl/7.54.0");
        if (! $rawContent = curl_exec($curl)) {
            trigger_error(curl_error($curl));
        }
        curl_close($curl);

        return $rawContent;
    }

    public function parse($content)
    {
        $res = simplexml_load_string(
            $content,
            'App\Models\CustomSimpleXMLElement',
            LIBXML_NOCDATA
        ) or die("Error: Cannot create object");

        return $res;
    }
}
