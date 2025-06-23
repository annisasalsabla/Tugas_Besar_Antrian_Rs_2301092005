<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnnisaDokter extends Model
{
    protected $table = 'annisa_dokters';
    protected $fillable = ['nama', 'spesialis', 'poli_id'];

    public function poli()
    {
        return $this->belongsTo(AnnisaPoli::class, 'poli_id');
    }
}
