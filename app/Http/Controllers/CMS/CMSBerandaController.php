<?php

namespace App\Http\Controllers\CMS;

use App\Models\LamaranSection;
use App\Models\KeunggulanSection;
use App\Models\Testimoni;
use App\Models\AboutSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CMSBerandaController extends Controller
{
    public function index()
    {
        $about = AboutSection::first(); // Mengambil baris pertama dari tabel
        $keunggulan = KeunggulanSection::first(); // Mengambil baris pertama dari tabel
        $testimoni = Testimoni::all();
        return view('admin-page.CMS.beranda.settings', compact('testimoni', 'about', 'keunggulan'));
    }

    public function dataTestimoni()
    {
        $testimoni = Testimoni::all();
        return view('admin-page.CMS.beranda.data-testimoni', compact('testimoni'));
    }

    public function destroyTestimoni($id)
    {
        $testimoni = Testimoni::find($id);

        if (!$testimoni) {
            return redirect()->back()->with('error', 'Testimoni tidak ditemukan!');
        }

        $testimoni->delete();

        return back()->with('success', 'Data Testimoni Berhasil Dihapus');
    }

    public function storeTestimoni(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'message' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('testimoni_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        Testimoni::create($validatedData);

        return redirect()->back()->with('success', 'Testimoni berhasil disimpan!');
    }

    public function storeAbout(Request $request)
    {



        $validatedData = $request->validate([
            'outline_title' => 'required|string',
            'solid_title' => 'required|string',
            'detail_information' => 'required|string',
            'button_label' => 'required|string',
            'button_link' => 'required|url',
            'large_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('large_image')) {
            $largeImagePath = $request->file('large_image')->store('about_images', 'public');
            $validatedData['large_image'] = $largeImagePath;
        }

        AboutSection::create($validatedData);

        return redirect()->back()->with('success', 'About Section saved successfully!');
    }
    public function updateAbout(Request $request, $id)
    {
        // Cari data berdasarkan ID
        $about = AboutSection::findOrFail($id);
    
        // Validasi input
        $validated = $request->validate([
            'outline_title' => 'required|string|max:255',
            'solid_title' => 'required|string|max:255',
            'detail_information' => 'required|string',
            'button_label' => 'nullable|string|max:255',
            'button_link' => 'nullable|url',
            'large_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
    
        // Update data teks
        $about->update([
            'outline_title' => $request->outline_title,
            'solid_title' => $request->solid_title,
            'detail_information' => $request->detail_information,
            'button_label' => $request->button_label,
            'button_link' => $request->button_link,
        ]);
    
        // Handle image upload jika ada
        if ($request->hasFile('large_image')) {
            // Hapus gambar lama jika ada
            if ($about->large_image && file_exists(public_path('storage/images/' . $about->large_image))) {
                unlink(public_path('storage/images/' . $about->large_image));
            }
    
            // Pindahkan gambar baru ke storage
            $request->file('large_image')->move('storage/images/', $request->file('large_image')->getClientOriginalName());
            
            // Update path gambar di database
            $about->large_image = 'images/' . $request->file('large_image')->getClientOriginalName();
            $about->save();
        }
    
        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'About Section updated successfully!');
    }

    public function updateKeunggulan(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $keunggulan = KeunggulanSection::findOrFail($id);
        $keunggulan->update($request->all());

        return redirect()->back()->with('success', 'Keunggulan berhasil diperbarui!');
    }




    public function store(Request $request)
    {
        $validatedData = $request->all();

        try {
            // About Section
            if ($request->filled(['title', 'detail_information'])) {
                // Handle file upload jika ada gambar baru
                if ($request->hasFile('large_image')) {
                    // Simpan file di folder 'storage/gambars/' dengan nama asli
                    $largeImageName = $request->file('large_image')->getClientOriginalName();
                    $request->file('large_image')->move('storage/gambars/', $largeImageName);

                    // Set path gambar ke dalam data yang akan disimpan
                    $validatedData['large_image'] = 'storage/gambars/' . $largeImageName;
                }

                // Simpan atau update About Section
                AboutSection::create([
                    'title' => $request->title,
                    'detail_information' => $request->detail_information ?? null,
                    'button_label' => $request->button_label ?? null,
                    'button_link' => $request->button_link ?? null,
                    'large_image' => $validatedData['large_image'] ?? null,
                ]);
            }

            // Keunggulan Section
            if ($request->filled('keunggulan_title')) {
                KeunggulanSection::create([
                    'title' => $request->keunggulan_title,
                    'description' => $request->keunggulan_description ?? null,
                ]);
            }

            // Lamaran Section
            if ($request->filled('lamaran_title')) {
                LamaranSection::create([
                    'title' => $request->lamaran_title,
                    'description' => $request->lamaran_description ?? null,
                ]);
            }

            // Testimoni Section
            if ($request->filled(['testimoni_name', 'testimoni_rating'])) {
                Testimoni::create([
                    'name' => $request->testimoni_name,
                    'jabatan' => $request->testimoni_jabatan ?? null,
                    'rating' => $request->testimoni_rating,
                    'message' => $request->testimoni_message ?? null,
                ]);
            }

            return redirect()->back()->with('success', 'Semua data berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
