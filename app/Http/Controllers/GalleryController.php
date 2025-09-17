<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the galleries.
     */
    public function index()
    {
        return Gallery::all();
    }

    /**
     * Store a newly created gallery in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|max:5120',
            // Add other fields as necessary
        ]);

        return Gallery::create($validated);
    }

    /**
     * Display the specified gallery.
     */
    public function show(Gallery $gallery)
    {
        return $gallery;
    }

    /**
     * Update the specified gallery in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'image' => 'sometimes|image|max:5120',
            // Add other fields as necessary
        ]);

        $gallery->update($validated);
        return $gallery;
    }

    /**
     * Remove the specified gallery from storage.
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return response()->noContent();
    }
}
