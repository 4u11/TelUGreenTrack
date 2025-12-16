@extends('layouts.app')

@section('title', 'Edit Schedule')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-header bg-warning text-white rounded-top-4 p-3">
                <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Schedule</h5>
            </div>
            <div class="card-body p-4">
                
                <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold text-secondary">Location</label>
                        <input type="text" name="location" value="{{ $schedule->location }}" class="form-control rounded-3" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-secondary">Waste Type</label>
                        <select name="waste_type" class="form-select rounded-3">
                            <option value="Organic" {{ $schedule->waste_type == 'Organic' ? 'selected' : '' }}>Organic</option>
                            <option value="Inorganic" {{ $schedule->waste_type == 'Inorganic' ? 'selected' : '' }}>Inorganic</option>
                            <option value="Hazardous" {{ $schedule->waste_type == 'Hazardous' ? 'selected' : '' }}>Hazardous</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold text-secondary">Pickup Time</label>
                        <input type="datetime-local" name="pickup_time" value="{{ $schedule->pickup_time }}" class="form-control rounded-3" required>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('schedules.index') }}" class="btn btn-secondary rounded-pill px-4">Cancel</a>
                        <button type="submit" class="btn btn-warning text-white rounded-pill px-4">Update Schedule</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection