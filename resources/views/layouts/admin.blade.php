<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - Sistem Antrian RS')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f4f7fa;
        }
        .layout-wrapper {
            display: flex;
            flex-direction: row;
            flex: 1 1 auto;
            min-height: 0;
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
        .footer-admin {
            background: #0a2850;
            color: #fff;
            text-align: center;
            padding: 18px 0 12px 0;
            font-size: 1.08rem;
            letter-spacing: 0.5px;
            margin-top: auto;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="layout-wrapper">
        <div class="sidebar">
            <div class="sidebar-header">
                Admin RS
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link{{ request()->routeIs('admin.dashboard') ? ' active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->routeIs('admin.poli.*') ? ' active' : '' }}" href="{{ route('admin.poli.index') }}">
                        <i class="fas fa-hospital"></i> Data Poli
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->routeIs('admin.petugas.*') ? ' active' : '' }}" href="{{ route('admin.petugas.index') }}">
                        <i class="fas fa-user-friends"></i> Data Petugas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->routeIs('admin.pasien.*') ? ' active' : '' }}" href="{{ route('admin.pasien.index') }}">
                        <i class="fas fa-user-injured"></i> Data Pasien
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->routeIs('admin.dokter.*') ? ' active' : '' }}" href="{{ route('admin.dokter.index') }}">
                        <i class="fas fa-user-md"></i> Data Dokter
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
    </div>
    <footer class="footer-admin">
        &copy; {{ date('Y') }} Sistem Antrian RS - Annisa Salsabila. All rights reserved.
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 