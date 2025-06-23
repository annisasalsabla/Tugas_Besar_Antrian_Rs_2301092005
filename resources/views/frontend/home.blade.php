@extends('layouts.landing')

@section('title', 'Sistem Antrian RS - Home')

@section('styles')
<style>
    .home-hero {
        height: 100vh;
        min-height: 100vh;
        width: 100vw;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%);
        color: #fff;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    body, html {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    .home-hero .login-btn {
        position: absolute;
        top: 30px;
        right: 40px;
        background: #fff;
        color: #0a2850;
        border-radius: 50px;
        padding: 8px 24px;
        font-weight: 600;
        text-decoration: none;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        transition: background 0.2s;
    }
    .home-hero .login-btn:hover {
        background: #ffc107;
        color: #0a2850;
    }
    .home-hero h1 {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 20px;
    }
    .home-hero p {
        font-size: 1.2rem;
        margin-bottom: 40px;
    }
    .home-hero .main-actions a {
        margin: 0 10px;
        padding: 16px 32px;
        font-size: 1.2rem;
        border-radius: 10px;
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
        transition: background 0.2s, color 0.2s;
    }
    .home-hero .ambil-antrian {
        background: #fff;
        color: #0a2850;
    }
    .home-hero .ambil-antrian:hover {
        background: #ffc107;
        color: #0a2850;
    }
</style>
@endsection

@section('content')
<div class="home-hero">
    <a href="{{ route('login') }}" class="login-btn">
        <i class="fas fa-sign-in-alt"></i> Login
    </a>
    <div class="w-100">
        <h1>Selamat Datang di Sistem Antrian RS</h1>
        <p>Mudah, cepat, dan transparan. Ambil nomor antrian secara online dari rumah Anda.</p>
        <div class="main-actions mt-4">
            <a href="{{ route('daftar.antrian') }}" class="ambil-antrian">Ambil Nomor Antrian</a>
        </div>
    </div>
</div>
@endsection 