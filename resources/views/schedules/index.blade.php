<!DOCTYPE html>
<html>
<head>
    <title>Waste Schedules</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h2>Waste Collection Schedules</h2>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('schedules.create') }}" class="btn btn-primary mb-3">Add New Schedule</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Location</th>
                <th>Waste Type</th>
                <th>Pickup Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedules as $schedule)
            <tr>
                <td>{{ $schedule->location }}</td>
                <td>{{ $schedule->waste_type }}</td>
                <td>{{ $schedule->pickup_time }}</td>
                <td>
                    <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    
                    <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>