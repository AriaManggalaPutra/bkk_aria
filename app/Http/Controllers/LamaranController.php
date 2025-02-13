<?php

namespace App\Http\Controllers;

use App\Models\lamaran;
use App\Models\Lowongan;
use App\Models\User;
use App\Models\Perusahaan;;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LamaranExport;


class LamaranController extends Controller
{
    /**
     * Display a listing of the resource.
      */
    public function index()
    {
        // Ambil ID pengguna yang sedang login
        $userId = Auth::user()->id;
        
        // Ambil lamaran yang sesuai dengan ID user yang sedang login
        // Tambahkan 'with' untuk memuat relasi lowongan
        $lamarans = Lamaran::with('lowongan')->where('id_user', $userId)->get();
        
        // Tampilkan ke view
        return view('user-page.lamaran.lamaran', compact('lamarans'));
    }

    public function dataLamaran()
    {
        $lowongans = Lowongan::with('perusahaan')->get();
        return view('admin-page.lamaran.PekerjaanLamaran', compact('lowongans'));
    }

    public function detailLamaran($id)
    {
        $lowongan = Lowongan::with('perusahaan')->findOrFail($id);
        $lamaran = Lamaran::where('id_lowongan', $id)->with('user')->get();
        return view('admin-page.lamaran.DaftarLamaran', compact('lowongan', 'lamaran'));
    }
    
    public function SendEmail(Request $request , $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'status' => 'required',
            'pesanEmail' => 'required',
            'perusahaan' => 'required',
        ]);

        $mail = new PHPMailer(true);
    
        try {
            // Konfigurasi SMTP
            $mail->SMTPDebug = 0; // Nonaktifkan debugging untuk produksi
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'louismarchal237@gmail.com'; 
            $mail->Password = 'ajqz sjyh dwkt dbuu';     
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
    
            // Ambil data Lamaran berdasarkan $id
            $lamaran = Lamaran::find($id);
    
            if (!$lamaran) {
                return redirect()->back()->withErrors(['error' => 'Lamaran not found.']);
            }
    
            $pelamarEmail = $lamaran->email; // Pastikan field email ada di tabel Lamaran
            $pelamarNama = $lamaran->nama;   // Pastikan field nama ada di tabel Lamaran
            $perusahaan = $validated['perusahaan'];
            $pesanEmail = $validated['pesanEmail'];
            $status = $validated['status'];
            

            // Pengaturan penerima dan pengirim
            $mail->setFrom('louismarchal237@gmail.com', 'Louis Marchall Joheart Cardoso');
            $mail->addAddress($pelamarEmail, $pelamarNama);
    
            // Konten Email
            $mail->isHTML(true);
            $mail->Subject = 'Informasi Lamaran Anda';
            $mail->Body = View::make('emails.lamaran', [
                'nama' => $pelamarNama,
                'email' => $pelamarEmail,
                'lamaranId' => $lamaran->id,
                'perusahaan' => $perusahaan,
                'status' => $status,
                'pesanEmail' => $pesanEmail,
            ])->render();
    
            // Kirim email
            $mail->send();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Email failed to send: ' . $e->getMessage()]);
        }
    
        return redirect()->back()->with('success', 'Email has been sent successfully.');
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
        // Validasi input
        $validasi = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'cv' => 'required|file|mimes:pdf,doc,docx', // Batas ukuran file 2MB
            'id_lowongan' => 'required|exists:lowongans,id', // Pastikan id_lowongan valid
        ]);
    
        // Simpan informasi lamaran pekerjaan
        $lamaran = new Lamaran();
        $lamaran->id_user = Auth::id(); // Gunakan Auth::id() untuk id user yang sedang login
        $lamaran->id_lowongan = $request->id_lowongan;
        $lamaran->nama = $request->nama;
        $lamaran->email = $request->email;
    
        // Tetapkan status secara default
        $lamaran->status = 'Lamaran Diterima'; // Status default ke Pending
    
        // Simpan file CV
        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/cv'), $filename);
            $lamaran->cv = $filename;
        }
    
        // Simpan data lamaran ke database
        $lamaran->save();
    
        // Konfigurasi dan kirim email
        $mail = new PHPMailer(true);
    
        try {
            // Konfigurasi SMTP
            $mail->SMTPDebug = 0; // Nonaktifkan debugging untuk produksi
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'louismarchal237@gmail.com'; 
            $mail->Password = 'ajqz sjyh dwkt dbuu';     
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
    
            $lowongan = Lowongan::find($lamaran->id_lowongan);

            if ($lowongan && $lowongan->perusahaan) {
                $perusahaan = $lowongan->perusahaan->nama_perusahaan; // Pastikan nama kolom sesuai dengan tabel perusahaan
            } else {
                $perusahaan = 'Perusahaan tidak ditemukan';
            }

            // Pengaturan penerima dan pengirim
            $mail->setFrom('louismarchal237@gmail.com', 'Louis Marchall Joheart Cardoso');
            $mail->addAddress($lamaran->email, $lamaran->nama);
    
            // Konten Email
            $mail->isHTML(true);
            $mail->Subject = 'Informasi Lamaran Anda';
            $mail->Body = View::make('emails.lamaran', [
                'nama' => $lamaran->nama,
                'email' => $lamaran->email,
                'lamaranId' => $lamaran->id,
                'perusahaan' => $perusahaan, // Sesuaikan nama perusahaan
                'status' => $lamaran->status,
                'pesanEmail' => 'Lamaran Anda sedang diproses. Mohon tunggu informasi selanjutnya.',
            ])->render();
    
            // Kirim email
            $mail->send();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Email gagal dikirim: ' . $e->getMessage()]);
        }
    
        return back()->with('success', 'Lamaran berhasil dikirim. Mohon cek email Anda.');
    }

    public function export($LowonganId)
    {
        return Excel::download(new LamaranExport($LowonganId), 'lamaran.xlsx');
    }
}
