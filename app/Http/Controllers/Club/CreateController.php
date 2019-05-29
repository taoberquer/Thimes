<?php

namespace App\Http\Controllers\Club;

use App\Club;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function create()
    {
        return view('club.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|unique:clubs,name']);

        $club = Club::create(['name' => $validated['name']]);

        Auth::user()->club_id = $club->getId();
        Auth::user()->save();

        return redirect()->route('club.index');
    }
}
