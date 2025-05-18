<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'asal_tamu',
        'menemui',
        'alasan',
        'foto_tamu',
    ];

    public function getFotoTamuUrlAttribute()
{
    return asset($this->foto_tamu);
}
}
