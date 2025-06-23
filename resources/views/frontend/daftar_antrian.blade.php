@extends('layouts.app')

@section('title', 'Pendaftaran Antrian Online')

@section('styles')
<style>
    .full-height {
        min-height: 80vh;
    }
    .form-container {
        background: #ffffff;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    .form-header h2 {
        color: #0a2850;
        font-weight: 700;
        margin-bottom: 5px;
    }
    .form-header p {
        color: #6c757d;
        margin-bottom: 30px;
    }
    .form-control {
        border-radius: 10px;
        padding: 12px;
    }
    .form-select {
        border-radius: 10px;
        padding: 12px;
    }
    .btn-primary {
        background-color: #0a2850;
        border-color: #0a2850;
        border-radius: 10px;
        padding: 12px;
        font-weight: 600;
    }
    .illustration-side {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .illustration-side img {
        max-width: 90%;
    }
    /* Hide default navbar and footer for this page to give a more focused experience */
    .navbar { display: none; }
    footer { display: none; }
</style>
@endsection

@section('content')
<div class="container full-height d-flex align-items-center">
    <div class="row w-100">
        <!-- Kolom Ilustrasi -->
        <div class="col-lg-6 illustration-side d-none d-lg-flex">
            <img src="https://img.freepik.com/free-vector/doctors-concept-illustration_114360-1515.jpg" alt="Ilustrasi Dokter">
        </div>

        <!-- Kolom Form -->
        <div class="col-lg-6 d-flex align-items-center">
            <div class="form-container w-100">
                <div class="form-header">
                    <h2>Pendaftaran Antrian</h2>
                    <p>Silakan isi data diri Anda untuk mendapatkan nomor antrian.</p>
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
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="number" class="form-control" id="nik" name="nik" value="{{ old('nik') }}" placeholder="Masukkan NIK Anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Sesuai KTP" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">Nomor HP</label>
                        <input type="tel" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" placeholder="Contoh: 08123456789" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="2" placeholder="Alamat lengkap Anda" required>{{ old('alamat') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="poli_id" class="form-label">Pilih Poli Tujuan</label>
                        <select class="form-select" id="poli_id" name="poli_id" required>
                            <option value="" disabled selected>-- Pilih Poli --</option>
                            @foreach($polis as $poli)
                                <option value="{{ $poli->id }}" {{ old('poli_id') == $poli->id ? 'selected' : '' }}>{{ $poli->nama_poli }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Dapatkan Nomor Antrian</button>
                    </div>
                    <div class="d-grid mt-2">
                        <a href="/" class="btn btn-outline-secondary" style="border-radius:10px; font-weight:600;">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 