<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroupRegistration;

class GroupRegistrationController extends Controller
{
    public function create()
    {
        return view('group.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'team_name' => 'required|string|max:255',
            'game' => 'required|string|max:255',
            'captain_name' => 'required|string|max:255',
            'members' => 'required|array|min:4|max:4',
            'members.*' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('group_images', 'public');

        GroupRegistration::create([
            'team_name' => $validated['team_name'],
            'game' => $validated['game'],
            'captain_name' => $validated['captain_name'],
            'members' => json_encode($validated['members']),
            'image_path' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Inscripción grupal guardada con éxito.');
    }
}

