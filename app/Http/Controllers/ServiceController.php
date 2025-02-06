<?php
namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display the service form and stored data, and handle editing logic.
     */
    public function index(Request $request)
    {
        $services = Service::all();
        $editService = null;

        // If editService is provided, fetch the service by its ID
        if ($request->has('editService')) {
            $editService = Service::findOrFail($request->editService);
        }

        return view('services.create', compact('services', 'editService'));
    }

    /**
     * Store a newly created service.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Service::create([
            'title' => $request->title,
            'icon' => $request->icon,
            'description' => $request->description,
        ]);

        return redirect()->route('services.index')->with('success', 'Service created successfully!');
    }

    /**
     * Update an existing service.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $service = Service::findOrFail($id);

        $service->update($request->only(['title', 'icon', 'description']));

        return redirect()->route('services.index')->with('success', 'Service updated successfully!');
    }

    /**
     * Remove the specified service.
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }
}
