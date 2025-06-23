@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<style>
    body {
        background-color: #f5f8fb;
        font-family: 'Poppins', sans-serif;
    }

    .dashboard-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border-left: 6px solid #0a2850;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.15);
    }

    .dashboard-card h5 {
        color: #0a2850;
        font-weight: 600;
    }

    .dashboard-welcome {
        font-size: 24px;
        font-weight: bold;
        color: #0a2850;
        margin-bottom: 30px;
    }

    .stat-icon {
        font-size: 2rem;
        color: #0a2850;
        margin-right: 10px;
    }

    .stat-label {
        font-weight: 600;
    }

    @media (max-width: 576px) {
        .dashboard-welcome {
            font-size: 20px;
        }
    }
</style>

<div class="container mt-4">
    <div class="dashboard-welcome text-center">
        Selamat datang, Admin! 👋
    </div>

    <div class="row g-4">
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-card">
                <div class="d-flex align-items-center">
                    <i class="fas fa-users stat-icon"></i>
                    <div>
                        <h5>120</h5>
                        <div class="stat-label">Pasien Terdaftar</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="dashboard-card">
                <div class="d-flex align-items-center">
                    <i class="fas fa-user-md stat-icon"></i>
                    <div>
                        <h5>10</h5>
                        <div class="stat-label">Dokter Aktif</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="dashboard-card">
                <div class="d-flex align-items-center">
                    <i class="fas fa-clinic-medical stat-icon"></i>
                    <div>
                        <h5>6</h5>
                        <div class="stat-label">Poli Tersedia</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="dashboard-card">
                <div class="d-flex align-items-center">
                    <i class="fas fa-notes-medical stat-icon"></i>
                    <div>
                        <h5>48</h5>
                        <div class="stat-label">Antrian Hari Ini</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FontAwesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
