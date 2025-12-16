<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Trashcan;
use Illuminate\Http\Request;

class TrashcanApiController extends Controller
{
    
    public function index()
    {
        $trashcans = Trashcan::orderBy('created_at', 'desc')->get();
        return response()->json([
            'status' => 'success',
            'data' => $trashcans
        ]);
    }

   
    public function store(Request $request)
    {
       
        $request->validate([
            'location' => 'required|string',
            'waste_type' => 'required|in:organic,inorganic,hazardous', // Sesuai value di <select> HTML kamu
            'capacity' => 'required|integer',
        ]);

        
        $trashcan = Trashcan::create([
            'location' => $request->location,
            'waste_type' => $request->waste_type,
            'capacity' => $request->capacity,
            'fill_level' => 0, // Default kosong saat baru dibuat
            'status' => 'active'
        ]);

       
        return response()->json([
            'status' => 'success',
            'message' => 'Trashcan added successfully',
            'data' => $trashcan
        ], 201);
    }

    // PUT 
    public function update(Request $request, $id)
    {
        $trashcan = Trashcan::find($id);
        if (!$trashcan) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $trashcan->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Trashcan updated',
            'data' => $trashcan
        ]);
    }

    // DELETE 
    public function destroy($id)
    {
        $trashcan = Trashcan::find($id);
        if ($trashcan) {
            $trashcan->delete();
            return response()->json(['message' => 'Deleted successfully']);
        }
        return response()->json(['message' => 'Not found'], 404);
    }
}