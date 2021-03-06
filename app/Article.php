<?php

namespace App;

use App\Models\CustomSimpleXMLElement;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
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
        return !empty($this->description) ? $this->description : __('article.nodescription');
    }

    public function getGuid(): string
    {
        return $this->guid;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }
    public function getComment(): ?string
    {
        return $this->comments;
    }

    public function getPubDate(): Carbon
    {
        return new Carbon($this->pub_date);
    }

    public function getPubDateWithFormat($format = 'D/M/Y')
    {
        return $this->getPubDate()->isoFormat($format);
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    public function getFlux(): Flux
    {
        return $this->belongsToFlux();
    }

    public function sports(): Collection
    {
        return $this->belongsToMany('App\Sport', 'sport_articles', 'article_id', 'sport_id')->get();
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
            'description' => 'nullable|string',
            'guid' => 'nullable|unique:articles',
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

            if ($article->save()) {
                $user = User::where('email', 'engine@engine.com')->first();

                if (!empty(Auth::user())) {
                    $user = Auth::user();
                }

                foreach ($params->category as $category) {
                    $sport = Sport::firstOrCreate(['name' => $category]);

                    SportArticle::create([
                        'article_id' => $article->getId(),
                        'user_id' => $user->getId(),
                        'sport_id' => $sport->getId(),
                    ]);
                }
            }
        }
    }

    public static function allWithPagination($offset = 0, $articlesNumber = 15)
    {
        return Article::all()->sortByDesc('pub_date')->slice($offset)->take($articlesNumber);
    }

    protected function belongsToFlux(): Flux
    {
        return ($this->belongsTo('App\Flux', 'flux_id', 'id'))->first();
    }
}
