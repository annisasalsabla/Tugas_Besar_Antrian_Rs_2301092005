@extends('layouts.petugas')

@section('title', 'Dashboard Petugas')

@section('content')
    <div class="text-center mb-4">
        <h3>Selamat datang, Petugas! 👋</h3>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-5 mb-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-plus-circle fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">Input Antrian Baru</h5>
                    <p class="card-text">Mulai Tambah Antrian</p>
                    <a href="{{ route('daftar.antrian') }}" class="btn btn-primary">Mulai</a>
                </div>
            </div>
        </div>
        <div class="col-md-5 mb-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-list-alt fa-3x text-success mb-3"></i>
                    <h5 class="card-title">Lihat Daftar Antrian Hari Ini</h5>
                    <p class="card-text">Lihat Data Antrian</p>
                    <a href="#" class="btn btn-success">Lihat</a>
                </div>
            </div>
        </div>
    </div>
@endsection
