<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnnisaPasien extends Model
{
    protected $fillable = [
        'nama', 'nik', 'alamat', 'tanggal_lahir', 'jenis_kelamin', 'no_hp'
    ];

    public function antrians()
    {
        return $this->hasMany(AnnisaAntrian::class, 'pasien_id');
    }
}
