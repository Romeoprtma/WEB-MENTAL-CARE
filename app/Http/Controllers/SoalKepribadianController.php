<?php

namespace App\Http\Controllers;

use App\Imports\SoalKepribadianImport;
use App\Models\HasilTes;
use App\Models\TesKepribadian;
use App\Models\TempTesKepribadian;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

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

        return back()->with('success', 'Soal kepribadian berhasil diimport dan menunggu persetujuan admin.');
    }

    public function index()
    {
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

        foreach ($jawaban as $soalId => $pilihan) {
            $soal = TesKepribadian::find($soalId);
            if ($soal) {
                $dimensi[$soal->dimensi][$pilihan]++;
            }
        }

        $hasil = '';
        $hasil .= ($dimensi['E/I']['A'] > $dimensi['E/I']['B']) ? 'E' : 'I';
        $hasil .= ($dimensi['S/N']['A'] > $dimensi['S/N']['B']) ? 'S' : 'N';
        $hasil .= ($dimensi['T/F']['A'] > $dimensi['T/F']['B']) ? 'T' : 'F';
        $hasil .= ($dimensi['J/P']['A'] > $dimensi['J/P']['B']) ? 'J' : 'P';

        HasilTes::create([
            'user_id' => auth()->id(),
            'hasil' => $hasil,
            'jawaban' => json_encode($jawaban),
        ]);

        return view('components.user.hasilTes', compact('hasil'));
    }

    public function showApprovalPage()
    {
    $tempTes = TempTesKepribadian::orderBy('id')->get();
    return view('components.admin.approveTesKepribadian', compact('tempTes'));
    }


    public function approveTes()
    {
        $tempData = TempTesKepribadian::all();

        foreach ($tempData as $item) {
            TesKepribadian::create([
                'nomor' => $item->nomor,
                'pernyataan_a' => $item->pernyataan_a,
                'pernyataan_b' => $item->pernyataan_b,
                'dimensi' => $item->dimensi,
            ]);
        }

        TempTesKepribadian::truncate();

        return redirect()->back()->with('success', 'Soal berhasil disetujui dan dipindahkan ke sistem.');
    }
}
