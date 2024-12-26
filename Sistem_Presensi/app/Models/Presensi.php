<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'jadwal_id',
        'tanggal',
        'pertemuan',
        'materi'
    ];

    protected $casts = [
        'tanggal' => 'date'
    ];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

    public function presensiDetails()
    {
        return $this->hasMany(PresensiDetail::class);
    }
}
