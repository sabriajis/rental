<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Sewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SewaController extends Controller
{
    /**
     * Menampilkan formulir sewa untuk mobil tertentu
     */
    public function create($mobil)
    {
        // Cek apakah mobil ada atau tidak
        $mobil = Mobil::findOrFail($mobil);

        // Periksa apakah mobil tersedia
        if ($mobil->tersedia != '1') {
            return redirect()->route('sewa.index')->with('error', 'Mobil ini tidak tersedia untuk disewa.');
        }

        return view('sewa.create', compact('mobil'));
    }

    /**
     * Menyimpan data sewa dan mengarahkan ke halaman pembayaran
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'mobil_id' => 'required|exists:mobils,id',  // Pastikan mobil_id ada di tabel mobils
            'durasi' => 'required|integer|min:1',       // Durasi sewa minimal 1
            'phone' => 'nullable|string|max:15',        // Nomor telepon opsional
            'alamat' => 'nullable|string|max:255',      // Alamat opsional
        ]);

        // Ambil mobil yang dipilih
        $mobil = Mobil::findOrFail($validated['mobil_id']);

        // Periksa apakah mobil tersedia
        if ($mobil->tersedia != '1') {
            return redirect()->route('sewa.index')->with('error', 'Mobil ini tidak tersedia untuk disewa.');
        }

        // Buat data sewa
        $sewa = new Sewa();
        $sewa->mobil_id = $mobil->id;
        $sewa->user_id = Auth::id(); // Ambil ID user yang sedang login
        $sewa->durasi = $validated['durasi'];
        $sewa->nama = Auth::user()->name;  // Nama diambil dari user yang sedang login
        $sewa->email = Auth::user()->email; // Email diambil dari user yang sedang login
        $sewa->phone = $validated['phone'];
        $sewa->alamat = $validated['alamat'];
        $sewa->status = 'Menunggu Pembayaran'; // Status awal sewa
        $sewa->total = $validated['durasi'] * $mobil->harga; // Total harga sewa

        // Simpan data sewa
        $sewa->save();

        // Update status mobil menjadi "Tidak Tersedia"
        $mobil->update(['tersedia' => '0']);

        // Redirect ke halaman detail sewa untuk pembayaran
        return redirect()->route('sewa.show', ['id' => $sewa->id])
            ->with('success', 'Sewa berhasil dibuat. Silakan lanjutkan pembayaran!');
    }

    /**
     * Menampilkan detail sewa (opsional)
     */
    public function show($id)
    {
        // Mengambil data sewa lengkap dengan relasi mobil
        $sewa = Sewa::with('mobil')->findOrFail($id);

        return view('pembayaran.index', compact('sewa'));
    }

    /**
     * Menampilkan daftar semua sewa milik user yang sedang login
     */
    public function index()
    {
        // Mengambil semua sewa yang dimiliki oleh user yang sedang login
        $sewas = Sewa::where('user_id', Auth::id())->get();

        return view('sewa.index', compact('sewas'));
    }
}
