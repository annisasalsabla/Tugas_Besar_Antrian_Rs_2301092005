@extends('layouts.admin')

@section('title', 'Data Pasien')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Data Pasien</h3>
</div>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No. HP</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($pasiens as $pasien)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pasien->nik }}</td>
                <td>{{ $pasien->nama }}</td>
                <td>{{ $pasien->alamat }}</td>
                <td>{{ $pasien->no_hp }}</td>
                <td>
                    <a href="{{ route('admin.pasien.edit', $pasien->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="{{ route('admin.pasien.riwayat', $pasien->id) }}" class="btn btn-sm btn-info">Riwayat</a>
                    <form action="{{ route('admin.pasien.destroy', $pasien->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada data pasien.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection 