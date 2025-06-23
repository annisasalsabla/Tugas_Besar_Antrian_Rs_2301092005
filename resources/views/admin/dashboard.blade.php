@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<h3 class="mb-4">Dashboard</h3>

<div class="row">
    <!-- Card Total Pasien -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pasien</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPasien }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Total Dokter -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Dokter</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalDokter }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-md fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Total Poli -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Poli</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPoli }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-hospital-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Antrian Hari Ini -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Antrian Hari Ini</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $antrianHariIni }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
