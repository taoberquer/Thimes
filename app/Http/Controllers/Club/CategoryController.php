<?php

namespace App\Http\Controllers\Club;

use App\ClubSport;
use App\Sport;
use App\SportArticle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $club = Auth::user()->getClub();

        return view('club.category', compact('club'));
    }

    public function addCategoryToClub(Request $request, int $categoryId)
    {
        if (!Sport::find($categoryId)) {
            return redirect()->back()->with('error', 'Cette catégorie n\'existe pas');
        }

        ClubSport::firstOrCreate([
            'sport_id' => $categoryId,
            'club_id' => Auth::user()->getClub()->getId(),
        ]);

        return redirect()->back()->with('success', 'La catégorie a été ajouté à votre club');
    }

    public function removeCategoryArticle(Request $request, int $categoryId)
    {
        if (!Sport::find($categoryId)) {
            return redirect()->back()->with('error', 'Cette catégorie n\'existe pas');
        }

        $clubSport = ClubSport::where([
            'sport_id' => $categoryId,
            'club_id' => Auth::user()->getClub()->getId(),
        ]);

        if (!empty($clubSport)) {
            $clubSport->delete();
        }

        return redirect()->back()->with('success', 'La catégorie a été retiré de votre club');
    }
}
