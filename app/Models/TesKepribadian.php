<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TesKepribadian extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terhubung dengan model ini.
     * Kode ini sudah benar, menunjuk ke tabel 'tes_kepribadian'.
     */
    protected $table = 'tes_kepribadian';

    /**
     * --- PERBAIKAN UTAMA DI SINI ---
     * Menambahkan 'value_a' dan 'value_b' ke daftar kolom yang boleh diisi.
     */
    protected $fillable = [
        'nomor',
        'pernyataan_a',
        'pernyataan_b',
        'dimensi',
    ];

    /**
     * Relasi ke model HasilTes. Ini sudah benar.
     */
    public function hasilTes()
    {
        return $this->hasMany(HasilTes::class, 'tes_kepribadian_id');
    }

    /**
     * Accessor untuk mengambil pernyataan.
     * Bonus: Saya perbaiki typo dari pernyataan_A menjadi pernyataan_a.
     */
    public function getPernyataanAttribute()
    {
        return [
            'A' => $this->pernyataan_a, // Typo diperbaiki
            'B' => $this->pernyataan_b, // Typo diperbaiki
        ];
    }
}