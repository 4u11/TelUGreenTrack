<!DOCTYPE html>
<html>
<head>
    <title>Add Schedule</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h2>Schedule New Pickup</h2>

    <form action="{{ route('schedules.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label>Location</label>
            <input type="text" name="location" class="form-control" required placeholder="e.g. Building A">
        </div>

        <div class="mb-3">
            <label>Waste Type</label>
            <select name="waste_type" class="form-control">
                <option value="Organic">Organic</option>
                <option value="Inorganic">Inorganic</option>
                <option value="Hazardous">Hazardous</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Pickup Time</label>
            <input type="datetime-local" name="pickup_time" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Save Schedule</button>
        <a href="{{ route('schedules.index') }}" class="btn btn-secondary">Back</a>
    </form>

</body>
</html>