<?php

namespace App\Imports;

use App\Models\TempTesKepribadian; // ← ganti targetnya
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class SoalKepribadianImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'Skala MBTI' => new class implements ToCollection {
                public function collection(Collection $rows)
                {
                    foreach ($rows->skip(2) as $row) {
                        $nomor = $row[0];
                        $a = $row[1];
                        $b = $row[4];

                        if (
                            is_numeric($nomor) &&
                            $nomor >= 1 && $nomor <= 60 &&
                            !empty($a) && !empty($b) &&
                            !$this->isDimensiLabel($a, $b)
                        ) {
                            \App\Models\TempTesKepribadian::updateOrCreate(
                                ['nomor' => $nomor],
                                [
                                    'pernyataan_a' => $a,
                                    'pernyataan_b' => $b,
                                    'dimensi' => self::getDimensi($nomor),
                                ]
                            );
                        }
                    }
                }

                private function isDimensiLabel($a, $b): bool
                {
                    $labels = ['INTROVERT', 'EKSTROVERT', 'SENSING', 'INTUITION', 'THINKING', 'FEELING', 'JUDGING', 'PERCEIVING'];
                    foreach ($labels as $label) {
                        if (stripos($a, $label) !== false || stripos($b, $label) !== false) {
                            return true;
                        }
                    }
                    return false;
                }

                private static function getDimensi($nomor)
                {
                    if ($nomor % 4 == 1) return 'E/I';
                    if ($nomor % 4 == 2) return 'S/N';
                    if ($nomor % 4 == 3) return 'T/F';
                    if ($nomor % 4 == 0) return 'J/P';
                    return '-';
                }
            },
        ];
    }
}
