<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    // Display all education records
    public function index()
    {
        // Fetch all education records
        $educations = Education::all();
        
        // Return view with the educations data
        return view('aboutme.education', compact('educations')); // Pass educations to the view
    }

    // Show form to create a new education record
    public function create()
    {
        // Create an empty $education object for the form
        $education = new Education();
        return view('aboutme.education', compact('education')); // Pass empty education object for form
    }

    // Store a newly created education record
    public function store(Request $request)
    {
        $request->validate([
            'degree' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'start_year' => 'required|string',
            'end_year' => 'required|string',
            'description' => 'nullable|string',
        ]);

        Education::create($request->all());

        return redirect()->route('education.index')->with('success', 'Education record created successfully');
    }

    // Show a single education record (optional: for viewing individual records)
    public function show(Education $education)
    {
        return view('aboutme.education', compact('education')); // Display a single education record
    }

    // Show form to edit an education record
    public function edit(Education $education)
    {
        // Fetch all education records
        $educations = Education::all();
        
        // Pass both the education records and the specific record being edited to the view
        return view('aboutme.education', compact('education', 'educations'));
    }
    

    // Update an education record
    public function update(Request $request, Education $education)
    {
        $request->validate([
            'degree' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'start_year' => 'required|string',
            'end_year' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $education->update($request->all());

        return redirect()->route('education.index')->with('success', 'Education record updated successfully');
    }

    // Delete an education record
    public function destroy(Education $education)
    {
        $education->delete();

        return redirect()->route('education.index')->with('success', 'Education record deleted successfully');
    }
}
