<?php

namespace App\Http\Controllers\Api;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all sections
        $sections = Section::all();
        // Return all the section information in JSON 
        return response()->json($sections);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'section_name' => 'required|max:255',
            'number_of_member' => 'required|integer|min:0',
            'material' => 'nullable|max:255',
            'ffck_licence_number' => 'nullable|max:255',
            'member_ship_price' => 'required|numeric|min:0',
            'activity_contribution' => 'required|numeric|min:0',
        ]);

        // Create a new section
        $section = Section::create($request->all());

        return response()->json([
            'status' => 'Success',
            'data' => $section,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Section::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'section_name' => 'required|max:255',
            'number_of_member' => 'required|integer|min:0',
            'material' => 'nullable|max:255',
            'ffck_licence_number' => 'nullable|max:255',
            'member_ship_price' => 'required|numeric|min:0',
            'activity_contribution' => 'required|numeric|min:0',
        ]);

        $section = Section::findOrFail($id);
        $section->update($request->all());

        return response()->json([
            'status' => 'Updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $section = Section::findOrFail($id);
        $section->delete();
        return response()->json([
            'status' => 'Deleted successfully'
        ]);
    }
}
