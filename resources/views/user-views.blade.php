<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Views - Tel-U GreenTrack</title>
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
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem 3rem;
        }
        
        .page-header {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .page-header h1 {
            color: var(--accent-green);
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .page-header p {
            color: #6b7280;
            font-size: 1.1rem;
        }
        
        .section-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 3px solid var(--light-green);
        }
        
        .section-header h2 {
            color: var(--accent-green);
            font-weight: 700;
            margin: 0;
            font-size: 1.75rem;
        }
        
        .section-header i {
            font-size: 2rem;
            color: var(--primary-green);
        }
        
        .content-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(16, 185, 129, 0.1);
            border: 2px solid var(--light-green);
            margin-bottom: 3rem;
        }
        
        .schedule-item, .trashcan-item, .emission-item {
            background: var(--bg-light);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            border-left: 5px solid var(--primary-green);
            transition: all 0.3s ease;
        }
        
        .schedule-item:hover, .trashcan-item:hover, .emission-item:hover {
            transform: translateX(5px);
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.15);
        }
        
        .item-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.75rem;
        }
        
        .item-title {
            font-weight: 700;
            color: var(--accent-green);
            font-size: 1.2rem;
            margin: 0;
        }
        
        .item-details {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            color: #6b7280;
        }
        
        .item-detail {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .item-detail i {
            color: var(--primary-green);
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
        
        .status-badge {
            padding: 0.4rem 1rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.85rem;
        }
        
        .status-badge.available {
            background: #dcfce7;
            color: #16a34a;
        }
        
        .status-badge.full {
            background: #fef3c7;
            color: #d97706;
        }
        
        .status-badge.maintenance {
            background: #fee2e2;
            color: #dc2626;
        }
        
        .progress-bar-container {
            margin-top: 1rem;
        }
        
        .progress-label {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            color: #6b7280;
        }
        
        .progress {
            height: 12px;
            border-radius: 50px;
            background: #e5e7eb;
        }
        
        .progress-bar {
            border-radius: 50px;
            background: linear-gradient(90deg, var(--primary-green), var(--accent-green));
        }
        
        .metric-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--accent-green);
        }
        
        .metric-label {
            color: #6b7280;
            font-size: 0.9rem;
        }
        
        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: #9ca3af;
        }
        
        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.3;
        }
    </style>
</head>
<body>

    <div class="top-nav">
        <div class="container">
            <a href="/" class="brand-link">Tel-U GreenTrack</a>
        </div>
    </div>

    <div class="page-container">
        <div class="page-header">
            <h1><i class="fas fa-eye me-2"></i>Public Information Dashboard</h1>
            <p>View real-time waste management data for Telkom University</p>
        </div>

        <div class="content-card">
            <div class="section-header">
                <i class="fas fa-calendar-alt"></i>
                <h2>Pickup Schedules</h2>
            </div>
            
            @forelse($schedules as $schedule)
            <div class="schedule-item">
                <div class="item-header">
                    <h3 class="item-title">
                        <i class="fas fa-map-marker-alt me-2"></i>{{ $schedule->location }}
                    </h3>
                    <span class="waste-badge {{ strtolower($schedule->waste_type) }}">
                        {{ $schedule->waste_type }}
                    </span>
                </div>
                <div class="item-details">
                    <div class="item-detail">
                        <i class="fas fa-clock"></i>
                        <span><strong>Time:</strong> {{ \Carbon\Carbon::parse($schedule->pickup_time)->format('H:i A') }}</span>
                    </div>
                    <div class="item-detail">
                        <i class="fas fa-calendar"></i>
                        <span><strong>Date:</strong> {{ \Carbon\Carbon::parse($schedule->pickup_time)->format('l, d M Y') }}</span>
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center text-muted py-4">
                <i class="fas fa-calendar-times fa-3x mb-3 opacity-25"></i>
                <p>No upcoming schedules found.</p>
            </div>
            @endforelse
        </div>

        <div class="content-card">
            <div class="section-header">
                <i class="fas fa-trash"></i>
                <h2>Trashcan Locations & Status</h2>
            </div>
            
            @if(isset($trashcans) && $trashcans->count() > 0)
                @foreach($trashcans as $can)
                <div class="trashcan-item">
                    <div class="item-header">
                        <h3 class="item-title">
                            <i class="fas fa-trash-alt me-2"></i>Trashcan #{{ $can->id }}
                        </h3>
                        
                        @php
                            $statusClass = 'available';
                            $statusText = 'Available';
                            if($can->status == 'maintenance') {
                                $statusClass = 'maintenance';
                                $statusText = 'Maintenance';
                            } elseif ($can->fill_level >= 80) {
                                $statusClass = 'full';
                                $statusText = 'Full / Nearly Full';
                            }
                        @endphp
                        
                        <span class="status-badge {{ $statusClass }}">
                            {{ $statusText }}
                        </span>
                    </div>

                    <div class="item-details mb-2">
                        <div class="item-detail">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ $can->location }}</span>
                        </div>
                        <div class="item-detail">
                            <i class="fas fa-layer-group"></i>
                            <span class="text-capitalize">{{ $can->waste_type ?? 'General' }}</span>
                        </div>
                    </div>

                    <div class="progress-bar-container">
                        <div class="d-flex justify-content-between small text-muted mb-1">
                            <span>Fill Level</span>
                            <strong>{{ $can->fill_level }}%</strong>
                        </div>
                        <div class="progress">
                            <div class="progress-bar {{ $can->fill_level > 80 ? 'bg-danger' : ($can->fill_level > 50 ? 'bg-warning' : '') }}" 
                                 role="progressbar" 
                                 style="width: {{ $can->fill_level }}%">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="text-center text-muted py-4">
                    <p>Trashcan data is not available yet.</p>
                </div>
            @endif
        </div>

        <div class="content-card">
            <div class="section-header">
                <i class="fas fa-leaf"></i>
                <h2>Emission Tracking</h2>
            </div>
            
  @if($emission)
            <div class="row mb-4">
                
                <div class="col-md-4 mb-3">
                    <div class="emission-item text-center">
                        <i class="fas fa-bolt text-warning fa-2x mb-3"></i>
                        
                        <div class="metric-value">{{ number_format($emission->energy_saved ?? 0) }} kWh</div>
                        <div class="metric-label">Energy Conserved</div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="emission-item text-center">
                        <i class="fas fa-recycle text-success fa-2x mb-3"></i>
                        <div class="metric-value">{{ number_format($emission->recycled_amount ?? 0) }} kg</div>
                        <div class="metric-label">Waste Recycled</div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="emission-item text-center">
                        <i class="fas fa-tree text-success fa-2x mb-3"></i>
                        <div class="metric-value">{{ number_format($emission->offset_amount ?? 0) }} kg</div>
                        <div class="metric-label">CO₂ Offset</div>
                    </div>
                </div>
            </div>
            @else
            <div class="text-center text-muted py-4">
                <p>Emission data is currently being calculated.</p>
            </div>
            @endif
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>