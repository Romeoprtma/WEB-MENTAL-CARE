<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempTesKepribadian extends Model
{
    protected $table = 'temp_tes_kepribadian';

    protected $fillable = [
        'nomor',
        'pernyataan_a',
        'pernyataan_b',
        'dimensi',
    ];
}
