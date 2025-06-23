@extends('layouts.landing')

@section('title', 'Sistem Antrian RS - Home')

@section('styles')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fb;
        margin: 0;
        padding: 0;
    }

    .hero-section {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 90vh;
        background: linear-gradient(145deg, #0a2850 0%, #2874fc 100%);
        color: white;
        text-align: center;
        padding: 60px 20px 40px 20px;
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(120deg,rgba(10,40,80,0.7) 0%,rgba(40,116,252,0.3) 100%);
        z-index: 0;
    }

    .hero-section > * { position: relative; z-index: 1; }

    .hero-section .login-btn {
        position: absolute;
        top: 30px;
        right: 30px;
        background: white;
        color: #0a2850;
        padding: 10px 24px;
        border-radius: 30px;
        font-weight: 600;
        text-decoration: none;
        transition: 0.2s;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    .hero-section .login-btn:hover {
        background: #ffc107;
        color: #0a2850;
    }

    .hero-section h1 {
        font-size: 3.2rem;
        font-weight: 800;
        margin-bottom: 20px;
        letter-spacing: 1px;
        text-shadow: 0 2px 12px rgba(0,0,0,0.13);
        animation: fadeInDown 1s;
    }

    .hero-section p {
        font-size: 1.2rem;
        margin-bottom: 30px;
        animation: fadeInDown 1.2s;
    }

    .hero-section .btn-ambil {
        padding: 16px 38px;
        font-size: 1.15rem;
        border-radius: 14px;
        background: white;
        color: #0a2850;
        font-weight: 700;
        text-decoration: none;
        transition: 0.3s;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        letter-spacing: 0.5px;
        margin-bottom: 24px;
        animation: fadeInUp 1.3s;
    }

    .hero-section .btn-ambil:hover {
        background: #ffc107;
        color: #0a2850;
        transform: scale(1.04);
    }

    .hero-illustration {
        margin-top: 40px;
        animation: fadeInUp 1.5s;
    }

    .hero-illustration img {
        max-width: 420px;
        width: 100%;
        border-radius: 24px;
        box-shadow: 0 4px 24px rgba(0, 90, 200, 0.18);
        background: white;
        padding: 12px;
        filter: drop-shadow(0 8px 16px rgba(0, 0, 0, 0.09));
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-12px); }
    }

    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .section-poli {
        max-width: 1100px;
        margin: 60px auto 0 auto;
        padding: 0 20px 40px 20px;
    }

    .section-poli h2 {
        font-size: 1.8rem;
        font-weight: 700;
        color: #0a2850;
        margin-bottom: 30px;
        letter-spacing: 0.5px;
    }

    .poli-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 24px;
    }

    .poli-card {
        background: #fff;
        border-radius: 16px;
        padding: 26px 20px 20px 20px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.08);
        transition: 0.22s;
        position: relative;
        min-height: 140px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .poli-card:hover {
        transform: translateY(-6px) scale(1.03);
        box-shadow: 0 10px 32px rgba(40,116,252,0.13);
    }

    .poli-icon {
        font-size: 2.2rem;
        margin-bottom: 10px;
        color: #2874fc;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .poli-card h5 {
        font-weight: 700;
        margin-bottom: 10px;
        color: #0a2850;
        font-size: 1.18rem;
    }

    .poli-dokter-list {
        margin-top: 6px;
        width: 100%;
    }

    .poli-dokter {
        font-size: 1.07rem;
        color: #2874fc;
        font-weight: 600;
        margin-bottom: 4px;
        display: flex;
        align-items: center;
    }

    .poli-dokter i { color: #0a2850; margin-right: 6px; }

    .footer {
        background: #0a2850;
        color: #eaeaea;
        padding: 22px 0 12px 0;
        text-align: center;
        margin-top: 60px;
        font-size: 1rem;
        letter-spacing: 0.2px;
    }

    .footer a {
        color: #ffc107;
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .hero-section h1 { font-size: 2.1rem; }
        .section-poli h2 { font-size: 1.2rem; }
        .poli-card { padding: 16px 8px; }
    }
</style>
@endsection

@section('content')
<div class="hero-section">
    <a href="{{ route('login') }}" class="login-btn"><i class="fas fa-sign-in-alt"></i> Login</a>
    <h1>Sistem Antrian Rumah Sakit</h1>
    <p>Mengatur antrian pasien jadi lebih mudah, cepat, dan efisien.</p>
    <a href="{{ route('daftar.antrian') }}" class="btn-ambil">
        <i class="fas fa-ticket-alt me-2"></i> Ambil Nomor Antrian
    </a>
    <div class="login-illustration d-none d-md-flex">
            <img src="https://img.freepik.com/free-vector/doctor-character-background_1270-84.jpg" alt="Ilustrasi Login">
        </div>
</div>

<div class="section-poli">
    <h2><i class="fas fa-hospital me-2"></i> Daftar Poli & Dokter</h2>
    <div class="poli-grid">
        @forelse($polis as $poli)
            <div class="poli-card">
                <div class="poli-icon">
                    @if(Str::contains(strtolower($poli->nama_poli), 'gigi'))
                        <i class="fas fa-tooth"></i>
                    @elseif(Str::contains(strtolower($poli->nama_poli), 'anak'))
                        <i class="fas fa-baby"></i>
                    @elseif(Str::contains(strtolower($poli->nama_poli), 'kandungan'))
                        <i class="fas fa-female"></i>
                    @elseif(Str::contains(strtolower($poli->nama_poli), 'jantung'))
                        <i class="fas fa-heartbeat"></i>
                    @else
                        <i class="fas fa-hospital-alt"></i>
                    @endif
                </div>
                <h5>{{ $poli->nama_poli }}</h5>
                <div class="poli-dokter-list">
                    @if($poli->dokters->count())
                        @foreach($poli->dokters as $dokter)
                            <div class="poli-dokter"><i class="fas fa-user-md"></i> {{ $dokter->nama }}</div>
                        @endforeach
                    @else
                        <small class="text-muted"><i class="fas fa-user-md me-1"></i> Belum ada dokter</small>
                    @endif
                </div>
            </div>
        @empty
            <div class="text-center w-100">Belum ada data poli.</div>
        @endforelse
    </div>
</div>

<div class="footer">
    <div>
        <i class="fas fa-envelope me-1"></i> annisasalsabila@email.com &nbsp;|&nbsp;
        <i class="fab fa-whatsapp me-1"></i> <a href="https://wa.me/6281234567890" target="_blank">0812-3456-7890</a>
    </div>
    &copy; {{ date('Y') }} Annisa Salsabila. All rights reserved.
</div>
@endsection
