<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MBTIController extends Controller
{
    public function mbti()
{
    // URL Google Apps Script
    $url = "https://script.google.com/macros/s/AKfycby7E2Bu38cf97borPc6Yw5hHDHu1cj1Bg2aswBQFAp7cGTrWZ-x3HkxmIBasDBk_SU/exec";
    try {
        // Ambil data JSON
        $response = Http::timeout(10)->get($url);

        // Pastikan response berhasil dan data JSON valid
        if ($response->successful() && $response->json()) {
            $data = $response->json(); // Ambil data JSON
            $questions = $data['options'] ?? []; // Ambil objek "options"

            // Akses data dan pastikan semua key ada
            $optionA1 = isset($questions['optionA1']) ? ($questions['optionA1'] * 100) : 0;
            $optionB1 = isset($questions['optionB1']) ? ($questions['optionB1'] * 100) : 0;
            $optionA2 = isset($questions['optionA2']) ? ($questions['optionA2'] * 100) : 0;
            $optionB2 = isset($questions['optionB2']) ? ($questions['optionB2'] * 100) : 0;
            $optionA3 = isset($questions['optionA3']) ? ($questions['optionA3'] * 100) : 0;
            $optionB3 = isset($questions['optionB3']) ? ($questions['optionB3'] * 100) : 0;
            $optionA4 = isset($questions['optionA4']) ? ($questions['optionA4'] * 100) : 0;
            $optionB4 = isset($questions['optionB4']) ? ($questions['optionB4'] * 100) : 0;

            // Perbandingan nilai dan pemilihan opsi
            $choice1 = $optionA1 > $optionB1 ? "{$optionA1}%" : "{$optionB1}%";
            $choice2 = $optionA2 > $optionB2 ? "{$optionA2}%" : "{$optionB2}%";
            $choice3 = $optionA3 > $optionB3 ? "{$optionA3}%" : "{$optionB3}%";
            $choice4 = $optionA4 > $optionB4 ? "{$optionA4}%" : "{$optionB4}%";

            // Perbandingan string dan pemilihan opsi
            $string1 = $optionA1 > $optionB1 ? "INTROVERT" : "EXTROVERT";
            $string2 = $optionA2 > $optionB2 ? "SENSING" : "INTUITION";
            $string3 = $optionA3 > $optionB3 ? "THINKING" : "FEELING";
            $string4 = $optionA4 > $optionB4 ? "JUDGING" : "PERCEIVING";

        } else {
            // Jika response gagal, gunakan nilai default 0
            $optionA1 = $optionB1 = $optionA2 = $optionB2 = 0;
            $optionA3 = $optionB3 = $optionA4 = $optionB4 = 0;
            $choice1 = $choice2 = $choice3 = $choice4 = "0%";
            $string1 = "INTROVERT";
            $string2 = "SENSING";
            $string3 = "THINKING";
            $string4 = "JUDGING";
        }
    } catch (\Exception $e) {
        // Tangkap error dan beri nilai default
        $optionA1 = $optionB1 = $optionA2 = $optionB2 = 0;
        $optionA3 = $optionB3 = $optionA4 = $optionB4 = 0;
        $choice1 = $choice2 = $choice3 = $choice4 = "0%";
        $string1 = "INTROVERT";
        $string2 = "SENSING";
        $string3 = "THINKING";
        $string4 = "JUDGING";
    }

    // Kirimkan data ke view
    return view('components.user.tesKepribadian', compact(
        'optionA1', 'optionB1', 'optionA2', 'optionB2',
        'optionA3', 'optionB3', 'optionA4', 'optionB4',
        'choice1', 'choice2', 'choice3', 'choice4',
        'string1', 'string2', 'string3', 'string4'
    ));
}

public function printTes() {
    // URL Google Apps Script
    $url = "https://script.google.com/macros/s/AKfycby7E2Bu38cf97borPc6Yw5hHDHu1cj1Bg2aswBQFAp7cGTrWZ-x3HkxmIBasDBk_SU/exec";
    try {
        // Ambil data JSON
        $response = Http::timeout(10)->get($url);

        // Pastikan response berhasil dan data JSON valid
        if ($response->successful() && $response->json()) {
            $data = $response->json(); // Ambil data JSON
            $questions = $data['options'] ?? []; // Ambil objek "options"

            // Akses data dan pastikan semua key ada
            $optionA1 = isset($questions['optionA1']) ? ($questions['optionA1'] * 100) : 0;
            $optionB1 = isset($questions['optionB1']) ? ($questions['optionB1'] * 100) : 0;
            $optionA2 = isset($questions['optionA2']) ? ($questions['optionA2'] * 100) : 0;
            $optionB2 = isset($questions['optionB2']) ? ($questions['optionB2'] * 100) : 0;
            $optionA3 = isset($questions['optionA3']) ? ($questions['optionA3'] * 100) : 0;
            $optionB3 = isset($questions['optionB3']) ? ($questions['optionB3'] * 100) : 0;
            $optionA4 = isset($questions['optionA4']) ? ($questions['optionA4'] * 100) : 0;
            $optionB4 = isset($questions['optionB4']) ? ($questions['optionB4'] * 100) : 0;

            // Perbandingan nilai dan pemilihan opsi
            $choice1 = $optionA1 > $optionB1 ? "{$optionA1}%" : "{$optionB1}%";
            $choice2 = $optionA2 > $optionB2 ? "{$optionA2}%" : "{$optionB2}%";
            $choice3 = $optionA3 > $optionB3 ? "{$optionA3}%" : "{$optionB3}%";
            $choice4 = $optionA4 > $optionB4 ? "{$optionA4}%" : "{$optionB4}%";

            // Perbandingan string dan pemilihan opsi
            $string1 = $optionA1 > $optionB1 ? "INTROVERT" : "EXTROVERT";
            $string2 = $optionA2 > $optionB2 ? "SENSING" : "INTUITION";
            $string3 = $optionA3 > $optionB3 ? "THINKING" : "FEELING";
            $string4 = $optionA4 > $optionB4 ? "JUDGING" : "PERCEIVING";

        } else {
            // Jika response gagal, gunakan nilai default 0
            $optionA1 = $optionB1 = $optionA2 = $optionB2 = 0;
            $optionA3 = $optionB3 = $optionA4 = $optionB4 = 0;
            $choice1 = $choice2 = $choice3 = $choice4 = "0%";
            $string1 = "INTROVERT";
            $string2 = "SENSING";
            $string3 = "THINKING";
            $string4 = "JUDGING";
        }
    } catch (\Exception $e) {
        // Tangkap error dan beri nilai default
        $optionA1 = $optionB1 = $optionA2 = $optionB2 = 0;
        $optionA3 = $optionB3 = $optionA4 = $optionB4 = 0;
        $choice1 = $choice2 = $choice3 = $choice4 = "0%";
        $string1 = "INTROVERT";
        $string2 = "SENSING";
        $string3 = "THINKING";
        $string4 = "JUDGING";
    }

    $users = Auth::user()->name;
    $pdf = Pdf::loadView('components.laporanHasilTes', compact(
        'optionA1', 'optionB1', 'optionA2', 'optionB2',
        'optionA3', 'optionB3', 'optionA4', 'optionB4',
        'choice1', 'choice2', 'choice3', 'choice4',
        'string1', 'string2', 'string3', 'string4','users'
    ));
    return $pdf->stream('hasilTes.pdf');

}

    public function submitAnswers(Request $request)
{
    $validatedData = $request->validate([
        'answers' => 'required|array',
    ]);

    $answers = $validatedData['answers'];

    $isianC = array_fill(0, 60, 0);
    $isianD = array_fill(0, 60, 0);

    foreach ($answers as $index => $value) {
        if ($value === 'A') {
            $isianC[$index] = 1;
        } elseif ($value === 'B') {
            $isianD[$index] = 1;
        }
    }

    $url = "https://script.google.com/macros/s/AKfycby7E2Bu38cf97borPc6Yw5hHDHu1cj1Bg2aswBQFAp7cGTrWZ-x3HkxmIBasDBk_SU/exec";

    // Kirim data ke Apps Script
    $response = Http::post($url, [
        'isianC' => $isianC,
        'isianD' => $isianD,
    ]);

    // Refresh data setelah pengiriman
    if ($response->successful()) {
        $refreshResponse = Http::get($url); // Memanggil doGet untuk refresh data
        $data = $refreshResponse->json();

        return response()->json(['message' => 'Data berhasil dikirim dan di-refresh!', 'data' => $data]);
    } else {
        return response()->json(['message' => 'Gagal mengirim data!', 'error' => $response->body()], 500);
    }
}


}
