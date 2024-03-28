<?php

namespace App\Http\Controllers\Api;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::all();
        return response()->json($activities);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'activity_name' => 'required|max:100',
            'description' => 'required|max:500',
            'activity_date' => 'required|date_format:Y-m-d',
            'start_at' => 'required|date_format:Y-m-d H:i:s',
            'end_at' => 'required|date_format:Y-m-d H:i:s',
            'duration' => 'required|integer|min:0',
            'place_address' => 'required|max:100',
            'challengers_number' => 'required|integer|min:0', // check that integer is >= 0
            'difficulty' => 'required',
        ]);

        // create a new activity
        $activity = Activity::create($request->all());

        return response()->json([
            'status' => 'Success',
            'data' => $activity,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Activity::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'activity_name' => 'required|max:100',
            'description' => 'required|max:500',
            'activity_date' => 'required|date_format:Y-m-d', // Example'YYYY-MM-DD'
            'start_at' => 'required|date_format:Y-m-d H:i:s', // Example 'HH:MM:SS'
            'end_at' => 'required|date_format:Y-m-d H:i:s',
            'duration' => 'required|integer|min:0',
            'place_address' => 'required|max:100',
            'challengers_number' => 'required|integer|min:0', // check that integer is >= 0
            'difficulty' => 'required|in:débutant,intermédiaire,avancé',
        ]);
        // dd($request);

        $activity = Activity::find($id);
        $activity->update($request->all());

        return response()->json([
            'status' => 'Mise à jour avec succès'
        ]);
        // dd($activity);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();
        return response()->json([
            'status' => 'Supprimer avec succès'
        ]);
    }
}
