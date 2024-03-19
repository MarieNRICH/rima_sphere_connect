<?php

namespace App\Http\Controllers\Api;

use App\Models\Picture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pictures = Picture::all();
        return response()->json($pictures);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'picture_name' => 'required|max:50',
            'description' => 'required|max:255',
        ]);
        // dd($request);
        Picture::create($request->all());

        return redirect()->route('pictures.index')
            ->with('success', 'image ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Picture::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'picture_name' => 'required|max:50',
            'description' => 'required|max:255',
        ]);
        // dd($request);
        $picture = Picture::findOrFail($id);
        $picture->update($request->all());

        return redirect()->route('pictures.index')
            ->with('success', 'image mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $picture = Picture::findOrFail($id);
        $picture->delete();
        return response()->json([
            'status' => 'Deleted successfully'
        ]);
    }
}
