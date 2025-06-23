@extends('layouts.admin')

@section('title', 'Tambah Dokter')

@section('content')
<h3>Tambah Data Dokter</h3>
<form action="{{ route('admin.dokter.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Dokter</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
        @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label for="spesialis" class="form-label">Spesialis</label>
        <input type="text" class="form-control @error('spesialis') is-invalid @enderror" id="spesialis" name="spesialis" value="{{ old('spesialis') }}" required>
        @error('spesialis')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label for="poli_id" class="form-label">Poli</label>
        <select class="form-select @error('poli_id') is-invalid @enderror" id="poli_id" name="poli_id" required>
            <option value="">-- Pilih Poli --</option>
            @foreach($polis as $poli)
                <option value="{{ $poli->id }}" {{ old('poli_id') == $poli->id ? 'selected' : '' }}>{{ $poli->nama_poli }}</option>
            @endforeach
        </select>
        @error('poli_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.dokter.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection 