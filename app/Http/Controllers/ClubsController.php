<?php

namespace App\Http\Controllers;

use App\Club;
use Illuminate\Http\Request;

class ClubsController extends Controller
{
    public function index()
    {
        $clubs = Club::all()->sortBy('name');

        return view('clubs.index', compact('clubs'));
    }

    public function search(Request $request)
    {
        $clubs = Club::where('name', 'LIKE', '%' . $request->get('query') . '%');

        return view('clubs.search', compact('clubs'));
    }

    public function show(Request $request, int $clubId)
    {
        $club = Club::find($clubId);

        if (empty($club->first())) {
            return redirect()->route('home')->with('error', 'Ce club n\'éxiste pas');
        }

        return view('clubs.show', compact('club'));
    }

    public function showRss(Request $request, int $clubId)
    {
        $club = Club::find($clubId);

        if (empty($club)) {
            return redirect()->route('home')->with('error', 'Le club est introuvable');
        }

        return response()->view('clubs.rss', compact('club'))->withHeaders(['Content-Type' => 'text/xml']);
    }
}
