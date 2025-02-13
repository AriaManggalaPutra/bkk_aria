<?php

namespace App\Http\Controllers;

use App\Models\Wirausaha;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WirausahaController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nama_usaha' => 'required',
            'omzet' => 'required',
            'bidang_usaha' => 'required',
            'tanggal_mulai' => 'required',
            'statusWirausaha' => 'required|in:Masih,Tidak', 
            'tanggal_berakhir' => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);

        $wirausaha = new Wirausaha();
        $wirausaha->nama_usaha = $validatedData['nama_usaha'];
        $wirausaha->bidang_usaha = $validatedData['bidang_usaha'];
        $wirausaha->omzet = $validatedData['omzet'];
        $wirausaha->id_user = Auth::user()->id;
        $wirausaha->tanggal_mulai = $validatedData['tanggal_mulai'];
        $wirausaha->status_wirausaha = $validatedData['statusWirausaha'];

        if ($validatedData['statusWirausaha'] === 'Tidak') {
            // User is no longer working here, so `tanggal_berakhir` is required
            $wirausaha->tanggal_berakhir = $validatedData['tanggal_berakhir'];
        } else {
            // User is still working, set `tanggal_berakhir` to null
            $wirausaha->tanggal_berakhir = null;
        }

        $wirausaha->save();

        return redirect()->back()->with('success', 'Data Wirausaha Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wirausaha $wirausaha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wirausaha $wirausaha)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
        // Validasi input dari request
        $validatedData = $request->validate([
            'nama_usaha' => 'required',
            'bidang_usaha' => 'required',
            'omzet' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_berakhir' => 'nullable|date|after_or_equal:tanggal_mulai',
            'statusWirausaha' => 'required|in:Masih,Tidak', 
        ]);
    
        // Cari data pendidikan berdasarkan id
        $wirausaha = Wirausaha::findOrFail($id);
    
        // Update data pendidikan dengan input yang telah divalidasi
        $wirausaha->nama_usaha = $validatedData['nama_usaha'];
        $wirausaha->bidang_usaha = $validatedData['bidang_usaha'];
        $wirausaha->omzet = $validatedData['omzet'];
        $wirausaha->id_user = Auth::user()->id;
        $wirausaha->tanggal_mulai = $validatedData['tanggal_mulai'];
        $wirausaha->status_wirausaha = $validatedData['statusWirausaha'];

        if ($validatedData['statusWirausaha'] === 'Tidak') {
            // User is no longer working here, so `tanggal_berakhir` is required
            $wirausaha->tanggal_berakhir = $validatedData['tanggal_berakhir'];
        } else {
            // User is still working, set `tanggal_berakhir` to null
            $wirausaha->tanggal_berakhir = null;
        }
    
        // Simpan perubahan ke database
        $wirausaha->save();
    
        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Data Wirausaha Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wirausaha $wirausaha)
    {
        //
    }
}
