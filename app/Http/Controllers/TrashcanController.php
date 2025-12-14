<?php

namespace App\Http\Controllers;

use App\Models\Trashcan;
use Illuminate\Http\Request;

class TrashcanController extends Controller
{

    public function index()
    {
        return response()->json(['data' => Trashcan::all()], 200);
    }
    public function show($id)
    {
        return response()->json(['data' => Trashcan::findOrFail($id)], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required|string',
            'waste_type' => 'required|in:organic,inorganic,hazardous',
            'capacity' => 'required|integer',
        ]);

        $trashcan = Trashcan::create([
            'location' => $request->location,
            'waste_type' => $request->waste_type,
            'capacity' => $request->capacity,
            'fill_level' => 0
        ]);

        return response()->json(['message' => 'Created', 'data' => $trashcan], 201);
    }
    public function update(Request $request, $id)
    {
        $trashcan = Trashcan::findOrFail($id);
        $trashcan->update($request->all());
        return response()->json(['message' => 'Updated', 'data' => $trashcan], 200);
    }
    public function destroy($id)
    {
        Trashcan::destroy($id);
        return response()->json(['message' => 'Deleted'], 200);
    }
}
