<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //utilisé précédemment, remplacé sortByDesc('pub_date')
        //$articles = Article::allWithPagination();
        $articles = Article::orderBy('pub_date', 'desc')->paginate(15);

        return view('home', compact('articles'));
    }
}
