<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - GreenTrack</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card:hover { transform: translateY(-5px); transition: 0.3s; cursor: pointer; }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-success mb-5">
        <div class="container">
            <span class="navbar-brand mb-0 h1">GreenTrack Admin</span>
            <button onclick="logout()" class="btn btn-outline-light btn-sm">Logout</button>
        </div>
    </nav>

    <div class="container">
        <h2 class="mb-4 text-center">Admin Control Center</h2>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 shadow-sm text-center p-3">
                    <div class="card-body">
                        <div class="h1 mb-3">🗑️</div>
                        <h5 class="card-title">Trashcans</h5>
                        <p class="card-text small">Manage bin locations, types, and fill levels.</p>
                        <a href="/trashcans-ui" class="btn btn-outline-success w-100 stretched-link">Manage</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card h-100 shadow-sm text-center p-3">
                    <div class="card-body">
                        <div class="h1 mb-3">👥</div>
                        <h5 class="card-title">Users</h5>
                        <p class="card-text small">Manage student, teacher, and admin accounts.</p>
                        <a href="/users-ui" class="btn btn-outline-primary w-100 stretched-link">Manage</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card h-100 shadow-sm text-center p-3">
                    <div class="card-body">
                        <div class="h1 mb-3">📅</div>
                        <h5 class="card-title">Schedules</h5>
                        <p class="card-text small">Set pickup times and monitor collections.</p>
                        <a href="/schedules-ui" class="btn btn-outline-warning w-100 stretched-link">Manage</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card h-100 shadow-sm text-center p-3">
                    <div class="card-body">
                        <div class="h1 mb-3">💨</div>
                        <h5 class="card-title">Emissions</h5>
                        <p class="card-text small">Track greenhouse gas impact and statistics.</p>
                        <a href="/emissions-ui" class="btn btn-outline-danger w-100 stretched-link">Track</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const role = localStorage.getItem('user_role');
        if (role !== 'admin') {
            window.location.href = '/login';
        }

        function logout() {
            localStorage.clear();
            window.location.href = '/login';
        }
    </script>
</body>
</html>
