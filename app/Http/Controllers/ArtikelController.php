<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\lamaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        return view('admin-page.artikel.list-artikel',);
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
            'judul' => 'required',
            'konten' => 'required',
            'kategori' => 'required',
            'gambar' => 'required'
        ]);

        $validasi['id_admin'] = Auth::user()->id;

        $artikel = Artikel::create($validasi);

        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('storage/gambars/', $request->file('gambar')->getClientOriginalName());
            $artikel->gambar = $request->file('gambar')->getClientOriginalName();
            $artikel->save();
        }
        return back()->with('success', 'Berhasil Membuat Artikel');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id); // You can also use findOrFail to avoid null errors.
        return response()->json([
            'artikel' => $artikel
        ]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $artikelId)
    {
        // Validate the request
        $validasi = $request->validate([
            'judul' => 'required',
            'editkonten' => 'required',
            'kategori' => 'required',
            'gambar' => 'nullable' // Make 'gambar' nullable, as it might not be updated every time
        ]);
    
        // Find the artikel to update
        $artikel = Artikel::findOrFail($artikelId);
    
        // Update fields
        $artikel->judul = $validasi['judul'];
        $artikel->konten = $validasi['editkonten'];
        $artikel->kategori = $validasi['kategori'];
    
        // Handle file upload if a new file is uploaded
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('storage/gambars/', $request->file('gambar')->getClientOriginalName());
            $artikel->gambar = $request->file('gambar')->getClientOriginalName();
        }
    
        // Save changes
        $artikel->save();
    
        return response()->json(['success' => 'Artikel updated successfully']);
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
    
        // Delete the article
        $artikel->delete();
    
        return response()->json(['success' => 'Artikel berhasil dihapus.']);
    }

    public function tipsKarir()
    {
        $lamaran = lamaran::all(); // Mengambil semua data lamaran

        $artikels = Artikel::where('kategori', 'Tips Karir')->latest()->get();
        return view('admin-page.artikel.tipskarir', compact('artikels', 'lamaran'));
    }

    public function beritaWikrama()
    {
        $lamaran = lamaran::all(); // Mengambil semua data lamaran

        $artikels = Artikel::where('kategori', 'Berita Wikrama')->latest()->get();
        return view('admin-page.artikel.beritawikrama', compact('artikels', 'lamaran'));
    }

}
