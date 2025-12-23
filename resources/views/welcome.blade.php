<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tel-U GreenTrack</title>
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
        }
        
        .navbar {
            background: linear-gradient(135deg, var(--accent-green) 0%, var(--primary-green) 100%) !important;
            box-shadow: 0 2px 10px rgba(16, 185, 129, 0.2);
        }
        
        .hero {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.95) 0%, rgba(5, 150, 105, 0.9) 100%),
                        url('https://img.freepik.com/free-photo/recycle-concept-with-trash-can_23-2147827552.jpg');
            background-size: cover;
            background-position: center;
            min-height: 65vh;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
        }
        
        .hero-content {
            position: relative;
            z-index: 1;
            animation: fadeInUp 1s ease-out;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .hero h1 {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            margin-bottom: 1.5rem;
        }
        
        .hero .lead {
            font-size: 1.3rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }
        
        .btn-hero {
            background: white;
            color: var(--accent-green);
            border: none;
            padding: 14px 40px;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        
        .btn-hero:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            color: var(--accent-green);
        }
        
        #features {
            padding: 5rem 0;
        }
        
        .feature-card {
            background: white;
            padding: 2.5rem 2rem;
            border-radius: 20px;
            border: 2px solid var(--light-green);
            box-shadow: 0 5px 20px rgba(16, 185, 129, 0.1);
            transition: all 0.3s ease;
            height: 100%;
            position: relative;
            overflow: hidden;
        }
        
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-green), var(--accent-green));
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(16, 185, 129, 0.2);
            border-color: var(--primary-green);
        }
        
        .feature-card:hover::before {
            transform: scaleX(1);
        }
        
        .feature-icon {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            filter: drop-shadow(0 4px 6px rgba(16, 185, 129, 0.3));
        }
        
        .feature-card h3 {
            color: var(--accent-green);
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .feature-card p {
            color: #6b7280;
            line-height: 1.7;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 4rem;
            color: var(--accent-green);
            font-weight: 700;
        }
        
        footer {
            background: linear-gradient(135deg, var(--accent-green) 0%, var(--primary-green) 100%);
            color: white;
            padding: 2rem 0;
            margin-top: 3rem;
        }
        
        .navbar-brand {
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .navbar-brand::before {
            content: '🌱';
            font-size: 1.8rem;
        }
        
        .stats-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            margin: 0.5rem;
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Tel-U GreenTrack</a>
            <div class="d-flex gap-2">
                <a href="/user-views" class="btn btn-info btn-sm fw-bold">
                    <i class="fas fa-eye me-1"></i>User View
                </a>
                <a href="/dashboard" class="btn btn-warning btn-sm fw-bold">
                    <i class="fas fa-user-shield me-1"></i>Admin
                </a>
                <a href="/login" class="btn btn-light btn-sm">Log in</a>
                <a href="/register" class="btn btn-outline-light btn-sm">Register</a>
                <a href="/test" class="btn btn-outline-light btn-sm">Page add</a>
            </div>
        </div>
    </nav>

    <header class="hero">
        <div class="container hero-content">
            <h1 class="display-3 fw-bold">Smart Waste Management</h1>
            <p class="lead mb-4">Optimizing cleanliness and sustainability at Telkom University</p>
            <div class="mb-4">
                <span class="stats-badge">♻️ 100% Sustainable</span>
                <span class="stats-badge">🌍 SDG 11 & 12</span>
                <span class="stats-badge">📊 Real-time Tracking</span>
            </div>
            <a href="#features" class="btn btn-hero btn-lg">Explore Features</a>
        </div>
    </header>

   <section id="features" class="container">
        <h2 class="section-title display-5">Why Choose GreenTrack?</h2>
        <div class="row">
            
            <div class="col-md-4 mb-4">
                <a href="/user-views" class="card-link">
                    <div class="feature-card">
                        <div class="feature-icon">📍</div>
                        <h3>Locate Trashcans</h3>
                        <p>Easily find the nearest Organic, Inorganic, or Hazardous waste bin anywhere on campus with our interactive map system.</p>
                    </div>
                </a>
            </div>

            <div class="col-md-4 mb-4">
                <a href="/user-views" class="card-link">
                    <div class="feature-card">
                        <div class="feature-icon">📅</div>
                        <h3>Smart Scheduling</h3>
                        <p>Intelligent pickup schedules based on real-time fill levels to prevent overflow and optimize collection routes.</p>
                    </div>
                </a>
            </div>

            <div class="col-md-4 mb-4">
                <a href="/user-views" class="card-link">
                    <div class="feature-card">
                        <div class="feature-icon">🌍</div>
                        <h3>Emission Tracker</h3>
                        <p>Monitor greenhouse gas emissions and track your contribution to achieving SDG 11 & 12 sustainability targets.</p>
                    </div>
                </a>
            </div>

        </div>
    </section>

    <footer class="text-white text-center">
        <div class="container">
            <p class="mb-2 fw-bold">Tel-U GreenTrack</p>
            <p class="mb-0">&copy; 2025 Group 8 - Telkom University. Building a sustainable future together. 🌱</p>
        </div>
    </footer>

</body>
</html>
