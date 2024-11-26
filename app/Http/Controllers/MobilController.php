<?php
namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    // Fungsi untuk menampilkan daftar mobil yang tersedia
    public function index()
    {
        // Ambil data mobil yang statusnya "Tersedia"
        $mobils = Mobil::where('tersedia', '1')->get();

        // Kembalikan view dengan data mobil yang tersedia
        return view('sewa.index', compact('mobils'));
    }
}
