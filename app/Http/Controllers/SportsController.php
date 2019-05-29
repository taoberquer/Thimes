<?php

namespace App\Http\Controllers;

use App\Sport;
use Illuminate\Http\Request;

class SportsController extends Controller
{
    public function index(Request $request, int $sportId)
    {
        $sport = Sport::find($sportId);

        if (empty($sport)) {
            return redirect()->route('home')->with('error', 'Cette catégorie n\'existe pas.');
        }

        return view('sport.index', compact('sport'));
    }
}
