<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trashcan;

class TrashcanApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $trashcans = Trashcan::all();
        // Return JSON with 200 OK status
        return response()->json([
            'status' => 'success',
            'data' => $trashcans
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'location' => 'required|string|max:255',
            'waste_type' => 'required|in:organic,inorganic,hazardous',
            'capacity' => 'required|integer|min:1',
        ]);

        $trashcan = Trashcan::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Trashcan created successfully',
            'data' => $trashcan
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $trashcan = Trashcan::find($id);

        if (!$trashcan) {
            return response()->json(['message' => 'Trashcan not found'], 404);
        }

        return response()->json(['data' => $trashcan], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $trashcan = Trashcan::find($id);

        if (!$trashcan) {
            return response()->json(['message' => 'Trashcan not found'], 404);
        }

        $request->validate([
            'location' => 'sometimes|string|max:255',
            'waste_type' => 'sometimes|in:organic,inorganic,hazardous',
            'capacity' => 'sometimes|integer|min:1',
            'fill_level' => 'sometimes|integer|min:0|max:100'
        ]);

        $trashcan->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Trashcan updated successfully',
            'data' => $trashcan
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $trashcan = Trashcan::find($id);

        if (!$trashcan) {
            return response()->json(['message' => 'Trashcan not found'], 404);
        }

        $trashcan->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Trashcan deleted successfully'
        ], 200);
    }
}
