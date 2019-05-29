<?php

namespace App\Http\Controllers\Administration;

use App\Flux;
use App\Models\Engine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FluxesController extends Controller
{
    public function forceUpdate()
    {
        $engine = new Engine(Flux::allAvailable());
        $engine->run(true);

        return redirect()->route('home')->with('success', 'Les sources ont été mises à jour');
    }
}
