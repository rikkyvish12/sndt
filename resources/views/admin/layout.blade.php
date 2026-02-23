<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - College Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #1a237e 0%, #283593 100%);
            color: white;
            box-shadow: 3px 0 10px rgba(0,0,0,0.1);
        }
        .sidebar h5 {
            padding: 20px 15px;
            margin: 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .nav-link {
            color: rgba(255,255,255,0.8) !important;
            padding: 12px 15px !important;
            border-radius: 0 !important;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }
        .nav-link:hover {
            background-color: rgba(255,255,255,0.1) !important;
            color: white !important;
        }
        .nav-link.active {
            background-color: rgba(255,255,255,0.2) !important;
            color: white !important;
        }
        .nav-link i {
            margin-right: 10px;
            width: 24px;
            text-align: center;
        }
        .main-content {
            padding-top: 20px;
            min-height: 100vh;
        }
        .page-header {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 25px;
            border-left: 4px solid #1a237e;
        }
        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-2px);
        }
        .btn {
            border-radius: 6px;
            font-weight: 500;
        }
        .table th {
            background-color: #f8f9fa;
            font-weight: 600;
        }
        .badge {
            border-radius: 4px;
        }
        .material-icons {
            vertical-align: middle;
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block bg-dark sidebar">
                <div class="position-sticky pt-3">
                    <h5 class="text-white text-center mb-4">
                        <i class="material-icons">school</i> Admin Panel
                    </h5>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : 'text-white' }}" 
                               href="{{ route('admin.dashboard') }}">
                                <i class="material-icons">dashboard</i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.departments.*') ? 'active' : 'text-white' }}" 
                               href="{{ route('admin.departments.index') }}">
                                <i class="material-icons">business</i> Departments
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.faculty.*') ? 'active' : 'text-white' }}" 
                               href="{{ route('admin.faculty.index') }}">
                                <i class="material-icons">people</i> Faculty
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.courses.*') ? 'active' : 'text-white' }}" 
                               href="{{ route('admin.courses.index') }}">
                                <i class="material-icons">menu_book</i> Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : 'text-white' }}" 
                               href="{{ route('admin.settings.index') }}">
                                <i class="material-icons">settings</i> Settings
                            </a>
                        </li>
                        <li class="nav-item mt-4">
                            <a class="nav-link text-white" href="{{ route('logout') }}" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="material-icons">logout</i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-10 ms-sm-auto px-md-4 main-content">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>