<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --pink-primary: #FF9A00; /* primary accent */
            --pink-secondary: #FFD93D; /* secondary accent */
            --pink-dark: #4F200D; /* deep accent */
            --pink-light: #F6F1E9; /* light accent */
            --black-primary: #4F200D; /* dark base */
            --black-secondary: #4F200D;
            --black-tertiary: #4F200D;
            --white-primary: #F6F1E9;
            --red-primary: #dc2626;
            --red-secondary: #ef4444;
            --blue-primary: #2563eb;
            --blue-secondary: #3b82f6;
            --glow-pink: 0 0 20px rgba(255, 154, 0, 0.5);
            --glow-white: 0 0 15px rgba(255, 255, 255, 0.3);
            --glow-red: 0 0 20px rgba(220, 38, 38, 0.5);
            --glow-blue: 0 0 20px rgba(37, 99, 235, 0.5);
        }

        * {
            transition: all 0.3s ease;
        }

        body {
            background: linear-gradient(135deg, var(--black-primary) 0%, var(--black-secondary) 50%, var(--black-tertiary) 100%);
            color: var(--white-primary);
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            font-size: 0.85rem; /* smaller base text */
        }

        /* Animated background particles */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 25% 25%, rgba(255, 154, 0, 0.12) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(255, 217, 61, 0.1) 0%, transparent 50%);
            animation: float 6s ease-in-out infinite;
            z-index: -1;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        /* Navigation - Pink Header */
        .navbar {
            background: linear-gradient(90deg, var(--pink-dark) 0%, var(--pink-primary) 50%, var(--pink-secondary) 100%) !important;
            backdrop-filter: blur(10px);
            border-bottom: 3px solid var(--pink-primary);
            box-shadow: var(--glow-pink);
            padding: 0.5rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.2rem;
            color: var(--white-primary) !important;
            text-shadow: var(--glow-white);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { text-shadow: var(--glow-white); }
            50% { text-shadow: 0 0 25px rgba(255, 255, 255, 0.8); }
        }

        .nav-link {
            color: var(--white-primary) !important;
            font-weight: 600;
            position: relative;
            padding: 0.4rem 0.6rem !important;
            border-radius: 8px;
            margin: 0 0.15rem;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
        }

        .nav-link:hover {
            color: var(--white-primary) !important;
            background: rgba(255, 255, 255, 0.2);
            box-shadow: var(--glow-white);
            transform: translateY(-2px);
        }

        /* Cards - Black background, Pink headers */
        .card {
            background: linear-gradient(145deg, var(--black-secondary) 0%, var(--black-primary) 100%);
            border: 2px solid var(--pink-primary);
            border-radius: 15px;
            box-shadow: var(--glow-pink), 0 10px 30px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            overflow: hidden;
            position: relative;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--pink-primary), transparent);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        .card:hover {
            transform: none;
            box-shadow: var(--glow-pink), 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .card-header {
            background: linear-gradient(90deg, var(--pink-dark) 0%, var(--pink-primary) 50%, var(--pink-secondary) 100%);
            border-bottom: 2px solid var(--pink-secondary);
            color: var(--white-primary);
            font-weight: 700;
            text-shadow: var(--glow-white);
            padding: 1rem 1.5rem;
        }

        .card-body {
            color: var(--white-primary);
            background: var(--black-secondary);
            padding: 1rem;
        }

        /* Tables */
        .table {
            color: var(--white-primary);
            background: transparent;
        }

        .table thead th {
            background: linear-gradient(90deg, var(--pink-dark) 0%, var(--pink-primary) 100%);
            color: var(--white-primary);
            border: none;
            font-weight: 700;
            text-shadow: var(--glow-white);
            padding: 0.65rem;
            font-size: 0.95rem;
        }

        .table tbody tr {
            border-bottom: 1px solid rgba(255, 154, 0, 0.3);
            transition: all 0.3s ease;
            background: rgba(26, 26, 26, 0.8);
        }

        .table tbody tr:hover {
            background: rgba(255, 154, 0, 0.1);
            box-shadow: inset var(--glow-pink);
            transform: scale(1.02);
        }

        .table tbody td {
            border: none;
            vertical-align: middle;
            padding: 0.5rem 0.65rem;
            font-weight: 500;
        }

        /* Red and Blue Buttons */
        .btn {
            border-radius: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            padding: 0.4rem 1rem;
            border: 2px solid;
        }

        .btn::before {
            content: none;
        }

        .btn:hover::before {
            width: 0;
            height: 0;
        }

        /* Disable hover effects for specific buttons */
        .btn.no-hover:hover {
            transform: none;
            box-shadow: none;
            filter: none;
        }
        .btn-primary.no-hover:hover {
            background: linear-gradient(45deg, var(--pink-dark) 0%, var(--pink-primary) 100%);
            border-color: var(--pink-dark);
        }
        .btn-secondary.no-hover:hover {
            background: linear-gradient(45deg, var(--black-secondary) 0%, var(--black-tertiary) 100%);
            border-color: var(--pink-primary);
        }

        /* Primary Button - Blue */
        .btn-primary {
            background: linear-gradient(45deg, var(--pink-dark) 0%, var(--pink-primary) 100%);
            border-color: var(--pink-dark);
            color: var(--white-primary);
            box-shadow: var(--glow-pink);
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, var(--pink-primary) 0%, var(--pink-secondary) 100%);
            border-color: var(--pink-primary);
            transform: translateY(-3px);
            box-shadow: 0 0 30px rgba(255, 154, 0, 0.8);
        }

        /* Danger Button - Red */
        .btn-danger {
            background: linear-gradient(45deg, var(--red-primary) 0%, var(--red-secondary) 100%);
            border-color: var(--red-primary);
            color: var(--white-primary);
            box-shadow: var(--glow-red);
        }

        .btn-danger:hover {
            background: linear-gradient(45deg, #b91c1c 0%, var(--red-primary) 100%);
            transform: translateY(-3px);
            box-shadow: 0 0 30px rgba(220, 38, 38, 0.8);
        }

        /* Warning Button - Pink */
        .btn-warning {
            background: linear-gradient(45deg, var(--pink-primary) 0%, var(--pink-secondary) 100%);
            border-color: var(--pink-primary);
            color: var(--white-primary);
            box-shadow: var(--glow-pink);
        }

        .btn-warning:hover {
            background: linear-gradient(45deg, var(--pink-dark) 0%, var(--pink-primary) 100%);
            transform: translateY(-3px);
            box-shadow: 0 0 30px rgba(236, 72, 153, 0.8);
        }

        /* Info Button - Blue variant */
        .btn-info {
            background: linear-gradient(45deg, #0ea5e9 0%, #38bdf8 100%);
            border-color: #0ea5e9;
            color: var(--white-primary);
            box-shadow: 0 0 20px rgba(14, 165, 233, 0.5);
        }

        .btn-info:hover {
            background: linear-gradient(45deg, #0284c7 0%, #0ea5e9 100%);
            transform: translateY(-3px);
            box-shadow: 0 0 30px rgba(14, 165, 233, 0.8);
        }

        /* Secondary Button - Black with pink border */
        .btn-secondary {
            background: linear-gradient(45deg, var(--black-secondary) 0%, var(--black-tertiary) 100%);
            border-color: var(--pink-primary);
            color: var(--white-primary);
            box-shadow: var(--glow-pink);
        }

        .btn-secondary:hover {
            background: linear-gradient(45deg, var(--black-tertiary) 0%, #3a3a3a 100%);
            transform: translateY(-3px);
            box-shadow: 0 0 30px rgba(255, 154, 0, 0.6);
        }

        /* Forms - White fields */
        .form-control, .form-select {
            background: var(--white-primary);
            border: 2px solid var(--pink-primary);
            border-radius: 10px;
            color: var(--black-primary);
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 0.5rem 0.75rem;
            font-size: 0.9rem;
        }

        .form-control:focus, .form-select:focus {
            background: var(--white-primary);
            border-color: var(--pink-secondary);
            box-shadow: var(--glow-pink);
            color: var(--black-primary);
            transform: scale(1.02);
        }

        .form-control::placeholder {
            color: rgba(0, 0, 0, 0.5);
        }

        .form-label {
            color: var(--pink-secondary);
            font-weight: 700;
            margin-bottom: 0.75rem;
            text-shadow: var(--glow-white);
            font-size: 1.1rem;
        }

        /* Alerts */
        .alert-success {
            background: linear-gradient(45deg, rgba(34, 197, 94, 0.2) 0%, rgba(74, 222, 128, 0.2) 100%);
            border: 2px solid #22c55e;
            border-radius: 12px;
            color: #bbf7d0;
            box-shadow: 0 0 20px rgba(34, 197, 94, 0.3);
            animation: slideIn 0.5s ease;
            padding: 1rem 1.5rem;
            font-weight: 600;
        }

        @keyframes slideIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        /* List groups */
        .list-group-item {
            background: rgba(26, 26, 26, 0.8);
            border: 2px solid rgba(236, 72, 153, 0.3);
            color: var(--white-primary);
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .list-group-item:hover {
            background: rgba(236, 72, 153, 0.2);
            border-color: var(--pink-primary);
            transform: translateX(10px);
            box-shadow: var(--glow-pink);
        }

        /* Headings */
        h1, h2, h3, h4, h5, h6 {
            color: var(--white-primary);
            text-shadow: var(--glow-white);
            font-weight: 700;
        }

        h2 {
            position: relative;
            display: inline-block;
            color: var(--pink-secondary);
            font-size: 1.05rem;
            text-shadow: var(--glow-pink);
        }

        h2::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--pink-primary) 0%, var(--pink-secondary) 100%);
            border-radius: 2px;
            box-shadow: var(--glow-pink);
        }

        /* Pagination */
        .pagination .page-link {
            background: var(--black-secondary);
            border: 2px solid var(--pink-primary);
            color: var(--pink-light);
            transition: all 0.3s ease;
            font-weight: 600;
        }

        .pagination .page-link:hover {
            background: rgba(236, 72, 153, 0.2);
            border-color: var(--pink-secondary);
            color: var(--white-primary);
            box-shadow: var(--glow-pink);
        }

        .pagination .page-item.active .page-link {
            background: linear-gradient(45deg, var(--pink-primary) 0%, var(--pink-secondary) 100%);
            border-color: var(--pink-primary);
            box-shadow: var(--glow-pink);
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: var(--black-secondary);
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(45deg, var(--pink-primary) 0%, var(--pink-secondary) 100%);
            border-radius: 5px;
            box-shadow: var(--glow-pink);
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(45deg, var(--pink-dark) 0%, var(--pink-primary) 100%);
        }

        /* Container glow effect */
        .container {
            position: relative;
            max-width: 700px; /* tighter main content width */
        }

        .container::before {
            content: '';
            position: absolute;
            top: -3px;
            left: -3px;
            right: -3px;
            bottom: -3px;
            background: linear-gradient(45deg, transparent, var(--pink-primary), transparent);
            border-radius: 15px;
            opacity: 0;
            z-index: -1;
            transition: opacity 0.3s ease;
        }

        .container:hover::before {
            opacity: 0.3;
        }

        /* Loading animation for buttons */
        .btn.loading {
            pointer-events: none;
            position: relative;
        }

        .btn.loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 18px;
            height: 18px;
            border: 2px solid transparent;
            border-top: 2px solid currentColor;
            border-radius: 50%;
            transform: translate(-50%, -50%);
            animation: none;
            display: none;
        }

        @keyframes spin {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .card {
                margin-bottom: 2rem;
            }
            
            .btn {
                margin-bottom: 0.75rem;
                width: 100%;
            }
            
            .table-responsive {
                border-radius: 12px;
                box-shadow: var(--glow-pink);
            }

            .navbar-brand {
                font-size: 1.4rem;
            }
        }

        /* Special button size variants */
        .btn-sm {
            padding: 0.4rem 1rem;
            font-size: 0.9rem;
        }

        .btn-lg {
            padding: 1rem 2rem;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('sections.index') }}">
                <i class="fas fa-graduation-cap me-2"></i>Student Management System
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('sections.index') }}">
                    <i class="fas fa-layer-group me-2"></i>Sections
                </a>
                <a class="nav-link" href="{{ route('students.index') }}">
                    <i class="fas fa-user-graduate me-2"></i>Students
                </a>
            </div>
        </div>
    </nav>

    <div class="container mt-2">
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add loading animation to form submissions
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function() {
                    const submitBtn = form.querySelector('button[type="submit"]');
                    if (submitBtn) {
                        submitBtn.classList.add('loading');
                        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Processing...';
                    }
                });
            });

            // Card hover transform removed

            // Ripple effect removed
        });
    </script>
</body>
</html>