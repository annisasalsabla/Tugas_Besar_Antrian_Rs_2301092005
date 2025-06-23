@extends('layouts.admin')

@section('title', 'Tambah Poli')

@section('content')
<div class="container mt-4">
    <h3>Tambah Data Poli</h3>
    <form action="{{ route('admin.poli.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_poli" class="form-label">Nama Poli</label>
            <input type="text" class="form-control" id="nama_poli" name="nama_poli" required>
        </div>
        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.poli.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection 