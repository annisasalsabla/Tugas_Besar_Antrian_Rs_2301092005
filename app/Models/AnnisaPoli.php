<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnnisaPoli extends Model
{
    protected $fillable = [
        'nama_poli', 'lokasi'
    ];

    public function antrians()
    {
        return $this->hasMany(AnnisaAntrian::class, 'poli_id');
    }

    public function dokters()
    {
        return $this->hasMany(AnnisaDokter::class, 'poli_id');
    }
}
