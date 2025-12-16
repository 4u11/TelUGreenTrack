<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GreenTrack')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card { border: none; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-success mb-4">
        <div class="container">
            <span class="navbar-brand mb-0 h1">GreenTrack Management</span>
            <div>
                <a href="/dashboard" id="dashboardLink" class="btn btn-outline-light btn-sm me-2">Back to Dashboard</a>
                <button onclick="logout()" class="btn btn-outline-light btn-sm">Logout</button>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function logout() {
            if(confirm('Are you sure you want to logout?')) {
                localStorage.clear();
                window.location.href = '/login';
            }
        }
        const role = localStorage.getItem('user_role');
        const dashLink = document.getElementById('dashboardLink');

        if (role === 'admin') {
            dashLink.href = '/dashboard';
        } else {
            dashLink.href = '/user-views';
        }
        const token = localStorage.getItem('auth_token');
        if (!token && window.location.pathname !== '/login' && window.location.pathname !== '/' && window.location.pathname !== '/register') {
            window.location.href = '/login';
        }
    </script>

    @stack('scripts')
</body>
</html>
