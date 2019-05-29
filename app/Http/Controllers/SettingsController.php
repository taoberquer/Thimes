<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function edit()
    {
        $user = Auth::user();

        return view('settings.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.Auth::user()->getId(),
            'password' => 'sometimes|confirmed'
        ]);
        Auth::user()->name = $validated['name'];
        Auth::user()->email = $validated['email'];
        Auth::user()->password = bcrypt($validated['password']);
        Auth::user()->save();

        return redirect()->route('settings.edit')->with('succes', 'Les données ont été mises à jour');
    }
}
