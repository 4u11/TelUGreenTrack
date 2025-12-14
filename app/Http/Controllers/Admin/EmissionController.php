<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Emission;
use Illuminate\Http\Request;

class EmissionController extends Controller
{
    public function index()
    {
        $emissions = Emission::latest()->get();
        return view('admin.emissions.index', compact('emissions'));
    }

    public function create()
    {
        return view('admin.emissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'waste_type' => 'required|string|max:255',
            'volume' => 'required|numeric|min:0',
            'co2_equivalent' => 'required|numeric|min:0',
        ]);

        Emission::create($request->all());

        return redirect()->route('admin.emissions.index')
            ->with('success', 'Emission data added successfully.');
    }

    public function edit(Emission $emission)
    {
        return view('admin.emissions.edit', compact('emission'));
    }

    public function update(Request $request, Emission $emission)
    {
        $request->validate([
            'waste_type' => 'required|string|max:255',
            'volume' => 'required|numeric|min:0',
            'co2_equivalent' => 'required|numeric|min:0',
        ]);

        $emission->update($request->all());

        return redirect()->route('admin.emissions.index')
            ->with('success', 'Emission data updated.');
    }

    public function destroy(Emission $emission)
    {
        $emission->delete();

        return redirect()->route('admin.emissions.index')
            ->with('success', 'Emission record deleted.');
    }
}
