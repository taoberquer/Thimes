<?php

namespace App\Http\Controllers\Club;

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

    public function addArticleToClub()
    {
        dd('addArticleToClub');
    }

    public function removeAddedArticle()
    {
        dd('removeAddedArticle');
    }
}
