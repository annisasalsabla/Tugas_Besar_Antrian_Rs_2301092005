@extends('layouts.app')

@section('title', 'Dashboard Petugas')

@section('content')
<style>
    body {
        background-color: #f5f8fb;
        font-family: 'Poppins', sans-serif;
    }

    .dashboard-container {
        margin-top: 30px;
    }

    .dashboard-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        border-left: 6px solid #0a2850;
        transition: 0.3s ease;
    }

    .dashboard-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.15);
    }

    .dashboard-title {
        color: #0a2850;
        font-size: 22px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .quick-action {
        font-weight: 600;
        color: #0a2850;
        text-decoration: none;
    }

    .quick-action:hover {
        text-decoration: underline;
    }

    .icon-box {
        font-size: 1.7rem;
        margin-right: 10px;
        color: #0a2850;
    }
</style>

<div class="container dashboard-container">
    <div class="dashboard-title text-center">
        Selamat datang, Petugas! 👨‍💼
    </div>

    <div class="row justify-content-center g-4">
        <div class="col-md-5">
            <div class="dashboard-card d-flex align-items-center">
                <i class="fas fa-plus-square icon-box"></i>
                <div>
                    <div class="mb-1">Input Antrian Baru</div>
                    <a href="{{ url('petugas/antrian/create') }}" class="quick-action">Mulai Tambah Antrian</a>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="dashboard-card d-flex align-items-center">
                <i class="fas fa-list icon-box"></i>
                <div>
                    <div class="mb-1">Lihat Daftar Antrian Hari Ini</div>
                    <a href="{{ url('petugas/antrian') }}" class="quick-action">Lihat Data Antrian</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FontAwesome -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
