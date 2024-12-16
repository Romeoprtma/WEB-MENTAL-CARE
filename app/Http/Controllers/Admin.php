<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;
use Illuminate\Support\Facades\Auth;

class Admin extends Controller
{

    public function index(){
        $registeredUsers = User::count();

        $roleUser = User::where('role', 'user')->count();
        $rolePsikolog = User::where('role', 'psikolog')->count();

        // Simpan data dalam array
        $data = [
            'registeredUsers' => $registeredUsers,
            'roleUser' => $roleUser,
            'rolePsikolog' => $rolePsikolog
        ];

        return view('components.admin.homeAdmin', $data);
    }

    public function kelolaUser(){

    $users = User::whereIn('role', ['user'])->get();
    $psikolog = User::whereIn('role', ['psikolog'])->get();

    $data = [
        'users' => $users,
        'psikolog' => $psikolog
    ];

    return view('components.admin.kelolaUser', $data);
    }

    public function deleteUser($id)
{
    // Menghapus user berdasarkan id
    User::where('id', $id)->delete();

    // Redirect ke halaman yang sesuai setelah menghapus user
    return redirect()->route('admin.index')->with('success', 'User berhasil dihapus');
}

}

