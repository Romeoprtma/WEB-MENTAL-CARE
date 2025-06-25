<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Psikolog extends Model
{
    // Tabel yang terkait dengan model
    protected $table = 'psikolog';

    // Kolom yang bisa diisi (fillable)
    protected $fillable = [
        'user_id',
        'pengalaman',
        'spesialis',
        'jadwal_konseling',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
