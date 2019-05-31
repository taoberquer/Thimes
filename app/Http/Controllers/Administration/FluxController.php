<?php

namespace App\Http\Controllers\Administration;

use App\Flux;
use App\Models\Engine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FluxController extends Controller
{
    public function forceUpdate()
    {
        $engine = new Engine(Flux::allAvailable());
        $engine->run(true);
        return redirect()->route('home')->with('success', 'Les sources ont été mises à jour');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fluxes = Flux::all();

        return view('administration.fluxes.index', compact('fluxes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'url' => 'required',
            'ttl' => 'required|integer'
        ]);

        Flux::create($validated);

        return redirect()->route('administration.fluxes.index')->with('success', 'Flux ajouté.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flux = Flux::find($id);

        return view('administration.fluxes.edit', compact('flux'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $flux = Flux::find($id);

        if (!$flux) {
            return redirect()->route('administration.fluxes.index')->with('error', 'Flux introuvable.');
        }

        $validated = $request->validate([
            'title' => 'required',
            'url' => 'required',
            'ttl' => 'required|',
            'active' => 'sometimes'
        ]);

        if (empty($validated['active'])) {
            $validated['active'] = false;
        }



        $flux->update($validated);

        return redirect()->route('administration.fluxes.edit', $flux->getId())
            ->with('success', 'Flux mis à jour.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flux = Flux::find($id);

        if ($flux) {
            $flux->delete();
        }

        return redirect()->route('administration.fluxes.index')->with('success', 'Flux supprimé.');
    }
}
