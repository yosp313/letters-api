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
            "title" => "required|string",
            "content" => "required|string",
            "sender_id" => "required|integer",
            "reciever_id" => "required|integer"
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
        $letter = Letter::query()->where('id', $request->letter)->firstOrFail();
        return response()->json($letter, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $letter = Letter::query()->where('id', $request->letter)->firstOrFail();

        $validated = $request->validate([
            "title" => "required|sometimes|string",
            "content" => "required|sometimes|string",
            "sender_id" => "required|sometimes|integer",
            "reciever_id" => "required|sometimes|integer"
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
        $letter = Letter::query()->where('id', $request->letter)->firstOrFail();
        $letter->delete();

        return response()->json(null, 204);
    }

}
