<?php

namespace App\Http\Controllers\Api;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();
        return response()->json($comments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|max:255',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg', //image uploaded as a file
            'tags' => 'nullable|array', //tags is an array of strings
        ]);

        $filename = "";
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filenameWithoutExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $filenameWithoutExt . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/storage/uploads', $filename);
            // dd($filename);
        } else {
            $filename = Null;
        }

        $comment = Comment::create($request->all());

        return response()->json([
            'status' => 'Success',
            'data' => $comment,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Comment::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|max:255',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg', //image uploaded as a file
            'tags' => 'nullable|array', //tags is an array of strings
        ]);

        $filename = "";
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filenameWithoutExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $filenameWithoutExt . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/storage/uploads', $filename);
            // dd($filename);
        } else {
            $filename = Null;
        }

        $comment = Comment::findOrFail($id);
        $comment->update($request->all());

        return response()->json([
            'status' => 'Mise à jour avec succès'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->json([
            'status' => 'Supprimer avec succès'
        ]);
    }
}
