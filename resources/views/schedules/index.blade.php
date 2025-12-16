@extends('layouts.app')

@section('title', 'Schedules List')

@section('content')
<style>
    :root { --primary-green: #10b981; --light-green: #d1fae5; --accent-green: #059669; }
    .page-header { border-bottom: 2px solid var(--light-green); padding-bottom: 1rem; margin-bottom: 2rem; }
    .page-header h2 { color: var(--accent-green); font-weight: 700; }
    .btn-primary-green { background: linear-gradient(135deg, var(--primary-green) 0%, var(--accent-green) 100%); border: none; color: white; border-radius: 50px; padding: 10px 25px; }
    .btn-primary-green:hover { color: white; opacity: 0.9; }
    .table-green { background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 20px rgba(16, 185, 129, 0.1); }
    .table-green thead { background: linear-gradient(135deg, var(--primary-green) 0%, var(--accent-green) 100%); color: white; }
    .waste-badge { padding: 0.4rem 1rem; border-radius: 50px; font-weight: 600; font-size: 0.85rem; }
    .organic { background: #dcfce7; color: #16a34a; }
    .inorganic { background: #dbeafe; color: #2563eb; }
    .hazardous { background: #fee2e2; color: #dc2626; }
</style>

<div class="page-header">
    <h2><i class="fas fa-calendar-alt me-2"></i>Waste Collection Schedules</h2>
    <p class="text-muted mb-0">Manage and track all scheduled pickups</p>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="d-flex justify-content-end mb-4">
    <a href="{{ route('schedules.create') }}" class="btn btn-primary-green">
        <i class="fas fa-plus me-2"></i>Add New Schedule
    </a>
</div>

<div class="card table-responsive">
    <table class="table table-hover table-green mb-0">
        <thead>
            <tr>
                <th class="p-3">Location</th>
                <th class="p-3">Waste Type</th>
                <th class="p-3">Pickup Time</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($schedules as $schedule)
            <tr>
                <td class="p-3 align-middle">{{ $schedule->location }}</td>
                <td class="p-3 align-middle">
                    <span class="waste-badge {{ strtolower($schedule->waste_type) }}">
                        {{ $schedule->waste_type }}
                    </span>
                </td>
                <td class="p-3 align-middle">{{ \Carbon\Carbon::parse($schedule->pickup_time)->format('d M Y, H:i') }}</td>
                <td class="p-3 align-middle">
                    <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-warning btn-sm rounded-pill text-white me-1">
                        Edit
                    </a>
                    
                    <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm rounded-pill" onclick="return confirm('Are you sure to delete this schedule?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center p-5 text-muted">No schedules found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection