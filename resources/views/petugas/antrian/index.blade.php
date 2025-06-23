@extends('layouts.petugas')

@section('title', 'Daftar Antrian Hari Ini')

@section('content')
<h3>Daftar Antrian Hari Ini ({{ \Carbon\Carbon::now()->format('d F Y') }})</h3>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped mt-3">
    <thead>
        <tr>
            <th>No. Antrian</th>
            <th>Nama Pasien</th>
            <th>Poli</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($antrians as $antrian)
            <tr>
                <td><h3>{{ $antrian->nomor }}</h3></td>
                <td>{{ $antrian->pasien->nama }}</td>
                <td>{{ $antrian->poli->nama_poli }}</td>
                <td>
                    @if($antrian->status == 'menunggu')
                        <span class="badge bg-warning">Menunggu</span>
                    @elseif($antrian->status == 'dipanggil')
                        <span class="badge bg-info">Dipanggil</span>
                    @else
                        <span class="badge bg-success">Selesai</span>
                    @endif
                </td>
                <td>
                    @if($antrian->status == 'menunggu')
                        <form action="{{ route('petugas.antrian.panggil', $antrian->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">Panggil</button>
                        </form>
                    @elseif($antrian->status == 'dipanggil')
                        <form action="{{ route('petugas.antrian.selesai', $antrian->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Selesai</button>
                        </form>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada antrian untuk hari ini.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection 