<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Sport extends Model
{
    protected $guarded = [];

    protected $hidden = [
         'id', 'name'

      ];

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getArticles(): Collection
    {
        return $this->belongsToMany('App\Article', 'sport_articles', 'sport_id', 'article_id')->get();
    }
}
