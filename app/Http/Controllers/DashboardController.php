<?php

namespace App\Http\Controllers;

use App\Models\lamaran;
use App\Models\user;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\VisitorStat;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexUser()
{
    // Get user data
    $user = DB::table('users')->where('id', auth()->user()->id)->first();

    // Get counts for cards
    $countPerusahaan = DB::table('perusahaans')->count();
    $countlowongans = DB::table('lowongans')->count();

    // Get latest lamaran for the logged-in user
    // Menggunakan id_user (sesuaikan dengan nama kolom yang benar di database Anda)
    $latestLamaran = DB::table('lamarans')
        ->where('id_user', auth()->user()->id)  // Mengubah user_id menjadi id_user
        ->orderBy('created_at', 'desc')
        ->first();

    // Check empty fields
    $fieldToCheck = [
        'nama',
        'nisn',
        'email',
        'no_telepon',
        'jurusan',
        'rayon',
        'status',
        'feedback',
        'alamat',
    ];

    $emptyField = 0;
    foreach ($fieldToCheck as $field) {
        if (empty($user->{$field})) {
            $emptyField++;
        }

        $lamaran = DB::table('lamarans')
        ->join('lowongans', 'lamarans.id_lowongan', '=', 'lowongans.id')
        ->join('perusahaans', 'lowongans.id_perusahaan', '=', 'perusahaans.id') // Join ke tabel perusahaans
        ->join('users', 'lamarans.id_user', '=', 'users.id')
        ->select('lowongans.nama_pekerjaan', 'perusahaans.nama_perusahaan') // Menambah kolom nama_perusahaan dari tabel perusahaans
        ->orderBy('lamarans.created_at', 'desc') // Mengurutkan berdasarkan waktu pembuatan terbaru
        ->first();
    
    
        return view('user-page.dashboard', compact(
            'emptyField',
            'countPerusahaan',
            'countlowongans',
            'latestLamaran'
        ));
    }
}

    public function indexAdmin(Request $request)
    {
        $lamaran = Lamaran::all(); // Mengambil semua data lamaran
        
        // Mengambil data statistik pengunjung per bulan untuk setiap tahun
        $visitorStats = DB::table('visitor_statistics')
            ->select(DB::raw('SUM(view_count) as total_views, month, year'))
            ->groupBy('month', 'year')
            ->orderBy('year')
            ->orderBy('month')
            ->get();
    
        // Konversi data menjadi array untuk dipakai di Chart.js
        $months = [];
        $viewCounts = [];
    
        foreach ($visitorStats as $stat) {
            // Mengubah angka bulan dan tahun menjadi format 'Month Year' (misalnya: January 2024)
            $months[] = date("F Y", mktime(0, 0, 0, $stat->month, 1));
            $viewCounts[] = $stat->total_views;
        }

        $TahunTracer = date('Y'); // Get the current year as default
        $JurusanTracer = null; // Default value for JurusanTracer if not provided
    
        // Check if the request has input values
        if ($request) {
            $TahunTracer = intval($request->input('TracerTahun', $TahunTracer)); // Use request value or current year
            $JurusanTracer = $request->input('TracerJurusan', $JurusanTracer); // Use request value or default
        }
    
        // Perform the queries with the specified year and jurusan
        $Kerja = User::where('status', 'Kerja')
            ->whereYear('updated_at', $TahunTracer) // Filter based on the updated_at year
            ->when($JurusanTracer, function($query) use ($JurusanTracer) {
                return $query->where('jurusan', $JurusanTracer); // Apply jurusan condition only if provided
            })
            ->count(); 
    
        $Kuliah = User::where('status', 'Kuliah')
            ->whereYear('updated_at', $TahunTracer)
            ->when($JurusanTracer, function($query) use ($JurusanTracer) {
                return $query->where('jurusan', $JurusanTracer);
            })
            ->count();
    
        $Wirausaha = User::where('status', 'Wirausaha')
            ->whereYear('updated_at', $TahunTracer)
            ->when($JurusanTracer, function($query) use ($JurusanTracer) {
                return $query->where('jurusan', $JurusanTracer);
            })
            ->count();

        // dd($viewCounts//);
    
        return view('admin-page.dashboard', compact('Kerja',  'Kuliah', 'Wirausaha', 'lamaran', 'months', 'viewCounts'));
    }

    
    public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login.index')->with('success', 'Berhasil Logout');
}
}
