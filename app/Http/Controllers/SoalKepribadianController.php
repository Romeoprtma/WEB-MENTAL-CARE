<?php

namespace App\Http\Controllers;
use App\Imports\SoalKepribadianImport;
use App\Models\HasilTes;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\TesKepribadian;

class SoalKepribadianController extends Controller
{
    public function formUpload()
    {
        return view('components.psikolog.kelolaTesKepribadian');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls'
        ]);

        Excel::import(new SoalKepribadianImport, $request->file('file'));

        return back()->with('success', 'Soal kepribadian berhasil diimport.');
    }

    public function index()
    {
        // Ambil semua soal
        $soals = TesKepribadian::orderBy('nomor')->get();
        return view('components.user.tesKepribadian', compact('soals'));
    }

   public function submit(Request $request)
{
    $jawaban = $request->input('jawaban');

    $dimensi = [
        'E/I' => ['A' => 0, 'B' => 0],
        'S/N' => ['A' => 0, 'B' => 0],
        'T/F' => ['A' => 0, 'B' => 0],
        'J/P' => ['A' => 0, 'B' => 0],
    ];

    foreach ($jawaban as $nomor => $pilihan) {
        $soal = TesKepribadian::where('nomor', $nomor)->first();
        if ($soal) {
            $dim = $soal->dimensi;
            $dimensi[$dim][$pilihan]++;
        }
    }

    // Hitung hasil akhir MBTI
    $hasil = '';
    $hasil .= ($dimensi['E/I']['A'] > $dimensi['E/I']['B']) ? 'E' : 'I';
    $hasil .= ($dimensi['S/N']['A'] > $dimensi['S/N']['B']) ? 'S' : 'N';
    $hasil .= ($dimensi['T/F']['A'] > $dimensi['T/F']['B']) ? 'T' : 'F';
    $hasil .= ($dimensi['J/P']['A'] > $dimensi['J/P']['B']) ? 'J' : 'P';

    // Simpan ke database
    HasilTes::create([
        'user_id' => auth()->id(), // kalau tidak pakai auth, boleh null
        'hasil' => $hasil,
        'jawaban' => json_encode($jawaban),
    ]);

    return view('components.user.hasilTes', compact('hasil'));
}

}
