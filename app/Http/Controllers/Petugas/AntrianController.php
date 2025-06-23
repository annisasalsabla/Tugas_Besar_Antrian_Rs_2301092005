<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnnisaAntrian;

class AntrianController extends Controller
{
    public function index()
    {
        $antrians = AnnisaAntrian::whereDate('tanggal', today())
            ->with(['pasien', 'poli'])
            ->orderBy('nomor', 'asc')
            ->get();
        return view('petugas.antrian.index', compact('antrians'));
    }

    public function panggil($id)
    {
        $antrian = AnnisaAntrian::findOrFail($id);
        $antrian->status = 'dipanggil';
        $antrian->save();
        return redirect()->route('petugas.antrian.index')->with('success', 'Pasien dengan nomor antrian ' . $antrian->nomor . ' berhasil dipanggil.');
    }

    public function selesai($id)
    {
        $antrian = AnnisaAntrian::findOrFail($id);
        $antrian->status = 'selesai';
        $antrian->save();
        return redirect()->route('petugas.antrian.index')->with('success', 'Pasien dengan nomor antrian ' . $antrian->nomor . ' telah selesai dilayani.');
    }
}
