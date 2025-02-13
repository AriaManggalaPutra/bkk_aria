<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TrackVisitor
{
    public function handle($request, Closure $next)
    {
        // Dapatkan bulan dan tahun saat ini
        // $currentMonth = Carbon::now()->format('m');
        // $currentYear = Carbon::now()->format('Y');
        // $user_id = Auth::user()->id;

        //     // Jika belum ada data statistik untuk bulan ini, buat data baru
        //     DB::table('visitor_statistics')->insert([
        //         'month' => $currentMonth,
        //         'year' => $currentYear,
        //         'user_id' => $user_id,
        //         'view_count' => 1,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);

        return $next($request);
    }
}
