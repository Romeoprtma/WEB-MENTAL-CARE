<?php

namespace App\Http\Controllers;

use App\Models\Psikolog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PsikologController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $psikologs = Psikolog::all();
    $daftarPsikolog = User::where('role', 'psikolog')->select('name')->get();
    return view('components.admin.kelolaPsikolog', compact('psikologs', 'daftarPsikolog'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', 'psikolog')->select('name')->get();
        return view('components.admin.tambahPsikolog', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:225',
            'deskripsi' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Psikolog::create([
            'name' => $request->name,
            'deskripsi' => $request->deskripsi,
            'image' => $imagePath,
        ]);

        return redirect()->route('kelolaPsikolog.index')->with('success', 'Psikolog berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Psikolog $psikolog)
    {
        // return view('components.admin.detailPsikolog', compact('psikolog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Psikolog $kelolaPsikolog)
    {
        return view('components.admin.editPsikolog', compact('kelolaPsikolog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Psikolog $kelolaPsikolog)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'deskripsi' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('image')) {
        if ($kelolaPsikolog->image) {
            Storage::disk('public')->delete($kelolaPsikolog->image);
        }
        $kelolaPsikolog->image = $request->file('image')->store('images/psikolog', 'public');
    }

    $kelolaPsikolog->update([
        'name' => $request->name,
        'deskripsi' => $request->deskripsi,
        'image' => $kelolaPsikolog->image ?? $kelolaPsikolog->image,
    ]);

    return redirect()->route('kelolaPsikolog.index')->with('success', 'Psikolog berhasil diperbarui!');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Psikolog $psikolog, $id)
    {
        $psikolog = Psikolog::findOrFail($id);
        if ($psikolog->image) {
            Storage::disk('public')->delete($psikolog->image);
        }

        $psikolog->delete();

        return redirect()->route('kelolaPsikolog.index')->with('success', 'Psikolog berhasil dihapus!');
    }

}
