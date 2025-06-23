@extends('layouts.admin')

@section('title', 'Data Dokter')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Data Dokter</h3>
    <a href="{{ route('admin.dokter.create') }}" class="btn btn-primary">+ Tambah Dokter</a>
</div>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Dokter</th>
            <th>Spesialis</th>
            <th>Poli</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($dokters as $dokter)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $dokter->nama }}</td>
                <td>{{ $dokter->spesialis }}</td>
                <td>{{ $dokter->poli->nama_poli ?? 'Tidak ada' }}</td>
                <td>
                    <a href="{{ route('admin.dokter.edit', $dokter->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.dokter.destroy', $dokter->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada data dokter.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection 