<?php

namespace App\Http\Controllers;

use App\Models\lamaran;
use Illuminate\Http\Request;

class NavbarController extends Controller
{
    public function getNotif()
    {
        $lamaran = lamaran::all(); // Mengambil semua data lamaran

        return view('layouts.navbar-admin', compact('lamaran'));
    }
}
