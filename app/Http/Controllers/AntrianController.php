<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnnisaPasien;
use App\Models\AnnisaPoli;
use App\Models\AnnisaAntrian;
use Illuminate\Support\Carbon;

class AntrianController extends Controller
{
    // Tampilkan form pendaftaran antrian
    public function showForm()
    {
        $polis = AnnisaPoli::all();
        return view('frontend.daftar_antrian', compact('polis'));
    }

    // Proses simpan data antrian
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'poli_id' => 'required|exists:annisa_polis,id',
        ]);

        // Cek pasien berdasarkan NIK
        $pasien = AnnisaPasien::firstOrCreate(
            ['nik' => $request->nik],
            [
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'tanggal_lahir' => now(), // Bisa diubah jika ingin input tgl lahir
                'jenis_kelamin' => 'L', // Default, bisa diubah jika ingin input
                'no_hp' => $request->no_hp,
            ]
        );

        // Generate nomor antrian otomatis (per poli per hari)
        $tanggal = now()->toDateString();
        $lastAntrian = AnnisaAntrian::where('poli_id', $request->poli_id)
            ->whereDate('tanggal', $tanggal)
            ->orderByDesc('id')->first();
        $nomor = $lastAntrian ? $lastAntrian->nomor + 1 : 1;

        $antrian = AnnisaAntrian::create([
            'pasien_id' => $pasien->id,
            'dokter_id' => null, // Diisi nanti oleh petugas/admin
            'poli_id' => $request->poli_id,
            'tanggal' => $tanggal,
            'status' => 'menunggu',
            'nomor' => $nomor,
        ]);

        return redirect()->route('bukti.antrian', $antrian->id);
    }

    // Tampilkan bukti antrian
    public function bukti($id)
    {
        $antrian = AnnisaAntrian::with(['pasien', 'poli'])->findOrFail($id);
        return view('frontend.bukti_antrian', compact('antrian'));
    }
}
