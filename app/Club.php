<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

class Club extends Model
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

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany('App\Article', 'sport_articles', 'club_id', 'article_id');
    }
}
