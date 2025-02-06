<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    // Display all skills records
    public function index()
    {
        // Fetch all skills records
        $skills = Skill::all();
        
        // Return view with the skills data
        return view('aboutme.skills', compact('skills'));
    }

    // Show form to create a new skill record
    public function create()
    {
        // Create an empty $skills object for the form
        $skills = new Skill();
        return view('aboutme.skills', compact('skills'));
    }

    // Store a newly created skill record
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'proficiency' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Skill::create($request->all());

        return redirect()->route('skills.index')->with('success', 'Skill record created successfully');
    }

    // Show a single skill record (optional: for viewing individual records)
    public function show(Skill $skills)
    {
        return view('aboutme.skills', compact('skill','skiils')); // Display a single skill record
    }

    // Show form to edit a skill record
    public function edit($id)
    {
        $item = Skill::findOrFail($id);  // Find the skill by id
        $skills = Skill::all(); // Ensure $skills is fetched
        return view('aboutme.skills', compact('item', 'skills'));
    }

    // Update a skill record
    public function update(Request $request, $id)
    {
        // Validate incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'proficiency' => 'required|numeric|max:100|min:0',
            'description' => 'nullable|string',
        ]);
    
        // Find the skill by id
        $skill = Skill::findOrFail($id);
    
        // Update the skill with the validated data
        $skill->update([
            'name' => $request->name,
            'category' => $request->category,
            'proficiency' => $request->proficiency,
            'description' => $request->description,
        ]);
    
        // Redirect back to skills index with a success message
        return redirect()->route('skills.index')->with('success', 'Skill record updated successfully');
    }
    

// Delete a skill record
public function destroy($id)
{
    // Find the skill by ID
    $skill = Skill::findOrFail($id);

    // Delete the skill record
    $skill->delete();

    // Redirect with success message
    return redirect()->route('skills.index')->with('success', 'Skill record deleted successfully');
}

}
