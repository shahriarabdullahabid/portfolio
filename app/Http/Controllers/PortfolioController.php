<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display the portfolio form and stored data, and handle editing logic.
     */
    public function index(Request $request)
    {
        $portfolios = Portfolio::all();
        $editPortfolio = null;

        if ($request->has('editPortfolio')) {
            $editPortfolio = Portfolio::find($request->editPortfolio);
        }

        return view('portfolio.create', compact('portfolios', 'editPortfolio'));
    }

    /**
     * Store a newly created portfolio.
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'live_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'technologies' => 'required|string',
            'features' => 'required|string',
        ]);

        // Handling image upload
        $imagePath = $request->file('image')->store('images', 'public');

        Portfolio::create([
            'project_name' => $request->project_name,
            'category' => $request->category,
            'image' => $imagePath,
            'live_url' => $request->live_url,
            'github_url' => $request->github_url,
            'technologies' => json_encode(explode(',', $request->technologies)),
            'features' => json_encode(explode(',', $request->features)),
        ]);

        return redirect()->route('portfolio.index')->with('success', 'Portfolio created successfully!');
    }

    /**
     * Show the portfolio form for editing.
     */
    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolios = Portfolio::all(); // Add this line to pass portfolios to the view
        return view('portfolio.create', compact('portfolio', 'portfolios')); // Pass both portfolio and portfolios
    }

    /**
     * Update an existing portfolio.
     */
    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);
// Validate the request
$validated = $request->validate([
    'project_name' => 'required|string|max:255',
    'category' => 'required|string|max:255',
    'image' => 'nullable|image', 
    'live_url' => 'nullable|url',
    'github_url' => 'nullable|url',
    'technologies' => 'required|string',
    'features' => 'required|string',
]);


        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image from storage
            if (file_exists(public_path('storage/'.$portfolio->image))) {
                unlink(public_path('storage/'.$portfolio->image));
            }

            // Upload the new image
            $imagePath = $request->file('image')->store('images', 'public');
            $portfolio->image = $imagePath;
        }

        // Update the portfolio with new data
        $portfolio->update([
            'project_name' => $request->project_name,
            'category' => $request->category,
            'live_url' => $request->live_url,
            'github_url' => $request->github_url,
            'technologies' => json_encode(explode(',', $request->technologies)),
            'features' => json_encode(explode(',', $request->features)),
        ]);

        // Redirect back to the portfolio index page with success message
        return redirect()->route('portfolio.index')->with('success', 'Portfolio updated successfully!');
    }




public function viewAll()
{
    // Fetch all portfolios from the database
    $portfolios = Portfolio::all();

    // Return the view with the fetched portfolios
    return view('portfolio.index', compact('portfolios'));
}



    /**
     * Remove the specified portfolio.
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        // Delete image from storage if it exists
        if ($portfolio->image && Storage::disk('public')->exists($portfolio->image)) {
            Storage::disk('public')->delete($portfolio->image);
        }

        $portfolio->delete();

        return redirect()->route('portfolio.index')->with('success', 'Portfolio deleted successfully!');
    }



}