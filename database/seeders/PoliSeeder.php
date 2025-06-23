<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AnnisaPoli;

class PoliSeeder extends Seeder
{
    public function run(): void
    {
        $polis = [
            ['nama_poli' => 'Poli Umum', 'lokasi' => 'Lantai 1'],
            ['nama_poli' => 'Poli Gigi', 'lokasi' => 'Lantai 2'],
            ['nama_poli' => 'Poli Anak', 'lokasi' => 'Lantai 1'],
            ['nama_poli' => 'Poli Kandungan', 'lokasi' => 'Lantai 2'],
            ['nama_poli' => 'Poli Jantung', 'lokasi' => 'Lantai 3'],
        ];
        foreach ($polis as $poli) {
            AnnisaPoli::create($poli);
        }
    }
} 