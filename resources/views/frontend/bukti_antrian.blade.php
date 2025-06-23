@extends('layouts.app')

@section('title', 'Bukti Antrian')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card mt-5">
            <div class="card-body text-center">
                <h4 class="mb-3">Bukti Antrian</h4>
                <h1 class="display-3">{{ $antrian->nomor }}</h1>
                <p class="mb-1"><strong>Nama:</strong> {{ $antrian->pasien->nama }}</p>
                <p class="mb-1"><strong>Poli:</strong> {{ $antrian->poli->nama_poli }}</p>
                <p class="mb-1"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($antrian->tanggal)->format('d-m-Y') }}</p>
                <a href="#" class="btn btn-success mt-3" onclick="window.print()">Cetak / Unduh</a>
            </div>
        </div>
    </div>
</div>
@endsection 