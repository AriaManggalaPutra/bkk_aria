<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Models\lamaran;
use Illuminate\Support\Facades\Auth;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lamaran = lamaran::all(); // Mengambil semua data lamaran

        $perusahaan = Perusahaan::orderBy('nama_perusahaan', 'asc')->get();
        return view('admin-page.perusahaan.list-perusahaan', compact('perusahaan', 'lamaran'));
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
        $validasi = $request->validate([
            'nama_perusahaan' => 'required',
            'deskripsi_perusahaan' => 'required',
            'logo' => 'required',
            'jumlah_karyawan' => 'required|string|in:10-20,20-100,100+',
            'jenis_industri' => 'required',
            'banner' => 'required',
            'web' => 'required',
            'alamat' => 'required'
        ]);
        $validasi['id_admin'] = Auth::user()->id;

        $artikel = Perusahaan::create($validasi);

        if ($request->hasFile('logo')) {
            $request->file('logo')->move('storage/gambars/', $request->file('logo')->getClientOriginalName());
            $artikel->logo = $request->file('logo')->getClientOriginalName();
            $artikel->save();
        }

        if ($request->hasFile('banner')) {
            $request->file('banner')->move('storage/gambars/', $request->file('banner')->getClientOriginalName());
            $artikel->banner = $request->file('banner')->getClientOriginalName();
            $artikel->save();
        }
        return back()->with('success', 'Data Perusahaan Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Perusahaan $perusahaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perusahaan $perusahaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_perusahaan' => 'required',
            'deskripsi_perusahaan' => 'required',
            'logo' => 'nullable|image',
            'jumlah_karyawan' => 'required|string|in:10-20,20-100,100+',
            'jenis_industri' => 'required',
            'banner' => 'nullable|image',
            'web' => 'required',
            'alamat' => 'required'
        ]);
    
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->nama_perusahaan = $request->nama_perusahaan;
        $perusahaan->deskripsi_perusahaan = $request->deskripsi_perusahaan;
        $perusahaan->alamat = $request->alamat;
        $perusahaan->jumlah_karyawan = $request->jumlah_karyawan; // Assign jumlah_karyawan
    
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $perusahaan->logo = $logoPath;
        }
        if ($request->hasFile('banner')) {
            $bannerPath = $request->file('banner')->store('banners', 'public');
            $perusahaan->banner = $bannerPath;
        }
    
        $perusahaan->save();
    
        return redirect()->back()->with('success', 'Perusahaan berhasil diperbarui');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $artikel = Perusahaan::findOrFail($id);
    
        // Delete the article
        $artikel->delete();
    
        return redirect()->back()->with('success', 'Perusahaan berhasil diperbarui');
    }
    
}
