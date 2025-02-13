<?php

namespace App\Http\Controllers;

use App\Models\PendidikanUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PendidikanUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_universitas' => 'required',
            'jurusan' => 'required',
            'statusPendidikan' => 'required|in:Masih,Tidak', 
            'tanggal_mulai' => 'required',
            'tanggal_berakhir' => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);

        $pendidikan = new PendidikanUser();
        $pendidikan->nama_universitas = $validatedData['nama_universitas'];
        $pendidikan->jurusan = $validatedData['jurusan'];
        $pendidikan->id_user = Auth::user()->id;
        $pendidikan->tanggal_mulai = $validatedData['tanggal_mulai'];
        $pendidikan->status_pendidikan = $validatedData['statusPendidikan'];

        if ($validatedData['statusPendidikan'] === 'Tidak') {
            // User is no longer working here, so `tanggal_berakhir` is required
            $pendidikan->tanggal_berakhir = $validatedData['tanggal_berakhir'];
        } else {
            // User is still working, set `tanggal_berakhir` to null
            $pendidikan->tanggal_berakhir = null;
        }

        $pendidikan->save();

        return redirect()->back()->with('success', 'Data Pendidikan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(PendidikanUser $pendidikanUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PendidikanUser $pendidikanUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
        // Validasi input dari request
        $validatedData = $request->validate([
            'nama_universitas' => 'required',
            'jurusan' => 'required',
            'tanggal_mulai' => 'required',
            'statusPendidikan' => 'required|in:Masih,Tidak', 
            'tanggal_berakhir' => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);
    
        // Cari data pendidikan berdasarkan id
        $pendidikan = PendidikanUser::findOrFail($id);
    
        // Update data pendidikan dengan input yang telah divalidasi
        $pendidikan->nama_universitas = $validatedData['nama_universitas'];
        $pendidikan->jurusan = $validatedData['jurusan'];
        $pendidikan->id_user = Auth::user()->id;
        $pendidikan->tanggal_mulai = $validatedData['tanggal_mulai'];
        $pendidikan->status_pendidikan = $validatedData['statusPendidikan'];
        $pendidikan->tanggal_berakhir = $validatedData['tanggal_berakhir'];
    
        if ($validatedData['statusPendidikan'] === 'Tidak') {
            // User is no longer working here, so `tanggal_berakhir` is required
            $pendidikan->tanggal_berakhir = $validatedData['tanggal_berakhir'];
        } else {
            // User is still working, set `tanggal_berakhir` to null
            $pendidikan->tanggal_berakhir = null;
        }

        // Simpan perubahan ke database
        $pendidikan->save();
    
        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Data Pendidikan Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PendidikanUser $pendidikanUser)
    {
        //
    }
}
