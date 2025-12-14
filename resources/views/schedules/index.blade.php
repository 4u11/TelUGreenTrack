<!DOCTYPE html>
<html>
<head>
    <title>Schedules - Tel-U GreenTrack</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-green: #10b981;
            --light-green: #d1fae5;
            --accent-green: #059669;
            --bg-light: #f0fdf4;
        }
        
        body {
            background-color: var(--bg-light);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }
        
        .top-nav {
            background: linear-gradient(135deg, var(--accent-green) 0%, var(--primary-green) 100%);
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(16, 185, 129, 0.2);
            margin-bottom: 2rem;
        }
        
        .brand-link {
            color: white;
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: opacity 0.3s ease;
        }
        
        .brand-link::before {
            content: '🌱';
            font-size: 1.8rem;
        }
        
        .brand-link:hover {
            opacity: 0.9;
            color: white;
        }
        
        .page-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem 3rem;
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
        
        .form-card, .content-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(16, 185, 129, 0.1);
            border: 2px solid var(--light-green);
        }
        
        .form-label {
            color: var(--accent-green);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .form-control, .form-select {
            border: 2px solid var(--light-green);
            border-radius: 10px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-green);
            box-shadow: 0 0 0 0.2rem rgba(16, 185, 129, 0.25);
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
        
        .btn-secondary-green {
            border: 2px solid var(--primary-green);
            color: var(--accent-green);
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            background: white;
            transition: all 0.3s ease;
        }
        
        .btn-secondary-green:hover {
            background: var(--light-green);
            border-color: var(--accent-green);
            color: var(--accent-green);
            transform: translateY(-2px);
        }
        
        .btn-warning-green {
            background: #f59e0b;
            border: none;
            color: white;
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-warning-green:hover {
            background: #d97706;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
        }
        
        .btn-danger-green {
            background: #ef4444;
            border: none;
            color: white;
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-danger-green:hover {
            background: #dc2626;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
        }
        
        .alert-success {
            background: var(--light-green);
            border: 2px solid var(--primary-green);
            color: var(--accent-green);
            border-radius: 10px;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .table-green {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(16, 185, 129, 0.1);
        }
        
        .table-green thead {
            background: linear-gradient(135deg, var(--primary-green) 0%, var(--accent-green) 100%);
            color: white;
        }
        
        .table-green thead th {
            border: none;
            padding: 1rem;
            font-weight: 600;
        }
        
        .table-green tbody tr {
            border-bottom: 1px solid var(--light-green);
            transition: background 0.3s ease;
        }
        
        .table-green tbody tr:hover {
            background: var(--bg-light);
        }
        
        .table-green tbody td {
            padding: 1rem;
            vertical-align: middle;
        }
        
        .waste-badge {
            display: inline-block;
            padding: 0.4rem 1rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.85rem;
        }
        
        .waste-badge.organic {
            background: #dcfce7;
            color: #16a34a;
        }
        
        .waste-badge.inorganic {
            background: #dbeafe;
            color: #2563eb;
        }
        
        .waste-badge.hazardous {
            background: #fee2e2;
            color: #dc2626;
        }
        
        .btn-sm-green {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            border-radius: 50px;
        }
    </style>
</head>
<body>

    <!-- Top Navigation -->
    <div class="top-nav">
        <div class="container">
            <a href="/" class="brand-link">Tel-U GreenTrack</a>
        </div>
    </div>

    <!-- PAGE 1: List Schedules (index.blade.php) -->
    <div class="page-container" id="page-index">
        <div class="page-header">
            <h2><i class="fas fa-calendar-alt me-2"></i>Waste Collection Schedules</h2>
            <p class="text-muted mb-0">Manage and track all scheduled pickups</p>
        </div>

        <div class="alert alert-success" style="display: none;">
            <i class="fas fa-check-circle me-2"></i>Schedule saved successfully!
        </div>

        <a href="#" onclick="showPage('create')" class="btn btn-primary-green mb-4">
            <i class="fas fa-plus me-2"></i>Add New Schedule
        </a>

        <div class="content-card table-responsive">
            <table class="table table-green mb-0">
                <thead>
                    <tr>
                        <th><i class="fas fa-map-marker-alt me-2"></i>Location</th>
                        <th><i class="fas fa-trash me-2"></i>Waste Type</th>
                        <th><i class="fas fa-clock me-2"></i>Pickup Time</th>
                        <th><i class="fas fa-cog me-2"></i>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Building A</td>
                        <td><span class="waste-badge organic">Organic</span></td>
                        <td>2025-12-15 09:00 AM</td>
                        <td>
                            <a href="#" onclick="showPage('edit')" class="btn btn-warning-green btn-sm-green me-2">
                                <i class="fas fa-edit me-1"></i>Edit
                            </a>
                            <button class="btn btn-danger-green btn-sm-green" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash me-1"></i>Delete
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Building B</td>
                        <td><span class="waste-badge inorganic">Inorganic</span></td>
                        <td>2025-12-15 02:00 PM</td>
                        <td>
                            <a href="#" onclick="showPage('edit')" class="btn btn-warning-green btn-sm-green me-2">
                                <i class="fas fa-edit me-1"></i>Edit
                            </a>
                            <button class="btn btn-danger-green btn-sm-green" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash me-1"></i>Delete
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Laboratory C</td>
                        <td><span class="waste-badge hazardous">Hazardous</span></td>
                        <td>2025-12-16 10:00 AM</td>
                        <td>
                            <a href="#" onclick="showPage('edit')" class="btn btn-warning-green btn-sm-green me-2">
                                <i class="fas fa-edit me-1"></i>Edit
                            </a>
                            <button class="btn btn-danger-green btn-sm-green" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash me-1"></i>Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- PAGE 2: Add Schedule (create.blade.php) -->
    <div class="page-container" id="page-create" style="display: none;">
        <div class="page-header">
            <h2><i class="fas fa-plus-circle me-2"></i>Schedule New Pickup</h2>
            <p class="text-muted mb-0">Create a new waste collection schedule</p>
        </div>

        <div class="form-card">
            <form>
                <div class="mb-4">
                    <label class="form-label">
                        <i class="fas fa-map-marker-alt me-2"></i>Location
                    </label>
                    <input type="text" name="location" class="form-control" required placeholder="e.g. Building A">
                </div>

                <div class="mb-4">
                    <label class="form-label">
                        <i class="fas fa-trash me-2"></i>Waste Type
                    </label>
                    <select name="waste_type" class="form-select">
                        <option value="Organic">Organic</option>
                        <option value="Inorganic">Inorganic</option>
                        <option value="Hazardous">Hazardous</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">
                        <i class="fas fa-clock me-2"></i>Pickup Time
                    </label>
                    <input type="datetime-local" name="pickup_time" class="form-control" required>
                </div>

                <div class="d-flex gap-3">
                    <button type="submit" class="btn btn-primary-green">
                        <i class="fas fa-save me-2"></i>Save Schedule
                    </button>
                    <a href="#" onclick="showPage('index')" class="btn btn-secondary-green">
                        <i class="fas fa-arrow-left me-2"></i>Back
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- PAGE 3: Edit Schedule (edit.blade.php) -->
    <div class="page-container" id="page-edit" style="display: none;">
        <div class="page-header">
            <h2><i class="fas fa-edit me-2"></i>Edit Schedule</h2>
            <p class="text-muted mb-0">Update waste collection schedule details</p>
        </div>

        <div class="form-card">
            <form>
                <div class="mb-4">
                    <label class="form-label">
                        <i class="fas fa-map-marker-alt me-2"></i>Location
                    </label>
                    <input type="text" name="location" value="Building A" class="form-control" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">
                        <i class="fas fa-trash me-2"></i>Waste Type
                    </label>
                    <select name="waste_type" class="form-select">
                        <option value="Organic" selected>Organic</option>
                        <option value="Inorganic">Inorganic</option>
                        <option value="Hazardous">Hazardous</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">
                        <i class="fas fa-clock me-2"></i>Pickup Time
                    </label>
                    <input type="datetime-local" name="pickup_time" value="2025-12-15T09:00" class="form-control" required>
                </div>

                <div class="d-flex gap-3">
                    <button type="submit" class="btn btn-warning-green">
                        <i class="fas fa-check me-2"></i>Update Schedule
                    </button>
                    <a href="#" onclick="showPage('index')" class="btn btn-secondary-green">
                        <i class="fas fa-arrow-left me-2"></i>Back
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showPage(page) {
            document.getElementById('page-index').style.display = 'none';
            document.getElementById('page-create').style.display = 'none';
            document.getElementById('page-edit').style.display = 'none';
            document.getElementById('page-' + page).style.display = 'block';
            window.scrollTo(0, 0);
        }
    </script>

</body>
</html>