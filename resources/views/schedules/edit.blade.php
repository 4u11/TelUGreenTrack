<!DOCTYPE html>
<html>
<head>
    <title>Edit Schedule</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h2>Edit Schedule</h2>

    <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
        @csrf
        @method('PUT') <div class="mb-3">
            <label>Location</label>
            <input type="text" name="location" value="{{ $schedule->location }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Waste Type</label>
            <select name="waste_type" class="form-control">
                <option value="Organic" {{ $schedule->waste_type == 'Organic' ? 'selected' : '' }}>Organic</option>
                <option value="Inorganic" {{ $schedule->waste_type == 'Inorganic' ? 'selected' : '' }}>Inorganic</option>
                <option value="Hazardous" {{ $schedule->waste_type == 'Hazardous' ? 'selected' : '' }}>Hazardous</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Pickup Time</label>
            <input type="datetime-local" name="pickup_time" value="{{ date('Y-m-d\TH:i', strtotime($schedule->pickup_time)) }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-warning">Update Schedule</button>
        <a href="{{ route('schedules.index') }}" class="btn btn-secondary">Back</a>
    </form>

</body>
</html>