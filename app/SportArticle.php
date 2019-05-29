<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SportArticle extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function getId(): int
    {
        return $this->id;
    }
}
