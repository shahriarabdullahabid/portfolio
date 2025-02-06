<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::all();
        return view('aboutme.experience', compact('experiences'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'start_year' => 'required|string',
            'end_year' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        Experience::create($request->all());
        return redirect()->route('experience.index')->with('success', 'Experience added successfully.');
    }

    public function edit($id)
    {
        $experiences = Experience::all();
        $item = Experience::findOrFail($id);
        return view('aboutme.experience', compact('experiences', 'item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'start_year' => 'required|string',
            'end_year' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $experience = Experience::findOrFail($id);
        $experience->update($request->all());
        return redirect()->route('experience.index')->with('success', 'Experience updated successfully.');
    }

    public function destroy($id)
    {
        Experience::findOrFail($id)->delete();
        return redirect()->route('experience.index')->with('success', 'Experience deleted successfully.');
    }
}
