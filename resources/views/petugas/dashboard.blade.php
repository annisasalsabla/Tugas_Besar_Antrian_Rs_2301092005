@extends('layouts.petugas')

@section('title', 'Dashboard Petugas')

@section('content')
<h3 class="mb-4">Dashboard Petugas</h3>

<div class="row">
    <!-- Card Total Antrian Hari Ini -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Antrian Hari Ini</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalAntrian }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Antrian Menunggu -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Antrian Menunggu</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $antrianMenunggu }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-hourglass-half fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Antrian Selesai -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Antrian Selesai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $antrianSelesai }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-grid gap-2 col-6 mx-auto mt-4">
    <a href="{{ route('petugas.antrian.index') }}" class="btn btn-primary btn-lg">
        <i class="fas fa-users me-2"></i> Kelola Daftar Antrian
    </a>
</div>


<style>
    .card .border-left-primary { border-left: .25rem solid #4e73df!important; }
    .card .border-left-success { border-left: .25rem solid #1cc88a!important; }
    .card .border-left-info { border-left: .25rem solid #36b9cc!important; }
    .card .border-left-warning { border-left: .25rem solid #f6c23e!important; }
    .text-xs { font-size: .7rem; }
    .text-gray-300 { color: #dddfeb!important; }
    .text-gray-800 { color: #5a5c69!important; }
</style>
@endsection
