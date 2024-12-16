<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class profileController extends Controller
{
    // Method untuk menampilkan profil
    public function viewProfile()
    {
        // Ambil user berdasarkan role dan ID login
        $users = User::where('id', Auth::id())->first();

        return view('components.user.profile', compact('users'));
    }

    public function updateProfile(Request $request)
    {
        $users = User::where('id', Auth::id())->first();

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'string|max:20',
            'address' => 'string|max:255',
            'image' => 'image|file|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($users->image) {
                Storage::disk('public')->delete($users->image); // Menghapus gambar lama di 'public' disk
            }

            // Simpan gambar baru
            $imageFile = $request->file('image');
            $imageName = time() . '_' . $imageFile->getClientOriginalName();
            $imageFile = $imageFile->storeAs('images', $imageName);

            // Simpan path gambar ke database
            $users->image = $imageFile;
        }


        $users->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'image'=>$imageName
        ]);

        return redirect(Auth::user()->role.'/profile');
    }
}
