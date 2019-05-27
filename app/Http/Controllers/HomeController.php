<?php

namespace App\Http\Controllers;

use App\Article;
use App\Flux;
use App\Sport;
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
        $articles = Article::orderBy('pub_date', 'desc')->paginate(15);
        $fluxes = Flux::all();
        $sports = Sport::all();

        return view('home', compact(['articles', 'fluxes', 'sports']));
    }
}
