<?php

namespace App\Http\Controllers\Club;

use App\Article;
use App\SportArticle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $club = Auth::user()->getClub();

        return view('club.index', compact('club'));
    }

    public function showNonClubsArticles()
    {
        dd('showNonClubsArticles');
    }

    public function addArticleToClub(Request $request, int $articleId)
    {
        if (!Article::find($articleId)) {
            return redirect()->back()->with('error', 'Cette article n\'existe pas');
        }

        SportArticle::firstOrCreate([
            'article_id' => $articleId,
            'user_id' => Auth::user()->getId(),
            'club_id' => Auth::user()->getClub()->getId(),
        ]);

        return redirect()->back()->with('success', 'L\'article a été ajouté à votre club');
    }

    public function removeAddedArticle(Request $request, int $articleId)
    {
        if (!Article::find($articleId)) {
            return redirect()->back()->with('error', 'Cette article n\'existe pas');
        }

        $sportArticle = SportArticle::where([
            'article_id' => $articleId,
            'user_id' => Auth::user()->getId(),
            'club_id' => Auth::user()->getClub()->getId(),
        ]);

        if (!empty($sportArticle)) {
            $sportArticle->delete();
        }

        return redirect()->back()->with('success', 'L\'article a été retiré de votre club');
    }
}
