<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\lamaran;
use App\Models\PekerjaanUser;
use App\Models\PendidikanUser;
use App\Models\Wirausaha;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Exports\TracerStudyExport;
use Maatwebsite\Excel\Facades\Excel;

class TracerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $murid = User::where('id', Auth::user()->id)->first();
        $pekerjaans = PekerjaanUser::where('id_user', Auth::user()->id)->get();
        $pendidikans = PendidikanUser::where('id_user', Auth::user()->id)->get();
        $wirausahas = Wirausaha::where('id_user', Auth::user()->id)->get();
        return view('user-page.tracerStudy.tracerStudy', compact('murid', 'pekerjaans', 'pendidikans', 'wirausahas'));
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tracer $tracer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tracer $tracer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateProfile(Request $request, $id)
    {
        // dd($request->all());

        $user = User::findOrFail($id);
    
        // Validasi data input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'angkatan' => 'required',
            'email' => 'required|email|max:255',
            'no_telepon' => 'required|string|max:15',
            'jurusan' => 'required|string|max:255',
            'rayon' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'status' => 'required',
            'feedback' => 'required',
        ]);
    
        // Cek apakah ada file gambar yang diupload
        if ($request->hasFile('profile')) {
            // Hapus gambar lama jika ada
            if ($user->profile) {
                Storage::delete('public/profiles/' . $user->profile); // Menghapus gambar lama dari storage
            }
    
            // Upload gambar baru
            $file = $request->file('profile');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/profiles', $filename); // Simpan gambar di folder profiles dalam storage
    
            // Simpan nama file gambar ke database
            $user->profile = $filename;
        }
    
        // Update data user
        $user->update([
            'nama' => $validatedData['nama'],
            'angkatan' => $validatedData['angkatan'],
            'email' => $validatedData['email'],
            'no_telepon' => $validatedData['no_telepon'],
            'jurusan' => $validatedData['jurusan'],
            'rayon' => $validatedData['rayon'],
            'alamat' => $validatedData['alamat'],
            'status' => $validatedData['status'],
            'feedback' => $validatedData['feedback'],
        ]);

        $user->save();
    
        // Redirect atau respon sesuai kebutuhan
        return redirect()->back()->with('success', 'Data Anda Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tracer $tracer)
    {
        //
    }
}
