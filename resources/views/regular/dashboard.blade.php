<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - GreenTrack</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card:hover { transform: translateY(-5px); transition: 0.3s; cursor: pointer; }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-light bg-white shadow-sm mb-5">
        <div class="container">
            <span class="navbar-brand mb-0 h1 text-success">GreenTrack Dashboard</span>
            <button onclick="logout()" class="btn btn-outline-danger btn-sm">Logout</button>
        </div>
    </nav>

    <div class="container">
        <div class="alert alert-success text-center mb-4">
            Welcome back! What would you like to check today?
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm text-center p-3">
                    <div class="card-body">
                        <div class="h1 mb-3">📍</div>
                        <h5 class="card-title">Find Trashcans</h5>
                        <p class="card-text text-muted">Locate nearby bins and check fill levels.</p>
                        <a href="/trashcans-ui" class="btn btn-success w-100 stretched-link">View Map</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm text-center p-3">
                    <div class="card-body">
                        <div class="h1 mb-3">🚚</div>
                        <h5 class="card-title">Collection Schedule</h5>
                        <p class="card-text text-muted">Check when waste will be picked up next.</p>
                        <a href="/schedules-ui" class="btn btn-warning w-100 stretched-link">Check Times</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm text-center p-3">
                    <div class="card-body">
                        <div class="h1 mb-3">🌍</div>
                        <h5 class="card-title">Emission Impact</h5>
                        <p class="card-text text-muted">See how much carbon we are saving.</p>
                        <a href="/emissions-ui" class="btn btn-danger w-100 stretched-link">View Data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const token = localStorage.getItem('auth_token');
        if (!token) window.location.href = '/login';

        function logout() {
            localStorage.clear();
            window.location.href = '/login';
        }
    </script>
</body>
</html>
