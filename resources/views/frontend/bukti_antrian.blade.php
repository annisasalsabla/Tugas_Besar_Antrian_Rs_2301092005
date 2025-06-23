@extends('layouts.landing')

@section('title', 'Bukti Antrian')

@section('styles')
<style>
    :root {
        --primary-color: #2563eb;
        --secondary-color: #1e40af;
        --success-color: #10b981;
        --text-dark: #1f2937;
        --text-medium: #6b7280;
        --text-light: #9ca3af;
        --bg-light: #f9fafb;
        --border-radius: 12px;
    }
    
    .bukti-antrian-container {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: var(--bg-light);
        padding: 2rem;
    }
    
    .bukti-card {
        background: #fff;
        border-radius: var(--border-radius);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 
                    0 10px 10px -5px rgba(0, 0, 0, 0.04);
        padding: 2.5rem;
        width: 100%;
        max-width: 420px;
        margin: 0 auto;
        text-align: center;
        position: relative;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .bukti-header {
        margin-bottom: 1.5rem;
    }
    
    .bukti-icon {
        width: 64px;
        height: 64px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background-color: rgba(37, 99, 235, 0.1);
        border-radius: 50%;
        margin-bottom: 1rem;
    }
    
    .bukti-icon i {
        font-size: 1.75rem;
        color: var(--primary-color);
    }
    
    .bukti-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 0.5rem;
    }
    
    .bukti-subtitle {
        color: var(--text-medium);
        font-size: 0.95rem;
        margin-bottom: 1.5rem;
    }
    
    .bukti-nomor-container {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        padding: 1.5rem;
        border-radius: var(--border-radius);
        margin-bottom: 2rem;
    }
    
    .bukti-nomor-label {
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 0.5rem;
        opacity: 0.9;
    }
    
    .bukti-nomor {
        font-size: 3.5rem;
        font-weight: 800;
        letter-spacing: 2px;
        line-height: 1;
    }
    
    .bukti-details {
        text-align: left;
        margin-bottom: 2rem;
    }
    
    .bukti-detail-item {
        display: flex;
        margin-bottom: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .bukti-detail-label {
        flex: 0 0 100px;
        color: var(--text-medium);
        font-weight: 500;
    }
    
    .bukti-detail-value {
        flex: 1;
        color: var(--text-dark);
        font-weight: 500;
    }
    
    .bukti-actions {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }
    
    .btn {
        padding: 0.75rem 1.5rem;
        border-radius: var(--border-radius);
        font-weight: 600;
        text-align: center;
        transition: all 0.2s ease;
        border: none;
        cursor: pointer;
    }
    
    .btn-primary {
        background-color: var(--primary-color);
        color: white;
    }
    
    .btn-primary:hover {
        background-color: var(--secondary-color);
    }
    
    .btn-outline {
        background-color: transparent;
        color: var(--primary-color);
        border: 1px solid var(--primary-color);
    }
    
    .btn-outline:hover {
        background-color: rgba(37, 99, 235, 0.05);
    }
    
    @media print {
        body * { 
            visibility: hidden !important; 
            background: white !important;
            color: black !important;
        }
        .bukti-antrian-container {
            background: white !important;
            padding: 0 !important;
            min-height: 100vh !important;
        }
        .bukti-card, .bukti-card * { 
            visibility: visible !important; 
            box-shadow: none !important; 
        }
        .bukti-card { 
            border: none !important; 
            padding: 1rem !important;
            max-width: 100% !important;
        }
        .bukti-actions { 
            display: none !important; 
        }
        .bukti-nomor-container {
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
    }
</style>
@endsection

@section('content')
<div class="bukti-antrian-container">
    <div class="bukti-card">
        <div class="bukti-header">
            <div class="bukti-icon">
                <i class="fas fa-hospital-alt"></i>
            </div>
            <h1 class="bukti-title">Bukti Pendaftaran</h1>
            <p class="bukti-subtitle">Simpan bukti ini sebagai referensi Anda</p>
        </div>
        
        <div class="bukti-nomor-container">
            <div class="bukti-nomor-label">Nomor Antrian</div>
            <div class="bukti-nomor">{{ $antrian->nomor }}</div>
        </div>
        
        <div class="bukti-details">
            <div class="bukti-detail-item">
                <div class="bukti-detail-label">Nama Pasien</div>
                <div class="bukti-detail-value">{{ $antrian->pasien->nama }}</div>
            </div>
            <div class="bukti-detail-item">
                <div class="bukti-detail-label">Poli Tujuan</div>
                <div class="bukti-detail-value">{{ $antrian->poli->nama_poli }}</div>
            </div>
            <div class="bukti-detail-item">
                <div class="bukti-detail-label">Tanggal</div>
                <div class="bukti-detail-value">{{ \Carbon\Carbon::parse($antrian->tanggal)->isoFormat('dddd, D MMMM YYYY') }}</div>
            </div>
            <div class="bukti-detail-item" style="border-bottom: none; padding-bottom: 0; margin-bottom: 0;">
                <div class="bukti-detail-label">Waktu</div>
                <div class="bukti-detail-value">{{ \Carbon\Carbon::parse($antrian->created_at)->format('H:i') }} WIB</div>
            </div>
        </div>
        
        <div class="bukti-actions">
            <button class="btn btn-primary" onclick="window.print()">
                <i class="fas fa-print mr-2"></i> Cetak / Unduh
            </button>
            <a href="/" class="btn btn-outline">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
@endsection