<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Tel-U GreenTrack</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-green: #10b981;
            --light-green: #d1fae5;
            --accent-green: #059669;
            --bg-light: #f0fdf4;
            --sidebar-bg: linear-gradient(180deg, #059669 0%, #047857 100%);
        }
        
        body {
            background-color: var(--bg-light);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .sidebar {
            height: 100vh;
            background: var(--sidebar-bg);
            color: white;
            min-height: 100vh;
            box-shadow: 4px 0 15px rgba(16, 185, 129, 0.1);
            position: sticky;
            top: 0;
        }
        
        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 1rem;
        }
        
        .sidebar-header a {
            color: white;
            text-decoration: none;
            display: block;
            transition: opacity 0.3s ease;
            padding: 0;
            border: none;
        }
        
        .sidebar-header a:hover {
            opacity: 0.8;
            background: none;
            padding: 0;
        }
        
        .sidebar-header h3 {
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.3rem;
            margin: 0;
        }
        
        .sidebar-header h3::before {
            content: '🌱';
            font-size: 1.8rem;
        }
        
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
            margin: 0.25rem 0;
        }
        
        .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-left-color: white;
            padding-left: 25px;
        }
        
        .sidebar a.active {
            background-color: rgba(255, 255, 255, 0.2);
            border-left-color: white;
            font-weight: 600;
        }
        
        .sidebar a i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
        }
        
        .sidebar-footer {
            margin-top: auto;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 1rem;
        }
        
        .btn-logout {
            background: none;
            border: none;
            color: white;
            width: 100%;
            text-align: left;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }
        
        .btn-logout:hover {
            background-color: rgba(239, 68, 68, 0.2);
            color: #fecaca;
        }
        
        .main-content {
            padding: 2rem;
            min-height: 100vh;
        }
        
        .page-header {
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--light-green);
        }
        
        .page-header h2 {
            color: var(--accent-green);
            font-weight: 700;
            margin: 0;
        }
        
        .stats-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 5px 20px rgba(16, 185, 129, 0.1);
            border-left: 5px solid var(--primary-green);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(16, 185, 129, 0.2);
        }
        
        .stats-card.orange {
            border-left-color: #f59e0b;
        }
        
        .stats-card.red {
            border-left-color: #ef4444;
        }
        
        .stats-card h5 {
            color: #6b7280;
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .stats-card h3 {
            color: var(--accent-green);
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0;
        }
        
        .stats-card.orange h3 {
            color: #f59e0b;
        }
        
        .stats-card.red h3 {
            color: #ef4444;
        }
        
        .stats-card .icon {
            float: right;
            font-size: 2.5rem;
            opacity: 0.2;
            margin-top: -0.5rem;
        }
        
        .action-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(16, 185, 129, 0.1);
            border: 2px solid var(--light-green);
        }
        
        .action-card h4 {
            color: var(--accent-green);
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .action-card p {
            color: #6b7280;
            margin-bottom: 1.5rem;
        }
        
        .btn-primary-green {
            background: linear-gradient(135deg, var(--primary-green) 0%, var(--accent-green) 100%);
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }
        
        .btn-primary-green:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
            background: linear-gradient(135deg, var(--accent-green) 0%, var(--primary-green) 100%);
        }
        
        .btn-outline-green {
            border: 2px solid var(--primary-green);
            color: var(--accent-green);
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            background: white;
            transition: all 0.3s ease;
        }
        
        .btn-outline-green:hover {
            background: var(--primary-green);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }
        
        .dev-badge {
            display: inline-block;
            background: rgba(251, 191, 36, 0.2);
            color: #d97706;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-left: 0.5rem;
        }
    </style>
</head>
<body>

<div class="d-flex">
    <div class="sidebar col-md-2 d-none d-md-block d-flex flex-column">
        <div class="sidebar-header">
            <a href="{{ url('/') }}">
                <h3>Tel-U GreenTrack</h3>
            </a>
        </div>
        
        <a href="{{ url('/dashboard') }}" class="active"><i class="fas fa-home"></i> Dashboard</a>
        <a href="{{ url('/schedules') }}"><i class="fas fa-calendar-alt"></i> Schedules</a>
        <a href="{{ url('/trashcans-ui') }}"><i class="fas fa-trash"></i> Trashcans</a>
        <a href="{{ url('/users-ui') }}"><i class="fas fa-users"></i> Users</a>
        <a href="{{ url('/admin/emissions') }}"><i class="fas fa-leaf"></i> Emission Tracker</a>
        
        <div class="sidebar-footer mt-auto">
        
                <button type="submit" class="btn-logout">
                    <i class="fas fa-sign-out-alt me-3"></i> Logout
                </button>
            </form>
        </div>
    </div>

    <div class="col-md-10 main-content">
        <div class="page-header">
            <h2>Admin Overview</h2>
            <p class="text-muted mb-0">Welcome back! Here's what's happening with your waste management system.</p>
        </div>

        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <div class="stats-card">
                    <i class="fas fa-trash icon"></i>
                    <h5>Total Trashcans</h5>
                    <h3>24</h3>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="stats-card orange">
                    <i class="fas fa-calendar-check icon"></i>
                    <h5>Pending Pickups</h5>
                    <h3>{{ \App\Models\Schedule::count() }}</h3>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="stats-card red">
                    <i class="fas fa-exclamation-triangle icon"></i>
                    <h5>Alerts</h5>
                    <h3>2</h3>
                </div>
            </div>
        </div>

        <div class="action-card">
            <h4><i class="fas fa-bolt me-2"></i>Quick Actions</h4>
            <p>Manage the waste collection system for Telkom University efficiently.</p>
            <div class="d-flex gap-3 flex-wrap">
                <a href="{{ url('/schedules') }}" class="btn btn-primary-green">
                    <i class="fas fa-plus me-2"></i> Schedule New Pickup
                </a>
                <button class="btn btn-outline-green" onclick="alert('Report generation feature coming soon')">
                    <i class="fas fa-file-download me-2"></i> Download Report
                </button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>