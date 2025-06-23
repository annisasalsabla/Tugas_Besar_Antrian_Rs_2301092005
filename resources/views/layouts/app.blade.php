<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Antrian RS')</title>
    
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f8fb;
        }

        .navbar {
            background-color: #0a2850 !important;
        }

        .navbar .navbar-brand,
        .navbar .nav-link {
            color: #fff !important;
            font-weight: 600;
        }

        .navbar .nav-link:hover {
            text-decoration: underline;
        }

        footer {
            margin-top: 40px;
            padding: 20px 0;
            background-color: #0a2850;
            color: #fff;
            text-align: center;
        }
    </style>

    @yield('styles')
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">Antrian RS</a>
            <div class="d-flex">
                @auth
                    <span class="nav-link me-3">Halo, {{ auth()->user()->name }}</span>
                    <form action="{{ url('/logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-light btn-sm">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        &copy; {{ date('Y') }} Sistem Antrian RS - Annisa Project
    </footer>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
