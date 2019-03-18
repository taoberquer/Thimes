<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SportArticle extends Model
{
    protected $hidden = [
         'id'

      ];

    public function getId(): int
    {
        return $this->id;
    }
}
