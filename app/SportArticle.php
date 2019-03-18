<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SportArticle extends Model
{
    protected $hidden = [
         'id', 'sport_id', 'club_id','article_id',
         'user_id'
      ];

    public function getId()
    {
        return $this->id;
    }

    public function getSportId()
    {
        return $this->sport_id;
    }

    public function getClubId()
    {
        return $this->club_id;
    }

    public function getArticleId()
    {
        return $this->article_id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }
}
