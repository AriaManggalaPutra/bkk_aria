<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function detail($id)
    {
        $user = User::findOrFail($id);
        return view('admin-page.profile.detail', compact('user'));  
    
    }

    public function settings()
    {
        $user = Auth::user();
        return view('admin-page.profile.settings', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);
    
        // Update email
        $user->email = $request->email;
    
        // Update password if it's provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
    
        $user->save();
    
        return redirect()->route('profile.settings')->with('success', 'Profile updated successfully');
    }

    public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login.index')->with('success', 'Successfully logged out');
}
    

    

}
