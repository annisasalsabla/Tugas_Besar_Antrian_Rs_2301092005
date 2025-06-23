@extends('layouts.app')

@section('title', 'Pendaftaran Antrian Online')

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
    }

    .registration-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        padding: 2rem 0;
    }

    .form-wrapper {
        background: var(--white);
        border-radius: 16px;
        padding: 3rem;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(0, 0, 0, 0.05);
        max-width: 800px;
        margin: 0 auto;
    }

    .form-header {
        margin-bottom: 2rem;
        text-align: center;
    }

    .form-header h2 {
        color: var(--primary);
        font-weight: 700;
        margin-bottom: 0.5rem;
        font-size: 1.8rem;
    }

    .form-header p {
        color: var(--text-light);
        font-size: 1rem;
    }

    .form-label {
        font-weight: 600;
        color: var(--primary);
        margin-bottom: 0.5rem;
        display: block;
    }

    .form-control, .form-select {
        border-radius: 8px;
        padding: 0.75rem 1rem;
        border: 1px solid rgba(0, 0, 0, 0.1);
        transition: all 0.2s ease;
        width: 100%;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--primary-light);
        box-shadow: 0 0 0 0.2rem rgba(40, 116, 252, 0.1);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .btn-primary {
        background: linear-gradient(to right, var(--primary), var(--primary-light));
        border: none;
        border-radius: 8px;
        padding: 0.75rem;
        font-weight: 600;
        transition: all 0.2s ease;
        width: 100%;
        margin-top: 0.5rem;
    }

    .btn-primary:hover {
        opacity: 0.9;
    }

    .btn-outline-secondary {
        border-radius: 8px;
        padding: 0.75rem;
        font-weight: 600;
        transition: all 0.2s ease;
        width: 100%;
        margin-top: 0.5rem;
    }

    .alert-danger {
        border-radius: 8px;
        background-color: rgba(220, 53, 69, 0.1);
        border-left: 4px solid #dc3545;
        padding: 1rem;
        margin-bottom: 2rem;
    }

    .alert-danger ul {
        margin-bottom: 0;
        padding-left: 1rem;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .form-wrapper {
            padding: 2rem;
        }
    }

    @media (max-width: 576px) {
        .registration-container {
            padding: 1rem;
        }
        
        .form-wrapper {
            padding: 1.5rem;
        }
        
        .form-header h2 {
            font-size: 1.5rem;
        }
    }
</style>
@endsection

@section('content')
<div class="registration-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-wrapper">
                    <div class="form-header">
                        <h2><i class="fas fa-clipboard-check me-2"></i> Pendaftaran Antrian</h2>
                        <p>Silakan isi data diri Anda dengan lengkap dan benar</p>
                    </div>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('daftar.antrian') }}">
                        @csrf
                        
                        <!-- Data Pribadi -->
                        <div class="form-group">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="number" class="form-control" id="nik" name="nik" value="{{ old('nik') }}" placeholder="Masukkan NIK" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Sesuai KTP" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="no_hp" class="form-label">Nomor HP</label>
                            <input type="tel" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" placeholder="Contoh: 08123456789" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="poli_id" class="form-label">Poli Tujuan</label>
                            <select class="form-select" id="poli_id" name="poli_id" required>
                                <option value="" disabled selected>-- Pilih Poli --</option>
                                @foreach($polis as $poli)
                                    <option value="{{ $poli->id }}" {{ old('poli_id') == $poli->id ? 'selected' : '' }}>{{ $poli->nama_poli }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat lengkap" required>{{ old('alamat') }}</textarea>
                        </div>
                        
                        <!-- Tombol Submit -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane me-2"></i> Kirim Pendaftaran
                            </button>
                        </div>
                        
                        <div class="form-group">
                            <a href="/" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection