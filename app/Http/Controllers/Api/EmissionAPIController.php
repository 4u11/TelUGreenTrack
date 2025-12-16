<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Emission;
use Illuminate\Http\Request;

class EmissionApiController extends Controller
{
    /**
     * GET /api/emissions
     * Mengambil semua data emisi
     */
    public function index()
    {
        $emissions = Emission::latest()->get();

        return response()->json([
            'status' => 'success',
            'data' => $emissions
        ], 200);
    }

    /**
     * POST /api/emissions
     * Menambah data emisi baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'waste_type' => 'required|string|max:255',
            'volume' => 'required|numeric|min:0',
            'co2_equivalent' => 'required|numeric|min:0',
            // Tambahkan validasi lain jika ada kolom seperti 'date' atau 'location'
        ]);
        $emission = Emission::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Emission data created successfully',
            'data' => $emission
        ], 201);
    }

    /**
     * GET /api/emissions/{id}
     * Mengambil detail 1 data emisi
     */
    public function show($id)
    {
        $emission = Emission::find($id);

        if (!$emission) {
            return response()->json(['status' => 'error', 'message' => 'Emission data not found'], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $emission
        ], 200);
    }

    /**
     * PUT/PATCH /api/emissions/{id}
     * Update data emisi
     */
    public function update(Request $request, $id)
    {
        $emission = Emission::find($id);

        if (!$emission) {
            return response()->json(['status' => 'error', 'message' => 'Emission data not found'], 404);
        }


        $request->validate([
            'waste_type' => 'required|string|max:255',
            'volume' => 'required|numeric|min:0',
            'co2_equivalent' => 'required|numeric|min:0',
        ]);

        $emission->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Emission data updated successfully',
            'data' => $emission
        ], 200);
    }

    /**
     * DELETE /api/emissions/{id}
     * Hapus data emisi
     */
    public function destroy($id)
    {
        $emission = Emission::find($id);

        if (!$emission) {
            return response()->json(['status' => 'error', 'message' => 'Emission data not found'], 404);
        }

        $emission->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Emission record deleted successfully'
        ], 200);
    }
}