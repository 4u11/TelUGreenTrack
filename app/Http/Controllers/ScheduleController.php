<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Http\Resources\ScheduleResources;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::all();
    return view('schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('schedules.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'location' => 'required',
        'pickup_time' => 'required|date',
        'waste_type' => 'required'
    ]);

    Schedule::create($request->all());
    return redirect()->route('schedules.index')->with('success', 'Pickup scheduled!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        return view('schedules.edit', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        $schedule->update($request->all());
    return redirect()->route('schedules.index')->with('success', 'Schedule updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
    return redirect()->route('schedules.index')->with('success', 'Schedule deleted');
    }
}
