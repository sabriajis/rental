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
        $validated = $request->validate([
            'mobil_id' => 'required|exists:mobils,id',
            'durasi' => 'required|integer|min:1',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:15',
            'alamat' => 'nullable|string|max:255',
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
        $sewa->nama = $validated['nama'];
        $sewa->email = $validated['email'];
        $sewa->phone = $validated['phone'];
        $sewa->alamat = $validated['alamat'];
        $sewa->status = 'Menunggu Pembayaran'; // Set status awal
        $sewa->total = $validated['durasi'] * $mobil->harga; // Hitung total harga sewa

        // Simpan data sewa
        $sewa->save();

        // Update status mobil menjadi "Tidak Tersedia"
        $mobil->update(['tersedia' => '0']);

        // Redirect langsung ke halaman pembayaran
        return redirect()->route('pembayaran.index', ['sewa' => $sewa->id])
            ->with('success', 'Sewa berhasil dibuat. Silakan lanjutkan pembayaran!');
    }

    /**
     * Menampilkan detail sewa (opsional)
     */
    public function show(Sewa $sewa)
    {
        // Periksa apakah user yang sedang login adalah pemilik sewa
        if ($sewa->user_id != Auth::id()) {
            return abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        return view('sewa.show', compact('sewa'));
    }

    /**
     * Menampilkan daftar semua sewa milik user yang sedang login
     */
    public function index()
    {
        $sewas = Sewa::where('user_id', Auth::id())->get();
        return view('sewa.index', compact('sewas'));
    }
}
