<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilTes extends Model
{
    use HasFactory;

    protected $table = 'hasil_tes_kepribadian';

    protected $fillable = [
        'user_id',
        'jawaban',
        'tipe_kepribadian',
    ];

    protected $casts = [
        'jawaban' => 'array',
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
