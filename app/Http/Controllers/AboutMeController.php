<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Skill;

class AboutMeController extends Controller
{
    public function index()
    {
        // Fetch the first record from the about table
        $about = About::first();  // Changed to fetch a single record, not all

        // Fetch all records for other sections
        $education = Education::all();
        $experience = Experience::all();
        $skills = Skill::all();

        // Pass the fetched data to the view
        return view('aboutme.index', compact('about', 'education', 'experience', 'skills'));
    }
}
