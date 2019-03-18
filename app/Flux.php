<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flux extends Model
{
    protected $hidden = [
         'id', 'title', 'url', 'ttl', 'active',
         'active', 'date_success'
      ];

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getTTL()
    {
        return $this->ttl;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function getDateSuccess()
    {
        return $this->date_success;
    }
}
