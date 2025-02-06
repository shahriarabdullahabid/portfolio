<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    // Display the 'About Me' page
    public function index()
    {
        $about = About::first(); // To handle edit
        $aboutList = About::all(); // For listing all About Me entries
        return view('aboutme.about',  ['about' => $about, 'aboutList' => $aboutList]);
    }
    
    // Store or update the About Me details
    public function storeOrUpdate(Request $request)
    {
        // Validate the input
        $request->validate([
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the image upload (if any)
        $imagePath = null;
        if ($request->hasFile('image')) {
            // If an image exists, store it and get the path
            $imagePath = $request->file('image')->store('images/about', 'public');
        }

        // Check if an About Me record exists
        $about = About::first(); // Get the first record or create a new one
        if (!$about) {
            // Create new About record if it doesn't exist
            $about = new About();
        }

        // Set the description
        $about->description = $request->description;

        // If a new image is uploaded, replace the old image
        if ($imagePath) {
            // Delete old image if exists
            if ($about->image) {
                Storage::delete('public/' . $about->image);
            }
            $about->image = $imagePath;
        }

        // Save the About record (Create or Update)
        $about->save();

        // Redirect back with a success message
        return redirect()->route('about.index')->with('success', 'About Me information saved successfully.');
    }

    // Delete the About Me record (including the image)
    public function destroy($id)
    {
        $about = About::findOrFail($id);

        // Delete the image from storage if it exists
        if ($about->image) {
            Storage::delete('public/' . $about->image);
        }

        // Delete the About record
        $about->delete();

        // Redirect back with a success message
        return redirect()->route('about.index')->with('success', 'About Me information deleted successfully.');
    }
}
