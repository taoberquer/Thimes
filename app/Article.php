<?php

namespace App;

use App\Models\CustomSimpleXMLElement;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Validator;

class Article extends Model
{
    protected $fillable = [
        'flux_id', 'title', 'guid',
        'link', 'pub_date', 'flux_batch',
        'url', 'hash', 'description',
        'author', 'comments', 'source'
    ];

    protected $hidden = [
     'id', 'flux_id','title', 'description',
     'guid', 'url', 'source', 'pub_date',
     'flux_batch', 'hash',
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

    public static function make(CustomSimpleXMLElement $params)
    {
        $articleFields = $params->toArray();

        $validator = Validator::make($articleFields, [
            'flux_id' => 'required|integer',
            'title' => 'required',
            'link' => 'required',
            'flux_batch' => 'required|integer',
            'hash' => 'required',
            'author' => 'nullable',
            'comments' => 'nullable',
            'description' => 'nullable',
            'guid' => 'nullable',
            'pubDate' => 'nullable',
            'source' => 'nullable',

        ]);

        if (!$validator->fails()) {
            $article = new Article([
                'flux_id' => $articleFields['flux_id'],
                'title' => $articleFields['title'],
                'url' => $articleFields['link'],
                'flux_batch' => $articleFields['flux_batch'],
                'hash' => $articleFields['hash'],
                'author' => $articleFields['author'],
                'comments' => $articleFields['comments'],
                'description' => $articleFields['description'],
                'guid' => $articleFields['guid'],
                'pub_date' => new Carbon($articleFields['pubDate']),
                'source' => $articleFields['source'],
            ]);

            $article->save();
        }
    }
}
