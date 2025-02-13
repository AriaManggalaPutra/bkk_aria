<?php

namespace App\Http\Controllers;

use App\Models\PekerjaanUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PekerjaanUserController extends Controller
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


        // Validate the form inputs
        $validatedData = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'model_kerja' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'statusBekerja' => 'required|in:Masih,Tidak', // `masih` jika masih bekerja, `tidak` jika sudah berhenti
            'tanggal_berakhir' => 'nullable|date|after_or_equal:tanggal_mulai', // Optional if still working
            'alamat' => 'required|string|max:255',
        ]);
    
        // Create a new job entry in the database
        $pekerjaan = new PekerjaanUser();
        $pekerjaan->nama_perusahaan = $validatedData['nama_perusahaan'];
        $pekerjaan->posisi = $validatedData['posisi'];
        $pekerjaan->model_kerja = $validatedData['model_kerja'];
        $pekerjaan->status_bekerja = $validatedData['statusBekerja'];
        $pekerjaan->tanggal_mulai = $validatedData['tanggal_mulai'];
        $pekerjaan->alamat_perusahaan = $validatedData['alamat'];
        $pekerjaan->id_user = Auth::user()->id;
    
        // Set `tanggal_berakhir` based on `statusBekerja`
        if ($validatedData['statusBekerja'] === 'Tidak') {
            // User is no longer working here, so `tanggal_berakhir` is required
            $pekerjaan->tanggal_berakhir = $validatedData['tanggal_berakhir'];
        } else {
            // User is still working, set `tanggal_berakhir` to null
            $pekerjaan->tanggal_berakhir = null;
        }
    
        // Save the job data
        $pekerjaan->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Data Pekerjaan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(PekerjaanUser $pekerjaanUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PekerjaanUser $pekerjaanUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the form inputs
        $validatedData = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'model_kerja' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'statusBekerja' => 'required|in:Masih,Tidak',
            'tanggal_berakhir' => 'nullable|date|after_or_equal:tanggal_mulai',
            'alamat' => 'required|string|max:255',
        ]);
    
        // Find the job entry by ID
        $pekerjaan = PekerjaanUser::findOrFail($id);
    
        // Update the job data
        $pekerjaan->nama_perusahaan = $validatedData['nama_perusahaan'];
        $pekerjaan->posisi = $validatedData['posisi'];
        $pekerjaan->model_kerja = $validatedData['model_kerja'];
        $pekerjaan->tanggal_mulai = $validatedData['tanggal_mulai'];
        $pekerjaan->status_bekerja = $validatedData['statusBekerja'];
        $pekerjaan->alamat_perusahaan = $validatedData['alamat'];
    
        if ($validatedData['statusBekerja'] === 'Tidak') {
            // User is no longer working here, so `tanggal_berakhir` is required
            $pekerjaan->tanggal_berakhir = $validatedData['tanggal_berakhir'];
        } else {
            // User is still working, set `tanggal_berakhir` to null
            $pekerjaan->tanggal_berakhir = null;
        }

        // Save the updated job data
        $pekerjaan->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Data Pekerjaan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PekerjaanUser $pekerjaanUser)
    {
        //
    }
}
