<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi data yang dikirimkan oleh pengguna
        $request->validate([
            'username' => 'required|string|min:3|max:255', // Validasi username
            'email' => 'required|string|email|max:255|unique:users,email', // Validasi email
            'password' => 'required', // Validasi password dan konfirmasi password
        ]);

        // Membuat pengguna baru
        $user = User::create([
            'nama' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkripsi password
        ]);

        // Redirect ke halaman setelah berhasil registrasi
        return redirect()->route('login.index')->with('success', 'Akun berhasil dibuat!');
    }
}
