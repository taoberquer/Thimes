<?php

namespace App\Http\Controllers;

use App\Club;
use Illuminate\Http\Request;

class ClubsController extends Controller
{
    public function showRss(Request $request, int $clubId)
    {
        dd('showRss');
    }

    public function search(Request $request)
    {
        $clubs = Club::where('name', 'LIKE', '%' . $request->get('query') . '%');

        return view('clubs.search', compact('clubs'));
    }
}
