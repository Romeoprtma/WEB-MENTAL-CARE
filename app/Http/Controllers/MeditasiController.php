<?php

namespace App\Http\Controllers;

use App\Models\Meditasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MeditasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Meditasi::all();
        return view('components.admin.meditasi.kelolaMeditasi', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('components.admin.meditasi.tambahLagu');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'duration' => 'required',
            'audio_file' => 'required|mimes:mp3,wav|max:15240', // Pastikan format dan ukuran file benar
        ]);

        // Menyimpan file audio
        if ($request->hasFile('audio_file')) {
            $audioPath = $request->file('audio_file')->store('audio_files', 'public');
        }

        // Menyimpan data lagu ke database
        Meditasi::create([
            'title' => $request->title,
            'duration' => $request->duration,
            'audio_file' => $audioPath ?? '',
        ]);

        return redirect()->route('kelolaMeditasi.index')->with('success', 'Lagu berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Meditasi $meditasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meditasi $kelolaMeditasi)
    {
        return view('components.admin.meditasi.editLagu', compact('kelolaMeditasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Meditasi $kelolaMeditasi)
    {
        $request->validate([
            'title' => 'required',
            'duration' => 'required',
            'audio_file' => 'mimes:mp3,wav|max:15240', // Jika ada file baru
        ]);

        // Update file audio jika ada
        if ($request->hasFile('audio_file')) {
            if ($kelolaMeditasi->audio_file) {
                Storage::disk('public')->delete($kelolaMeditasi->audio_file);
            }
            $kelolaMeditasi->image = $request->file('audio_file')->store('audio_files', 'public');
        }


        $kelolaMeditasi->update([
            'title' => $request->title,
            'duration' => $request->duration,
            'audio_file' => $kelolaMeditasi->audio_file ?? $kelolaMeditasi->audio_file,
        ]);

        return redirect()->route('kelolaMeditasi.index')->with('success', 'Lagu berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meditasi $meditasi, $id)
    {
        $meditasi = Meditasi::findOrFail($id);
        if ($meditasi->audio_file) {
            Storage::disk('public')->delete($meditasi->audio_file);
        }

        $meditasi->delete();

        return redirect()->route('kelolaMeditasi.index')->with('success', 'Psikolog berhasil dihapus!');
    }
}
