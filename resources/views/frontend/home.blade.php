@extends('layouts.landing')

@section('title', 'Sistem Antrian RS - Home')

@section('styles')
<style>
    :root {
        --primary: #0a2850;
        --primary-light: #2874fc;
        --accent: #ffc107;
        --light-bg: #f8f9fb;
        --white: #ffffff;
        --text-dark: #1a1a1a;
        --text-light: #6c757d;
    }
    
    body {
        font-family: 'Poppins', -apple-system, BlinkMacSystemFont, sans-serif;
        background-color: var(--light-bg);
        color: var(--text-dark);
        margin: 0;
        padding: 0;
        line-height: 1.6;
    }

    /* Improved Navbar */
    .navbar {
        background-color: var(--primary);
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 2.5rem;
        position: sticky;
        top: 0;
        z-index: 1000;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .nav-logo {
        color: var(--white);
        font-size: 1.5rem;
        font-weight: 700;
        text-decoration: none;
        display: flex;
        align-items: center;
    }

    .nav-logo i {
        margin-right: 0.5rem;
        color: var(--accent);
    }

    .nav-links {
        display: flex;
        align-items: center;
    }

    .nav-links a {
        color: var(--white);
        text-decoration: none;
        margin-left: 1.75rem;
        font-weight: 500;
        font-size: 0.95rem;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
    }

    .nav-links a:hover {
        color: var(--accent);
        transform: translateY(-1px);
    }

    .nav-links a i {
        margin-right: 0.5rem;
        font-size: 0.9em;
    }

    /* Enhanced Hero Section */
    .hero-section {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 90vh;
        background: linear-gradient(145deg, var(--primary) 0%, var(--primary-light) 100%);
        color: var(--white);
        text-align: center;
        padding: 4rem 1.5rem 2rem;
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(120deg, rgba(10, 40, 80, 0.7) 0%, rgba(40, 116, 252, 0.3) 100%);
        z-index: 0;
    }

    .hero-section > * { 
        position: relative; 
        z-index: 1; 
    }

    .hero-section h1 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 1.25rem;
        line-height: 1.2;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        animation: fadeInDown 0.8s ease-out;
    }

    .hero-section p {
        font-size: 1.15rem;
        margin-bottom: 2rem;
        max-width: 700px;
        opacity: 0.9;
        animation: fadeInDown 1s ease-out;
    }

    .btn-ambil {
        padding: 1rem 2.5rem;
        font-size: 1.1rem;
        border-radius: 12px;
        background: var(--white);
        color: var(--primary);
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        display: inline-flex;
        align-items: center;
        animation: fadeInUp 1s ease-out;
    }

    .btn-ambil:hover {
        background: var(--accent);
        color: var(--primary);
        transform: translateY(-3px) scale(1.03);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .btn-ambil i {
        margin-right: 0.75rem;
    }

    .hero-illustration {
        margin-top: 3rem;
        animation: fadeInUp 1.2s ease-out;
    }

    .hero-illustration img {
        max-width: 420px;
        width: 100%;
        border-radius: 20px;
        box-shadow: 0 8px 32px rgba(0, 90, 200, 0.2);
        background: var(--white);
        padding: 1rem;
        filter: drop-shadow(0 12px 24px rgba(0, 0, 0, 0.1));
        animation: float 4s ease-in-out infinite;
    }

    /* Poli Section Improvements */
    .section-poli {
        max-width: 1200px;
        margin: 4rem auto 0;
        padding: 0 1.5rem 3rem;
    }

    .section-poli h2 {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .section-poli h2 i {
        margin-right: 0.75rem;
        color: var(--primary-light);
    }

    .poli-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
    }

    .poli-card {
        background: var(--white);
        border-radius: 16px;
        padding: 1.75rem 1.5rem;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(0, 0, 0, 0.03);
    }

    .poli-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 28px rgba(40, 116, 252, 0.15);
    }

    .poli-icon {
        font-size: 2.2rem;
        margin-bottom: 1rem;
        color: var(--primary-light);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .poli-card h5 {
        font-weight: 700;
        margin-bottom: 0.75rem;
        color: var(--primary);
        font-size: 1.2rem;
    }

    .poli-dokter-list {
        margin-top: 0.5rem;
        width: 100%;
    }

    .poli-dokter {
        font-size: 1rem;
        color: var(--primary-light);
        font-weight: 600;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        padding: 0.5rem 0;
        border-bottom: 1px dashed rgba(0, 0, 0, 0.08);
    }

    .poli-dokter:last-child {
        border-bottom: none;
    }

    .poli-dokter i {
        color: var(--primary);
        margin-right: 0.5rem;
        font-size: 0.9em;
    }

    /* Enhanced Footer */
    .footer {
        background: var(--primary);
        color: var(--white);
        padding: 2.5rem 1.5rem 1.5rem;
        text-align: center;
        margin-top: 4rem;
        font-size: 1rem;
    }

    .footer-content {
        max-width: 800px;
        margin: 0 auto;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .footer a {
        color: var(--accent);
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .footer a:hover {
        text-decoration: underline;
        opacity: 0.9;
    }

    .footer-contact {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .footer-contact-item {
        display: flex;
        align-items: center;
    }

    .footer-contact-item i {
        margin-right: 0.5rem;
    }

    .copyright {
        margin-top: 1.5rem;
        opacity: 0.8;
    }

    /* Animations */
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-12px); }
    }

    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Responsive Adjustments */
    @media (max-width: 992px) {
        .hero-section h1 {
            font-size: 2.5rem;
        }
        
        .hero-section p {
            font-size: 1.05rem;
        }
    }

    @media (max-width: 768px) {
        .navbar {
            flex-direction: column;
            align-items: flex-start;
            padding: 1rem;
        }
        
        .nav-links {
            margin-top: 1rem;
            width: 100%;
            justify-content: space-between;
        }
        
        .nav-links a {
            margin-left: 0;
            font-size: 0.9rem;
        }
        
        .hero-section h1 {
            font-size: 2rem;
        }
        
        .hero-illustration img {
            max-width: 320px;
        }
        
        .section-poli h2 {
            font-size: 1.5rem;
            justify-content: flex-start;
        }
        
        .poli-grid {
            grid-template-columns: 1fr;
        }
        
        .footer-contact {
            flex-direction: column;
            gap: 1rem;
            align-items: center;
        }
    }

    @media (max-width: 480px) {
        .hero-section {
            padding: 4rem 1rem 2rem;
        }
        
        .btn-ambil {
            padding: 0.8rem 1.8rem;
            font-size: 1rem;
        }
        
        .footer {
            padding: 2rem 1rem 1rem;
        }
    }
</style>
@endsection

@section('content')

<!-- Enhanced Navbar -->
<nav class="navbar">
    <a href="#" class="nav-logo">
        <i class="fas fa-hospital"></i> RS Annisa
    </a>
    <div class="nav-links">
        <a href="{{ route('daftar.antrian') }}">
            <i class="fas fa-ticket-alt"></i> Ambil Antrian
        </a>
        <a href="#section-poli">
            <i class="fas fa-stethoscope"></i> Poli & Dokter
        </a>
        <a href="{{ route('login') }}">
            <i class="fas fa-sign-in-alt"></i> Login
        </a>
    </div>
</nav>

<!-- Enhanced Hero Section -->
<section class="hero-section">
    <h1>Sistem Antrian Rumah Sakit Annisa</h1>
    <p>Pelayanan kesehatan lebih cepat dan efisien dengan sistem antrian digital kami</p>
    <a href="{{ route('daftar.antrian') }}" class="btn-ambil">
        <i class="fas fa-ticket-alt"></i> Ambil Nomor Antrian
    </a>
    <div class="hero-illustration d-none d-md-flex">
        <img src="https://img.freepik.com/free-vector/doctor-character-background_1270-84.jpg" alt="Ilustrasi Dokter">
    </div>
</section>

<!-- Enhanced Poli Section -->
<section id="section-poli" class="section-poli">
    <h2><i class="fas fa-hospital"></i> Daftar Poli & Dokter</h2>
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
                            <div class="poli-dokter">
                                <i class="fas fa-user-md"></i> dr. {{ $dokter->nama }}
                            </div>
                        @endforeach
                    @else
                        <div class="poli-dokter">
                            <i class="fas fa-user-md"></i> Belum ada dokter
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <div class="text-center w-100">Belum ada data poli.</div>
        @endforelse
    </div>
</section>

<!-- Enhanced Footer -->
<footer class="footer">
    <div class="footer-content">
        <div class="footer-contact">
            <div class="footer-contact-item">
                <i class="fas fa-envelope"></i>
                <a href="mailto:annisasalsabila@email.com">annisasalsabila@email.com</a>
            </div>
            <div class="footer-contact-item">
                <i class="fab fa-whatsapp"></i>
                <a href="https://wa.me/6281234567890" target="_blank">0812-3456-7890</a>
            </div>
        </div>
    </div>
    <div class="copyright">
        &copy; {{ date('Y') }} Annisa Salsabila. All rights reserved.
    </div>
</footer>
@endsection