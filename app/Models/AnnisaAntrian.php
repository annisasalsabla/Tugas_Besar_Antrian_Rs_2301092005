<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnnisaAntrian extends Model
{
    protected $fillable = [
        'pasien_id', 'dokter_id', 'poli_id', 'tanggal', 'status', 'nomor'
    ];

    public function pasien()
    {
        return $this->belongsTo(AnnisaPasien::class, 'pasien_id');
    }

    public function poli()
    {
        return $this->belongsTo(AnnisaPoli::class, 'poli_id');
    }
}
