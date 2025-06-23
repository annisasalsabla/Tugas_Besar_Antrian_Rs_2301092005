@extends('layouts.admin')

@section('title', 'Data Poli')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Data Poli</h3>
        <a href="{{ route('poli.create') }}" class="btn btn-primary">+ Tambah Poli</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Poli</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($polis as $poli)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $poli->nama_poli }}</td>
                    <td>{{ $poli->lokasi }}</td>
                    <td>
                        <a href="{{ route('poli.edit', $poli->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('poli.destroy', $poli->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada data poli.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection 