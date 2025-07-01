<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TesKepribadian extends Model
{
    protected $table = 'tes_kepribadian';

    protected $fillable = [
        'nomor',
        'pernyataan_a',
        'pernyataan_b',
        'dimensi',
    ];

    public function hasilTes()
    {
        return $this->hasMany(HasilTes::class, 'tes_kepribadian_id');
    }

    public function getPernyataanAttribute()
    {
        return [
            'A' => $this->pernyataan_A,
            'B' => $this->pernyataan_B,
        ];
    }
}
