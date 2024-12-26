<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'presensi_id',
        'siswa_id',
        'status',
        'keterangan'
    ];

    public function presensi()
    {
        return $this->belongsTo(Presensi::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
