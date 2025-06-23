<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AnnisaDokter;

class DokterSeeder extends Seeder
{
    public function run(): void
    {
        $dokters = [
            ['nama' => 'dr. Budi Santoso', 'spesialis' => 'Umum', 'poli_id' => 1],
            ['nama' => 'drg. Sari Melati', 'spesialis' => 'Gigi', 'poli_id' => 2],
            ['nama' => 'dr. Rina Dewi', 'spesialis' => 'Anak', 'poli_id' => 3],
            ['nama' => 'dr. Andi Pratama', 'spesialis' => 'Kandungan', 'poli_id' => 4],
            ['nama' => 'dr. Joko Hartono', 'spesialis' => 'Jantung', 'poli_id' => 5],
        ];
        foreach ($dokters as $dokter) {
            AnnisaDokter::create($dokter);
        }
    }
} 