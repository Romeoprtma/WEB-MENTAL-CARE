<?php

namespace App\Http\Controllers;

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
    $psikolog = User::whereIn('role', ['psikolog'])->get();
    $psikologs = User::where('role', 'psikolog')->select('id')->get();
    return view('components.admin.kelolaPsikolog', compact('psikologs', 'psikolog'));
}


    /**
     * Show the form for creating a new resource.
     */
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
            'password' => 'required|string|min:6|confirmed',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'psikolog',
            'image' => $imagePath,
        ]);

        return redirect()->route('kelolaPsikolog.index')->with('success', 'Psikolog berhasil ditambahkan!');
    }

    public function edit(User $kelolaPsikolog)
    {
        $psikolog = User::whereIn('role', ['psikolog'])->get();
        return view('components.admin.editPsikolog', compact('psikolog', 'kelolaPsikolog'));
    }

    public function update(Request $request, User $kelolaPsikolog)
{
    $psikolog = User::whereIn('role', ['psikolog'])->get();
    $request->validate([
        'name' => 'required|string|max:225',
        'email' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:255',
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
        'email' => $request->email,
        'address' => $request->address,
        'phone' => $request->phone,
        'role' => 'psikolog',
        'image' => $kelolaPsikolog->image ?? $kelolaPsikolog->image,
    ]);

    return redirect()->route('kelolaPsikolog.index')->with('success', 'Psikolog berhasil diperbarui!');
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
