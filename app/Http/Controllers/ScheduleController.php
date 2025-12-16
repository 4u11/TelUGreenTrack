<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    // (READ)
    public function index()
    {
        $schedules = Schedule::all(); 
        return view('schedules.index', compact('schedules'));
    }

    //(CREATE form)
    public function create()
    {
        return view('schedules.create');
    }

    //(STORE)
   public function store(Request $request)
{
    $request->validate([
        'location' => 'required',
        'waste_type' => 'required',
        'pickup_time' => 'required',
    ]);
    Schedule::create($request->all());
    return redirect()->route('schedules.index')
                     ->with('success', 'Schedule saved successfully!');
}

    //(EDIT form)
    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('schedules.edit', compact('schedule'));
    }

    // (UPDATE)
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'location' => 'required',
            'waste_type' => 'required',
            'pickup_time' => 'required',
        ]);

        $schedule = Schedule::findOrFail($id);
        $schedule->update($request->all());
        
        return redirect()->route('schedules.index')
                         ->with('success', 'Schedule updated successfully!');
    }
    //(DELETE)
    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();
        return redirect()->route('schedules.index')->with('success', 'Schedule deleted successfully!');
    }
}