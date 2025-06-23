<?php

namespace App\Http\Controllers;

use App\Models\Psikolog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PsikologController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Cek apakah yang login adalah psikolog
        if (Auth::user()->role === 'psikolog') {
            $user = Auth::user(); // ambil data dari tabel users
            $profile = $user->psikolog; // ambil data dari tabel psikologs melalui relasi

            // tampilkan dashboard khusus psikolog
            return view('components.psikolog.profile.dashboardPsikolog', compact('user', 'profile'));
        }

        // Jika yang login adalah admin
        $psikolog = User::with('psikolog') // ambil data dari users dan relasi ke psikologs
                        ->where('role', 'psikolog')
                        ->get();

        // tampilkan daftar seluruh psikolog
        return view('components.admin.kelolaPsikolog', compact('psikolog'));
    }
    public function create()
    {
        $users = User::where('role', 'psikolog')->select('id')->get();
        return view('components.admin.tambahPsikolog', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:225',
            'email' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            // validasi opsional jika kamu ingin langsung isi ini
            'pengalaman' => 'nullable|numeric|min:0',
            'spesialis' => 'nullable|string|max:255',
            'jadwal_konseling' => 'nullable|string|max:255',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $emailPrefix = explode('@', $request->email)[0] ?? 'user'; // fallback jika email kosong
        $defaultPassword = $emailPrefix . '123';

        // 1. Simpan ke tabel users
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'password' => Hash::make($defaultPassword),
            'role' => 'psikolog',
            'image' => $imagePath,
        ]);

        // 2. Simpan ke tabel psikolog dengan user_id dari user yang baru dibuat
        Psikolog::create([
            'user_id' => $user->id,
            'pengalaman' => $request->pengalaman,
            'spesialis' => $request->spesialis,
            'jadwal_konseling' => $request->jadwal_konseling,
        ]);

        return redirect()->route('kelolaPsikolog.index')->with('success', 'Psikolog berhasil ditambahkan!');
    }


    public function edit(User $kelolaPsikolog)
    {
        // Jika yang login adalah psikolog
        if (Auth::user()->role === 'psikolog') {
            $psikolog = Auth::user(); // user yang login

            // Ambil profil psikolog dari tabel psikolog berdasarkan user_id
            $profile = $psikolog->psikolog; // menggunakan relasi

            return view('components.psikolog.profile.editProfilePsikolog', compact('psikolog', 'profile'));
        }

        // Jika admin, tampilkan form edit milik psikolog tertentu (dari parameter route)
        $psikolog = $kelolaPsikolog; // user yang mau diedit

        // Ambil profil psikolog dari tabel psikolog berdasarkan user_id
        $profile = $kelolaPsikolog->psikolog; // menggunakan relasi

        return view('components.admin.editPsikolog', compact('psikolog', 'profile'));
    }

    public function update(Request $request, User $kelolaPsikolog)
    {
        // Jika psikolog login, pakai data dirinya sendiri
        if (Auth::user()->role === 'psikolog') {
            $kelolaPsikolog = Auth::user();
        }

        $request->validate([
            'name' => 'nullable|string|max:225',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'pengalaman' => 'nullable|integer|min:0',
            'spesialis' => 'nullable|string|max:255',
            'jadwal_konseling' => 'nullable|string|max:255',
        ]);

        // Upload image
        if ($request->hasFile('image')) {
            if ($kelolaPsikolog->image) {
                Storage::disk('public')->delete($kelolaPsikolog->image);
            }
            $imagePath = $request->file('image')->store('images/psikolog', 'public');
        } else {
            $imagePath = $kelolaPsikolog->image;
        }

        // Update data user
        $kelolaPsikolog->update([
            'name' => $request->name ?? $kelolaPsikolog->name,
            'email' => $request->email ?? $kelolaPsikolog->email,
            'address' => $request->address ?? $kelolaPsikolog->address,
            'phone' => $request->phone ?? $kelolaPsikolog->phone,
            'role' => 'psikolog',
            'image' => $imagePath,
        ]);

        // Update atau buat data tambahan di tabel psikolog
        Psikolog::updateOrCreate(
            ['user_id' => $kelolaPsikolog->id],
            [
                'pengalaman' => $request->pengalaman,
                'spesialis' => $request->spesialis,
                'jadwal_konseling' => $request->jadwal_konseling,
            ]
        );

        $redirectRoute = Auth::user()->role === 'psikolog'
            ? 'home.index'
            : 'kelolaPsikolog.index';

        return redirect()->route($redirectRoute)->with('success', 'Profil psikolog berhasil diperbarui!');
    }


    public function destroy($id)
    {
        $psikolog = User::findOrFail($id);
        if ($psikolog->image) {
            Storage::disk('public')->delete($psikolog->image);
        }

        $psikolog->delete();

        return redirect()->route('kelolaPsikolog.index')->with('success', 'Psikolog berhasil dihapus!');
    }

}
