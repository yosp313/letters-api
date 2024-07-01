<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use Illuminate\Http\Request;

class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $letters = Letter::all();
        return response()->json($letters, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            "title" => "required",
            "content" => "required",
            "sender_id" => "required",
            "reciever_id" => "required"
        ]);

        $letter = Letter::create($validated);

        return response()->json($letter, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        $letter = Letter::find($request->id);

        return response()->json($letter, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Letter $letter)
    {
        //
        $letter = Letter::find($request->id);

        $validated = $request->validate([
            "title" => "required",
            "content" => "required",
            "sender_id" => "required",
            "reciever_id" => "required"
        ]);

        $letter->update($validated);

        return response()->json($letter, 204);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        $letter = Letter::find($request->id);
        $letter->delete();

        return response()->json(null, 204);
    }

}
