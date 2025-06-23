<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Petugas - Sistem Antrian RS')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <style>
        body {
            display: flex;
            min-height: 100vh;
            background-color: #f4f7fa;
        }
        .sidebar {
            width: 250px;
            background-color: #0a2850;
            color: #fff;
            flex-shrink: 0;
        }
        .sidebar .sidebar-header {
            padding: 1.5rem;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .sidebar .nav-link {
            color: #adb5bd;
            padding: 0.75rem 1.5rem;
            display: flex;
            align-items: center;
        }
        .sidebar .nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        .sidebar .nav-link:hover {
            background-color: #0d3263;
            color: #fff;
        }
        .sidebar .nav-link.active {
            background-color: #ffc107;
            color: #0a2850;
            font-weight: bold;
        }
        .main-content {
            flex-grow: 1;
        }
        .topbar {
            background-color: #fff;
            padding: 1rem 1.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,.1);
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }
        .btn-logout {
            color: #0a2850;
            border: 1px solid #0a2850;
        }
        .btn-logout:hover {
            background: #0a2850;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            Petugas RS
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link{{ request()->routeIs('petugas.dashboard') ? ' active' : '' }}" href="{{ route('petugas.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ request()->routeIs('petugas.antrian.index') ? ' active' : '' }}" href="{{ route('petugas.antrian.index') }}">
                    <i class="fas fa-list-alt"></i> Daftar Antrian
                </a>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <div class="topbar">
            <div class="d-flex align-items-center">
                <span class="me-3">Halo, {{ auth()->user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-logout btn-sm">Logout</button>
                </form>
            </div>
        </div>
        <div class="container-fluid p-4">
            @yield('content')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 