<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Carbon;
use Livewire\Component;

class UserChart extends Component
{
    public $userChartData;

    public function render()
    {
        // Ambil data pengguna yang dikelompokkan berdasarkan tanggal pendaftaran
        $dataUser = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
                        ->groupBy('date')
                        ->orderBy('date', 'asc')
                        ->get();

        // Persiapkan data untuk chart
        $data = [
            'labels' => [],  // Tanggal pendaftaran
            'data' => []     // Jumlah pengguna yang terdaftar pada tanggal tersebut
        ];

        // Looping data untuk membuat label dan data
        foreach ($dataUser as $user) {
            $data['labels'][] = Carbon::parse($user->date)->format('Y-m-d'); // Format tanggal
            $data['data'][] = $user->count; // Jumlah pengguna pada tanggal tersebut
        }

        // Kirim data ke frontend
        $this->userChartData = $data;

        return view('livewire.user-chart');
    }
}
