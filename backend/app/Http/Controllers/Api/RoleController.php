<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return response()->json($roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles|max:255',
            'description' => 'nullable|max:255',
            // Add more validation rules as needed
        ]);

        // Create a new role
        $role = Role::create($request->all());

        return response()->json([
            'status' => 'Success',
            'data' => $role,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Role::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255|unique:roles,name,' . $id,
            'description' => 'nullable|max:255',
            // Add more validation rules as needed
        ]);

        $role = Role::findOrFail($id);
        $role->update($request->all());

        return response()->json([
            'status' => 'Mise à jour avec succès'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return response()->json([
            'status' => 'Deleted successfully'
        ]);
    }
}
