@extends('layouts.admin')

@section('title', 'Data Petugas')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Data Petugas</h3>
    <a href="{{ route('petugas.create') }}" class="btn btn-primary">+ Tambah Petugas</a>
</div>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($petugas as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->email }}</td>
                <td>
                    <a href="{{ route('petugas.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('petugas.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">Belum ada data petugas.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection 