<?php

namespace App\Http\Controllers;

use App\Models\Meditasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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
            return view('components.psikolog.meditasi.index', compact('songs'));
        }
        
        // Untuk admin, tampilkan semua meditasi
        $songs = Meditasi::all();
        return view('components.admin.meditasi.kelolaMeditasi', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->role === 'psikolog') {
            return view('components.psikolog.meditasi.create');
        }
        return view('components.admin.meditasi.tambahLagu');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duration' => 'required|integer|min:1',
            'category' => 'required|string|in:pemula,menengah,lanjutan',
            'audio_file' => 'required|mimes:mp3,wav,m4a|max:51200', // Max 50MB
        ]);

        $audioPath = null;
        if ($request->hasFile('audio_file')) {
            $audioPath = $request->file('audio_file')->store('meditasi/audio', 'public');
        }

        Meditasi::create([
            'title' => $request->title,
            'description' => $request->description,
            'duration' => $request->duration,
            'category' => $request->category,
            'audio_file' => $audioPath,
            'created_by' => Auth::id(),
            'status' => 'active'
        ]);

        $redirectRoute = Auth::user()->role === 'psikolog' ? 'psikolog.meditasi.index' : 'kelolaMeditasi.index';
        return redirect()->route($redirectRoute)->with('success', 'Meditasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Meditasi $meditasi)
    {
        return view('components.meditasi.show', compact('meditasi'));
    }

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
            return view('components.psikolog.meditasi.edit', compact('meditasi'));
        }
        
        return view('components.admin.meditasi.editLagu', ['kelolaMeditasi' => $meditasi]);
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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duration' => 'required|integer|min:1',
            'category' => 'required|string|in:pemula,menengah,lanjutan',
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

        $meditasi->update([
            'title' => $request->title,
            'description' => $request->description,
            'duration' => $request->duration,
            'category' => $request->category,
            'audio_file' => $meditasi->audio_file,
        ]);

        $redirectRoute = Auth::user()->role === 'psikolog' ? 'psikolog.meditasi.index' : 'kelolaMeditasi.index';
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

        // Hapus file audio
        if ($meditasi->audio_file) {
            Storage::disk('public')->delete($meditasi->audio_file);
        }

        $meditasi->delete();

        $redirectRoute = Auth::user()->role === 'psikolog' ? 'psikolog.meditasi.index' : 'kelolaMeditasi.index';
        return redirect()->route($redirectRoute)->with('success', 'Meditasi berhasil dihapus!');
    }
}