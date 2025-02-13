<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log; 
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        // Validate input fields
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // Attempt to find the user by email
        $user = User::where('email', $credentials['email'])->first();
    
        // If user exists, check password
        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Log visitor statistics
            $currentMonth = Carbon::now()->format('m');
            $currentYear = Carbon::now()->format('Y');
            DB::table('visitor_statistics')->updateOrInsert(
                ['month' => $currentMonth, 'year' => $currentYear],
                ['view_count' => DB::raw('view_count + 1'), 'updated_at' => now()]
            );
    
            // Log in the user
            Auth::login($user);
    
            // Redirect based on role
            if ($user->roles == 'admin') {
                return redirect()->route('dashboard-admin.indexAdmin')->with('success', 'Berhasil Login sebagai Admin');
            } else {
                return redirect()->route('dashboard-user.indexUser')->with('success', 'Selamat Datang');
            }
        }
    
        // If credentials are invalid
        return back()->withErrors(['message' => 'Invalid credentials'])->with('error', 'Email/Password Anda Salah, Harap Coba Lagi');
    }
    
    
    
}
