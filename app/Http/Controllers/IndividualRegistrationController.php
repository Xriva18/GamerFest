<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IndividualRegistration;

class IndividualRegistrationController extends Controller
{
    public function create()
    {
        return view('individual.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'game' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('individual_images', 'public');

        IndividualRegistration::create([
            'name' => $validated['name'],
            'game' => $validated['game'],
            'image_path' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Inscripción individual guardada con éxito.');
    }
}

