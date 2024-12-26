<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAdmin extends Model
{
    use HasFactory;

    protected $table = 'user_admin';

    protected $fillable = [
        'user_id',
        'jenis_kelamin',
        'jabatan',
        'foto'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
