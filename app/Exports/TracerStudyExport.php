<?php

namespace App\Exports;

use App\Models\User;
use App\Models\PendidikanUser;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Illuminate\Support\Facades\DB;

class TracerStudyExport implements WithMultipleSheets
{

    /**
     * Return the sheets that should be included in the export.
     *
     * @return array
     */

    public function sheets(): array
    {
        return [
            new UsersSheet(), // Sheet 1 for users
            // new PendidikanUsersSheet(), // Sheet 2 for pendidikan_users
        ];
    }

}

class UsersSheet implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */

     
    public function collection()
    {
        return User::select('users.nama', 'users.jurusan', 'users.angkatan', 'users.status',
                'pekerjaan_users.nama_perusahaan', 'pekerjaan_users.posisi', 'pekerjaan_users.status_bekerja', 'pekerjaan_users.updated_at',
                'pendidikan_users.nama_universitas', 'pendidikan_users.jurusan as pendidikan_jurusan', // Mengganti nama kolom untuk menghindari konflik
                'wirausahas.nama_usaha', 'wirausahas.bidang_usaha')
            ->leftJoin('pekerjaan_users', 'users.id', '=', 'pekerjaan_users.id_user')
            ->leftJoin('pendidikan_users', 'users.id', '=', 'pendidikan_users.id_user')
            ->leftJoin('wirausahas', 'users.id', '=', 'wirausahas.id_user')
            ->where('users.roles', 'User     ')
            ->orderBy('users.updated_at', 'desc') // Mengurutkan berdasarkan updated_at terbaru
            ->get()
            ->groupBy('nama') // Mengelompokkan berdasarkan nama
            ->map(function ($items) {
                // Mengambil data pertama dari setiap grup
                $firstItem = $items->first();
                $combinedItem = [
                    'nama' => $firstItem->nama,
                    'jurusan' => $firstItem->jurusan,
                    'angkatan' => $firstItem->angkatan,
                    'status' => $firstItem->status,
                    'nama_perusahaan_universitas_usaha' => "-", // Kolom gabungan
                    'posisi_jurusan_omset' => "-" // Kolom gabungan
                ];
    
                if ($firstItem->status === "Kerja") {
                    // Memisahkan item berdasarkan status_bekerja
                    $workingItems = $items->filter(function ($item) {
                        return $item->status_bekerja === "Masih" || $item->status_bekerja === "Sudah";
                    });
    
                    // Jika ada item dengan status "Masih" atau "Sudah", ambil yang terbaru
                    if ($workingItems->isNotEmpty()) {
                        $latestWorkingItem = $workingItems->sortByDesc('updated_at')->first();
                        $combinedItem['nama_perusahaan_universitas_usaha'] = $latestWorkingItem->nama_perusahaan ?: "-";
                        $combinedItem['posisi_jurusan_omset'] = $latestWorkingItem->posisi ?: "-";
                    }
                } elseif ($firstItem->status === "Kuliah") {
                    // Jika status adalah kuliah, ambil informasi pendidikan
                    $latestEducationItem = $items->sortByDesc('pendidikan_users.updated_at')->first();
                    if ($latestEducationItem) {
                        $combinedItem['nama_perusahaan_universitas_usaha'] = $latestEducationItem->nama_universitas ?: "-";
                        $combinedItem['posisi_jurusan_omset'] = $latestEducationItem->pendidikan_jurusan ?: "-";
                    }
                } elseif ($firstItem->status === "Wirausaha") {
                    // Jika status adalah wirausaha, ambil informasi wirausaha
                    $latestBusinessItem = $items->sortByDesc('wirausahas.updated_at')->first();
                    if ($latestBusinessItem) {
                        $combinedItem['nama_perusahaan_universitas_usaha'] = $latestBusinessItem->nama_usaha ?: "-";
                        $combinedItem['posisi_jurusan_omset'] = $latestBusinessItem->bidang_usaha ?: "-"; 
                    }
                }
    
                return (object) $combinedItem; // Mengembalikan item yang sudah digabung
            })
            ->values(); // Mengembalikan collection yang sudah diubah
    }
    
    /**
     * Define the headings for each column
     * 
     * @return array
     */
    public function headings(): array
    {
        return ['Nama', 'Jurusan', 'Tahun Lulus', 'Status', 'Nama Perusahaan/Universitas/Usaha', 'Posisi/Jurusan/Bidang Usaha'];
    }
}

