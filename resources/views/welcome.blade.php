<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - TelU GreenTrack</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #198754, #20c997);
            color: white;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .card {
            background: rgba(255, 255, 255, 0.95);
            border: none;
            color: #333;
            width: 100%;
            max-width: 500px;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card mx-auto">
            <h1 class="mb-3 text-success fw-bold">GreenTrack</h1>
            <p class="lead mb-4">Smart Waste Management System for Telkom University</p>
            <p class="text-muted mb-4">Manage trashcans, track emissions, and schedule collections efficiently.</p>

            <div class="d-grid gap-3">
                <a href="/login" class="btn btn-primary btn-lg">Login</a>
                <a href="/register" class="btn btn-outline-success btn-lg">Register Account</a>
            </div>
        </div>
    </div>
</body>
</html>
