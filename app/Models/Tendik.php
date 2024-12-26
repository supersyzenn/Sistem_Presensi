<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tendik extends Model
{
    use HasFactory;

    protected $fillable = [
        'nuptk',
        'nama_tendik',
        'jenis_kelamin',
        'status_kepegawaian',
        'foto'
    ];
}
