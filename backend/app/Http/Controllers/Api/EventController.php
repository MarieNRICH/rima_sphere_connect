<?php

namespace App\Http\Controllers\Api;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return response()->json($events);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_name' => 'required|max:100', // Validate that event name is required and maximum 100 characters long
            'event_date' => 'required|date_format:Y-m-d', // Validate that event date is required and in the format 'YYYY-MM-DD'
            'place_address' => 'required|max:100', // Validate that place address is required and maximum 100 characters long
            'start_at' => 'required|date_format:H:i', // Validate that start time is required and in the format 'HH:MM'
            'end_at' => 'required|date_format:H:i', // Validate that end time is required and in the format 'HH:MM'
            'description' => 'required|max:500', // Validate that description is required and maximum 500 characters long
            'status' => 'required|in:pending,approved,cancelled', // Validate that status is required and one of the specified values ('pending', 'approved', 'cancelled')
            'duration' => 'required|integer|min:0', // Validate that duration is required and is an integer greater than or equal to zero
            'volunteer' => 'nullable|integer|min:0', // Validate that volunteer is either nullable or an integer greater than or equal to zero
            'participant' => 'nullable|integer|min:0', // Validate that participant is either nullable or an integer greater than or equal to zero            
        ]);

        $event = Event::create($request->all());
        return response()->json([
            'status' => 'Success',
            'data' => $event,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Event::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate($request, [
            'event_name' => 'required|max:100', // Validate that event name is required and maximum 100 characters long
            'event_date' => 'required|date_format:Y-m-d', // Validate that event date is required and in the format 'YYYY-MM-DD'
            'place_address' => 'required|max:100', // Validate that place address is required and maximum 100 characters long
            'start_at' => 'required|date_format:H:i', // Validate that start time is required and in the format 'HH:MM'
            'end_at' => 'required|date_format:H:i', // Validate that end time is required and in the format 'HH:MM'
            'description' => 'required|max:500', // Validate that description is required and maximum 500 characters long
            'status' => 'required|in:pending,approved,cancelled', // Validate that status is required and one of the specified values ('pending', 'approved', 'cancelled')
            'duration' => 'required|integer|min:0', // Validate that duration is required and is an integer greater than or equal to zero
            'volunteer' => 'nullable|integer|min:0', // Validate that volunteer is either nullable or an integer greater than or equal to zero
            'participant' => 'nullable|integer|min:0', // Validate that participant is either nullable or an integer greater than or equal to zero            
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return response()->json([
            'status' => 'Supprimer avec succès'
        ]);
    }
}
