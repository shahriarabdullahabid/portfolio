<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\ContactDetail;
use App\Models\ContactMe;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Skill;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch the first record from the about table
        $about = About::first();  // Fetch a single record
        $contactDetails = ContactDetail::all();
        $contactMessages = ContactMe::all();
        $education = Education::all();
        $experience = Experience::all();
        // Limit portfolios to 2 for the home page
        $portfolios = Portfolio::take(2)->get();  // Limit to 2 items
        $services = Service::all();
        $skills = Skill::all();

        // Pass the data to the home view
        return view('home.homeall', compact(
            'about', 'contactDetails', 'contactMessages', 'education', 
            'experience', 'portfolios', 'services', 'skills'
        ));
    }
}
