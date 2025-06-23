@extends('layouts.admin')

@section('title', 'Riwayat Antrian Pasien')

@section('content')
<div class="mb-4">
    <h3>Riwayat Antrian: {{ $pasien->nama }}</h3>
    <a href="{{ route('admin.pasien.index') }}" class="btn btn-secondary btn-sm">Kembali ke Data Pasien</a>
</div>
@if($antrians->isEmpty())
    <div class="alert alert-info">Belum ada riwayat antrian untuk pasien ini.</div>
@else
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor Antrian</th>
            <th>Poli</th>
            <th>Tanggal</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($antrians as $antrian)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $antrian->nomor }}</td>
            <td>{{ $antrian->poli->nama_poli ?? '-' }}</td>
            <td>{{ \Carbon\Carbon::parse($antrian->tanggal)->format('d-m-Y') }}</td>
            <td>
                @if($antrian->status == 'menunggu')
                    <span class="badge bg-warning text-dark">Menunggu</span>
                @elseif($antrian->status == 'dipanggil')
                    <span class="badge bg-info text-dark">Dipanggil</span>
                @elseif($antrian->status == 'selesai')
                    <span class="badge bg-success">Selesai</span>
                @else
                    <span class="badge bg-secondary">{{ ucfirst($antrian->status) }}</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection 