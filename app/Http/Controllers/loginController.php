<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function showLogin(){
        return view('components.user.login');
    }

    public function login(Request $request){
        // Validasi kredensial
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|string|min:6',
        ]);

        // Cek apakah kredensial valid dan pengguna berhasil login
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Arahkan pengguna berdasarkan role mereka
            if ($user->role === 'user') {
                return redirect()->intended('/user/home')->with('success', 'Selamat datang, ' . $user->name);
            } elseif ($user->role === 'psikolog') {
                return redirect()->intended('/psikolog/home')->with('success', 'Selamat datang, ' . $user->name);
            }
        }

        // Jika login gagal, kembalikan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function handleAuth(Request $request)
    {
        $formType = $request->input('form_type');

        if ($formType === 'register') {
            return $this->register($request);
        }
        if ($formType === 'login') {
            return $this->login($request);
        }

        return redirect()->back()->with('error', 'Aksi tidak valid.');
    }

    public function showLoginAdmin(){
        return view('components.admin.loginAdmin');
    }

    public function loginAdmin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|string|min:6',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect('admin/homeAdmin')->with('success', 'Selamat datang, Admin ' . $user->name);
            }

            Auth::logout();
            return back()->withErrors(['email' => 'Hanya admin yang dapat mengakses halaman ini.']);
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function showRegisterAdmin(){
        return view ('components.admin.registerAdmin');
    }

    // Register untuk admin
    public function registerAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin', // Role otomatis admin
        ]);
        Auth::login($user);

        return redirect('/loginAdmin')->with('success', 'Registrasi berhasil! Selamat datang, Admin!');
    }

    protected function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:user,psikolog',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // Login otomatis setelah registrasi
        Auth::login($user);

        // Redirect ke halaman home sesuai role
        if ($user->role === 'user') {
            return redirect('user/home')->with('success', 'Registrasi berhasil! Selamat datang!');
        } elseif ($user->role === 'psikolog') {
            return redirect('psikolog/home')->with('success', 'Registrasi berhasil! Selamat datang!');
        }

        // return redirect('admin/homeAdmin')->with('success', 'Registrasi berhasil! Selamat datang!');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        session()->flash('logout', 'You have successfully logged out.');
        return redirect('/');
    }
}
