<?php

namespace App\Imports;

use App\Models\TesKepribadian;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class SoalKepribadianImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows->skip(3) as $row) {
            $nomor = $row[0];
            if (is_numeric($nomor) && $row[1] && $row[4]) {
                TesKepribadian::create([
                    'nomor' => $nomor,
                    'pernyataan_a' => $row[1],
                    'pernyataan_b' => $row[4],
                    'dimensi' => $this->getDimensi($nomor),
                ]);
            }
        }
    }
    private function getDimensi($nomor)
    {
        if ($nomor % 4 == 1) return 'E/I';
        if ($nomor % 4 == 2) return 'S/N';
        if ($nomor % 4 == 3) return 'T/F';
        if ($nomor % 4 == 0) return 'J/P';
        return '-';
    }
}
