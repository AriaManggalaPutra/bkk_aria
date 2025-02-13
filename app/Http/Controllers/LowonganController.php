<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\lamaran;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function dataLamaran()
     {
        $lowongan = lowongan::all(); // Mengambil semua data lamaran

         return view('admin-page.lamaran.list-lamaran',compact('lowongan'));
     }

    public function index(Request $request)
    {
        $lamaran = lamaran::all(); // Mengambil semua data lamaran

        // Ambil input pencarian dari request
        $searchCompanyName = $request->input('company-name');
        $searchLocation = $request->input('company-location');
        $searchBranch = $request->input('branch-search');
    
        // Buat query
        $query = Perusahaan::query();
    
        // Terapkan filter berdasarkan input pencarian
        if (!empty($searchCompanyName)) {
            $query->where('nama_perusahaan', 'like', '%' . $searchCompanyName . '%');
        }
    
        if (!empty($searchLocation)) {
            $query->where('lokasi', 'like', '%' . $searchLocation . '%');
        }
    
        if (!empty($searchBranch)) {
            $query->where('jenis_industri', 'like', '%' . $searchBranch . '%');
        }
    
        // Dapatkan hasil dengan filter dan urutkan
        $perusahaans = $query->orderBy('nama_perusahaan', 'asc')->get();
    
        // Kembalikan hasil ke view
        return view('admin-page.lowongan.list-lowongan', compact('perusahaans', 'lamaran'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {

        $perusahaan = Perusahaan::findOrFail($id);
        $lowongan = lowongan::where('id_perusahaan', $id)->get();
        return view('admin-page.lowongan.lowongancreate', compact('perusahaan', 'lowongan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'nama_pekerjaan' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'kebutuhan_kandidat' => 'required|integer|min:1',
            'gaji' => 'required|integer|min:0',
            'about_job' => 'required|string',
            'requirement' => 'required|string',
            'responsibility' => 'required|string',
            'sistem_kerja' => 'required|string|in:WFH,WFO,HYBRID',
            'model_kerja' => 'required|string|in:Magang,Penuh Waktu,Paruh Waktu',
            'tanggal_berakhir' => 'required',
        ]);
    
        $tanggalBerakhir = new \DateTime($validatedData['tanggal_berakhir']);
        $tanggalBerakhir->setTimezone(new \DateTimeZone('Asia/Jakarta')); // Convert to WIB

        // Create the job posting in the database
        $lowongan = new Lowongan();
        $lowongan->nama_pekerjaan = $validatedData['nama_pekerjaan'];
        $lowongan->lokasi = $validatedData['lokasi'];
        $lowongan->kebutuhan_kandidat = $validatedData['kebutuhan_kandidat'];
        $lowongan->gaji = $validatedData['gaji'];
        $lowongan->about_job = $validatedData['about_job'];
        $lowongan->requirement = $validatedData['requirement'];
        $lowongan->responsibility = $validatedData['responsibility'];
        $lowongan->sistem_kerja = $validatedData['sistem_kerja'];
        $lowongan->model_kerja = $validatedData['model_kerja'];
        $lowongan->id_perusahaan = $request->id_perusahaan; // Assuming you pass the company ID
        $lowongan->tanggal_berakhir = $tanggalBerakhir->format('Y-m-d H:i:s'); 


        $lowongan->id_admin = Auth::user()->id;
        // Save to the database
        $lowongan->save();
    
        // Redirect or return a success message
        return redirect()->back()->with('success', 'Pekerjaan berhasil dibuat');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Lowongan $lowongan)
    {
        return view('rekrutmen.lowongan');
    }

    public function showopened(Lowongan $lowongan)
    {
        return view('rekrutmen.lowongan');
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lowongan $lowongan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'nama_pekerjaan' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'kebutuhan_kandidat' => 'required|integer|min:1',
            'gaji' => 'required|integer|min:0',
            'about_job' => 'required|string',
            'requirement' => 'required|string',
            'responsibility' => 'required|string',
            'sistem_kerja' => 'required|string|in:WFH,WFO,HYBRID',
            'model_kerja' => 'required|string|in:Magang,Penuh Waktu,Paruh Waktu',
        ]);
    
        // Find the job posting by its ID
        $lowongan = Lowongan::findOrFail($id);
    
        // Update the job posting with the validated data
        $lowongan->nama_pekerjaan = $validatedData['nama_pekerjaan'];
        $lowongan->lokasi = $validatedData['lokasi'];
        $lowongan->kebutuhan_kandidat = $validatedData['kebutuhan_kandidat'];
        $lowongan->gaji = $validatedData['gaji'];
        $lowongan->about_job = $validatedData['about_job'];
        $lowongan->requirement = $validatedData['requirement'];
        $lowongan->responsibility = $validatedData['responsibility'];
        $lowongan->sistem_kerja = $validatedData['sistem_kerja'];
        $lowongan->model_kerja = $validatedData['model_kerja'];
        $lowongan->id_perusahaan = $request->id_perusahaan; // Assuming you pass the company ID
        $lowongan->id_admin = Auth::user()->id;
    
        // Save the changes to the database
        $lowongan->save();
    
        // Redirect or return a success message
        return redirect()->back()->with('success', 'Pekerjaan Berhasil diperbarui');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lowongan = Lowongan::findOrFail($id);
    
        // Delete the article
        $lowongan->delete();
    
        return redirect()->back()->with('success', 'Perusahaan berhasil Dihapus');
    }
}
