<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Testimoni;
use App\Models\User;
use App\Models\AboutSection;
use App\Models\Perusahaan;
use App\Models\Lowongan;
use Illuminate\Pagination\Paginator;

class FrontController extends Controller
{

    public function home(){
        $about = AboutSection::first();
        $highlight = 'Kesuksesan Bisnis Anda!';
        $about->highlighted_text = $highlight;
        $about->title = str_replace($highlight, '', $about->title); // Hapus bagian highlight dari title
    
        $user = User::count();
        $company = Perusahaan::count();
        $lowonganss = Lowongan::count();
        $testimoni = Testimoni::all();
        return view('rekrutmen.home', compact('user', 'company', 'lowonganss', 'testimoni', "about"));
    }

    public function artikel()
    {
        $artikel = Artikel::get();
        $tipsKarir = Artikel::where('kategori', 'Tips Karir')->get();
        $beritaWikrama = Artikel::where('kategori', 'Berita Wikrama')->get();

        return view('rekrutmen.artikel', compact('tipsKarir', 'beritaWikrama', 'artikel'));
    }
    public function allartikel($id)
    {
        
        $artikels = Artikel::findOrFail($id);

        return view('rekrutmen.openedartikel', compact('artikels'));
    }

    public function perusahaan(Request $request)
    {
        $query = Perusahaan::query();
    
        // Filter by company name
        if ($request->has('nama_perusahaan') && $request->nama_perusahaan != '') {
            $query->where('nama_perusahaan', 'like', '%' . $request->nama_perusahaan . '%');
        }
    
        // Filter by company location (if applicable)
        if ($request->has('lokasi') && $request->lokasi != '') {
            $query->where('alamat', 'like', '%' . $request->lokasi . '%');
        }
    
        // If you also want to search by job title (from the lowongan table)
        if ($request->has('nama_pekerjaan') && $request->nama_pekerjaan != '') {
            $query->whereHas('lowongans', function ($q) use ($request) {
                $q->where('nama_pekerjaan', 'like', '%' . $request->nama_pekerjaan . '%');
            });
        }
    
        // Paginate the filtered results
        $perusahaans = $query->paginate(6);
        $perusahaanss = $query->count();
    
        return view('rekrutmen.company', compact('perusahaans', 'perusahaanss'));
    }
    

    public function detailperusahaan($id) {
        // Find the company by ID
        $perusahaan = Perusahaan::findOrFail($id);
        
        // Find job postings (lowongans) related to the company
        $lowongans = Lowongan::where('id_perusahaan', $id)->get();
        
        // Return the view with the company and job posting data
        return view('rekrutmen.companyopen', compact('perusahaan', 'lowongans'));
    }
    
    
    public function dataKeterserapan(Request $request) {
        // Default values in case no request is provided
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
    
        return view('rekrutmen.dataKeterserapan', compact('Kerja', 'Kuliah', 'Wirausaha'));
    }
    
    

    public function lowongan(Request $request)
    {
        $query = Lowongan::with('perusahaan');
    
        // Filter by job title
        if ($request->has('nama_pekerjaan') && $request->nama_pekerjaan != '') {
            $query->where('nama_pekerjaan', 'like', '%' . $request->nama_pekerjaan . '%');
        }
    
        // Filter by company location
        if ($request->has('lokasi') && $request->lokasi != '') {
            $query->where('lokasi', 'like', '%' . $request->lokasi . '%');
        }
    
        // Filter by company name (using the relationship with the company)
        if ($request->has('nama_perusahaan') && $request->nama_perusahaan != '') {
            $query->whereHas('perusahaan', function ($q) use ($request) {
                $q->where('nama_perusahaan', 'like', '%' . $request->nama_perusahaan . '%');
            });
        }
    
        // Paginate the results
        $lowongans = $query->paginate(6);
        $lowongantotal = $query->count();
    
        return view('rekrutmen.lowongan', compact('lowongans', 'lowongantotal'));
    }
    


    public function show($id)
    {
        $lowongan = Lowongan::with('perusahaan')->findOrFail($id);
        return view('rekrutmen.lowonganopen', compact('lowongan'));
    }


}
