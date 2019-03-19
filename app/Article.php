<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{

    protected $hidden = [
     'id', 'flux_id','title', 'description',
     'guid', 'url', 'source', 'pub_date',
     'flux_batch', 'hash'
    ];

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getGuid(): string
    {
        return $this->guid;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getSource(): string
    {
        return $this->source;
    }

    public function getPubDate(): Carbon
    {
        return $this->pub_date;
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    public static function make(array $params)
    {
        echo 'coucou';
    }
}
