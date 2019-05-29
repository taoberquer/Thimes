<?php

namespace App\Http\Controllers;

use App\Flux;
use Illuminate\Http\Request;

class FluxesController extends Controller
{
    public function index(Request $request, int $fluxId)
    {
        $flux = Flux::find($fluxId);

        if (empty($flux)) {
            return redirect()->route('home')->with('error', 'Cette source n\'existe pas.');
        }

        return view('flux.index', compact('flux'));
    }
}
