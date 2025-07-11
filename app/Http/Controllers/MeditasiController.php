<?php

namespace App\Http\Controllers;

use App\Models\Meditasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use getID3;


class MeditasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // Untuk psikolog, tampilkan hanya meditasi yang dibuat olehnya
        if (Auth::user()->role === 'psikolog') {
            $songs = Meditasi::where('created_by', Auth::id())->get();

            return view('components.psikolog.meditasi.kelolaMeditasiPsikolog', compact('songs'));
        }
        // Untuk admin, tampilkan semua meditasi
        $songs = Meditasi::all();
        return view('components.admin.meditasi.kelolaMeditasi', compact('songs'));
    }

    public function create()
    {
        if (Auth::user()->role === 'psikolog') {

            return view('components.psikolog.meditasi.tambahMeditasi');

        }
        return view('components.admin.meditasi.tambahLagu');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|in:relaksasi,tidur,fokus',
            'audio_file' => 'required|mimes:mp3,wav,m4a|max:51200', // Max 50MB
        ]);

        $audioPath = null;
        if ($request->hasFile('audio_file')) {
            $audioPath = $request->file('audio_file')->store('meditasi/audio', 'public');
        }
        $audioPath = null;
        $durationInSeconds = null;

        // Proses upload audio
        if ($request->hasFile('audio_file')) {
            $file = $request->file('audio_file');
            $audioPath = $file->store('audio', 'public');

            // Hitung durasi audio menggunakan getID3
            $getID3 = new \getID3;
            $fileInfo = $getID3->analyze($file->getRealPath());

            $durationInSeconds = isset($fileInfo['playtime_seconds'])
                ? round($fileInfo['playtime_seconds'])
                : 0; // Jika gagal, default ke 0 detik
        }

        // Cek role, jika admin langsung approve
        $user = Auth::user();
        $isAdmin = $user->role === 'admin';

        // Simpan data ke database
        Meditasi::create([
            'title' => $request->title,
            'description' => $request->description,
            'duration' => $durationInSeconds,
            'category' => $request->category,
            'audio_file' => $audioPath,
            'created_by' => $user->id,
            'is_approved' => $isAdmin,
            'approved_by' => $isAdmin ? $user->id : null,
            'status' => $isAdmin ? 'approved' : 'pending',
        ]);

        // Redirect sesuai role
        $redirectRoute = $user->role === 'psikolog'
            ? 'kelolaMeditasiPsikolog.index'
            : 'kelolaMeditasi.index';

        return redirect()->route($redirectRoute)->with('success', 'Meditasi berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    // public function show(Meditasi $meditasi)
    // {
    //     return view('components.meditasi.show', compact('meditasi'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meditasi $meditasi)
    {
        // Pastikan psikolog hanya bisa edit meditasi mereka sendiri
        if (Auth::user()->role === 'psikolog' && $meditasi->created_by !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        if (Auth::user()->role === 'psikolog') {
            return view('components.psikolog.meditasi.editMeditasi', compact('meditasi'));
        }

        return view('components.admin.meditasi.editLagu', compact('meditasi'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Meditasi $meditasi)
    {
        // Pastikan psikolog hanya bisa update meditasi mereka sendiri
        if (Auth::user()->role === 'psikolog' && $meditasi->created_by !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|in:relaksasi,tidur,fokus',
            'audio_file' => 'nullable|mimes:mp3,wav,m4a|max:51200', // Max 50MB
        ]);

        // Update file audio jika ada file baru
        if ($request->hasFile('audio_file')) {
            // Hapus file lama
            if ($meditasi->audio_file) {
                Storage::disk('public')->delete($meditasi->audio_file);
            }
            // Simpan file baru
            $meditasi->audio_file = $request->file('audio_file')->store('meditasi/audio', 'public');
        }
        $durationInSeconds = $meditasi->duration;

        // Jika ada file audio baru diunggah
        if ($request->hasFile('audio_file')) {
            // Hapus file lama jika ada
            if ($meditasi->audio_file) {
                Storage::disk('public')->delete($meditasi->audio_file);
            }

            // Simpan file baru
            $file = $request->file('audio_file');
            $newPath = $file->store('audio', 'public');
            $meditasi->audio_file = $newPath;

            // Hitung durasi file baru menggunakan getID3
            $getID3 = new \getID3;
            $fileInfo = $getID3->analyze($file->getRealPath());
            $durationInSeconds = isset($fileInfo['playtime_seconds'])
                ? round($fileInfo['playtime_seconds'])
                : 0;
        }

        // Reset status approval jika psikolog yang mengedit
        if (Auth::user()->role === 'psikolog') {
            $meditasi->is_approved = false;
            $meditasi->approved_by = null;
            $meditasi->status = 'pending';
        }

        $meditasi->update([
        'title' => $request->title,
        'description' => $request->description,
        'category' => $request->category,
        'duration' => $durationInSeconds,
        'audio_file' => $meditasi->audio_file,
        'is_approved' => $meditasi->is_approved,
        'approved_by' => $meditasi->approved_by,
        'status' => $meditasi->status,
        ]);

        $redirectRoute = Auth::user()->role === 'psikolog' ?
            'kelolaMeditasiPsikolog.index'
            : 'kelolaMeditasi.index';

        return redirect()->route($redirectRoute)->with('success', 'Meditasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meditasi $meditasi)
    {
        // Pastikan psikolog hanya bisa hapus meditasi mereka sendiri
        if (Auth::user()->role === 'psikolog' && $meditasi->created_by !== Auth::id()) {
            abort(403, 'Unauthorized');
        }
        // Hapus file audio dari storage jika ada
        if ($meditasi->audio_file && Storage::disk('public')->exists($meditasi->audio_file)) {

            Storage::disk('public')->delete($meditasi->audio_file);
        }

        // Hapus data meditasi dari database
        $meditasi->delete();


        $redirectRoute = Auth::user()->role === 'psikolog' ? 'psikolog.meditasi.index' : 'kelolaMeditasi.index';
        return redirect()->route($redirectRoute)->with('success', 'Meditasi berhasil dihapus!');
    }

    public function approve($id)
    {
        $meditasi = Meditasi::findOrFail($id);
        $meditasi->is_approved = true;
        $meditasi->approved_by = Auth::id();
        $meditasi->status = 'approved';
        $meditasi->save();

        return redirect()->back()->with('success', 'Meditasi berhasil di-approve.');
    }
}
