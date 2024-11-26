<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Mobil;
use Illuminate\Http\Request;

class RentalMobilController extends Controller
{

   // Menampilkan daftar mobil yang tersedia
   public function index()
   {
       // Ambil mobil yang statusnya tersedia
       $mobils = Mobil::where('tersedia', true)->get();
       return view('rental.index', compact('mobils'));  // Mengirimkan data mobil ke view
   }

   // Menampilkan form untuk menambah mobil baru (admin hanya)
   public function create()
   {
       return view('rental.create');
   }

   // Menyimpan mobil baru ke database (admin hanya)
   public function store(Request $request)
   {
       // Validasi input
       $validated = $request->validate([
           'nama' => 'required|string|max:255',
           'tipe' => 'required|string|max:255',
           'harga' => 'required|numeric|min:1', // Harga harus lebih dari 0
           'tersedia' => 'required|boolean',
           'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk file gambar
       ]);

       // Menangani file gambar jika ada
       $imagePath = null;
       if ($request->hasFile('image')) {
           // Upload gambar ke storage dan simpan pathnya di folder public
           $imagePath = $request->file('image')->store('mobil_images', 'public');
       }

       // Membuat mobil baru
       Mobil::create([
           'nama' => $validated['nama'],
           'tipe' => $validated['tipe'],
           'harga' => $validated['harga'],
           'tersedia' => $validated['tersedia'],
           'image' => $imagePath,  // Simpan path gambar ke database
       ]);

       // Kembali ke daftar rental setelah sukses
       return redirect()->route('rental.index')->with('success', 'Mobil baru berhasil ditambahkan!');
   }

   // Menampilkan form untuk mengedit mobil berdasarkan ID (admin hanya)
   public function edit($id)
   {
       // Temukan mobil berdasarkan ID
       $mobil = Mobil::findOrFail($id);
       return view('rental.edit', compact('mobil'));
   }

   // Mengupdate data mobil (admin hanya)
   public function update(Request $request, $id)
   {
       // Validasi input
       $validated = $request->validate([
           'nama' => 'required|string|max:255',
           'tipe' => 'required|string|max:255',
           'harga' => 'required|numeric|min:1', // Harga harus lebih dari 0
           'tersedia' => 'required|boolean',
           'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk file gambar
       ]);

       // Temukan mobil berdasarkan ID
       $mobil = Mobil::findOrFail($id);

       // Menangani file gambar jika ada
       if ($request->hasFile('image')) {
           // Jika mobil sudah memiliki gambar, hapus gambar lama
           if ($mobil->image) {
               Storage::disk('public')->delete($mobil->image); // Hapus gambar lama
           }

           // Upload gambar baru ke storage dan simpan pathnya di folder public
           $imagePath = $request->file('image')->store('mobil_images', 'public');
       } else {
           $imagePath = $mobil->image;  // Jika tidak ada gambar baru, gunakan gambar lama
       }

       // Update data mobil
       $mobil->update([
           'nama' => $validated['nama'],
           'tipe' => $validated['tipe'],
           'harga' => $validated['harga'],
           'tersedia' => $validated['tersedia'],
           'image' => $imagePath,  // Simpan path gambar ke database
       ]);

       // Kembali ke daftar rental setelah sukses
       return redirect()->route('rental.index')->with('success', 'Mobil berhasil diperbarui!');
   }

   // Menghapus mobil berdasarkan ID (admin hanya)
   public function destroy($id)
   {
       // Temukan mobil berdasarkan ID
       $mobil = Mobil::findOrFail($id);

       // Periksa apakah mobil sedang digunakan
       if ($mobil->tersedia == false) {
           return redirect()->route('rental.index')->with('error', 'Mobil ini sedang dipesan dan tidak bisa dihapus.');
       }

       // Hapus gambar mobil jika ada
       if ($mobil->image) {
           Storage::disk('public')->delete($mobil->image);  // Hapus gambar dari storage
       }

       // Menghapus mobil
       $mobil->delete();

       // Kembali ke daftar rental setelah mobil dihapus
       return redirect()->route('rental.index')->with('success', 'Mobil berhasil dihapus!');
   }
}
