@extends('layouts.landing')

@section('title', 'Bukti Antrian')

@section('styles')
<style>
    .bukti-antrian-container {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .bukti-card {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 8px 32px 0 rgba(0,0,0,0.12);
        padding: 40px 32px 32px 32px;
        max-width: 400px;
        margin: 0 auto;
        text-align: center;
        position: relative;
    }
    .bukti-logo {
        width: 60px;
        margin-bottom: 10px;
    }
    .bukti-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #0a2850;
        margin-bottom: 10px;
    }
    .bukti-nomor {
        font-size: 4rem;
        font-weight: 800;
        color: #2575fc;
        margin: 20px 0 10px 0;
        letter-spacing: 2px;
    }
    .bukti-info {
        font-size: 1.1rem;
        margin-bottom: 6px;
    }
    .bukti-label {
        color: #6c757d;
        font-weight: 500;
    }
    .bukti-print-btn {
        margin-top: 25px;
        padding: 12px 32px;
        font-size: 1.1rem;
        border-radius: 10px;
        font-weight: 600;
        background: #1cc88a;
        color: #fff;
        border: none;
        transition: background 0.2s;
    }
    .bukti-print-btn:hover {
        background: #0a2850;
        color: #fff;
    }
    @media print {
        body * { visibility: hidden !important; }
        .bukti-card, .bukti-card * { visibility: visible !important; }
        .bukti-card { box-shadow: none !important; border: 1px solid #ccc; }
        .bukti-print-btn { display: none !important; }
    }
</style>
@endsection

@section('content')
<div class="bukti-antrian-container">
    <div class="bukti-card">
        <i class="fas fa-hospital fa-3x text-primary mb-3"></i>
        <div class="bukti-title">Bukti Antrian</div>
        <div class="bukti-nomor">{{ $antrian->nomor }}</div>
        <div class="bukti-info"><span class="bukti-label">Nama:</span> {{ $antrian->pasien->nama }}</div>
        <div class="bukti-info"><span class="bukti-label">Poli:</span> {{ $antrian->poli->nama_poli }}</div>
        <div class="bukti-info"><span class="bukti-label">Tanggal:</span> {{ \Carbon\Carbon::parse($antrian->tanggal)->format('d-m-Y') }}</div>
        <button class="bukti-print-btn" onclick="window.print()"><i class="fas fa-print me-2"></i>Cetak / Unduh</button>
        <a href="/" class="btn btn-outline-secondary mt-3" style="border-radius:10px; padding:10px 28px; font-weight:600;">Kembali</a>
    </div>
</div>
@endsection 