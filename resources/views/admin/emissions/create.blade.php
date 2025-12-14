@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Emission Data</h2>

    <form method="POST" action="{{ route('admin.emissions.store') }}">
        @csrf

        <div class="mb-3">
            <label>Waste Type</label>
            <input type="text" name="waste_type" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Volume</label>
            <input type="number" step="0.01" name="volume" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>CO₂ Equivalent (kg)</label>
            <input type="number" step="0.01" name="co2_equivalent" class="form-control" required>
        </div>

        <button class="btn btn-success">Save</button>
        <a href="{{ route('admin.emissions.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
