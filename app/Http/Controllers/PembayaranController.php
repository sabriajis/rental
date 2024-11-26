<?php

namespace App\Http\Controllers;

use App\Models\Sewa;
use Illuminate\Http\Request;
use Midtrans\Notification;
use Illuminate\Support\Str;

class PembayaranController extends Controller
{
    // Menampilkan halaman konfirmasi pembayaran
    public function index(Sewa $sewa)
    {
        return view('pembayaran.index', compact('sewa'));
    }

    // Proses pembayaran melalui Midtrans
    public function process(Request $request)
    {
        // Mengambil data sewa berdasarkan ID yang dikirimkan
        $sewa = Sewa::find($request->sewa_id);

        if (!$sewa) {
            return redirect()->back()->withErrors('Data sewa tidak ditemukan.');
        }

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;  // Development/Sandbox Environment
        \Midtrans\Config::$isSanitized = true;  // Set sanitization on
        \Midtrans\Config::$is3ds = true;  // Enable 3DS for credit card transactions

        // Generate a unique order_id using a combination of sewa ID, timestamp, and a random string
        $order_id = 'order_' . $sewa->id . '_' . now()->timestamp . '_' . Str::random(8); // More readable and unique

        $params = [
            'transaction_details' => [
                'order_id' => $order_id, // Use the unique order_id
                'gross_amount' => $sewa->total,
            ],
            'customer_details' => [
                'name' => $request->nama,
                'phone' => $request->phone,
            ],
        ];

        try {
            // Get Snap Token from Midtrans
            $snapToken = \Midtrans\Snap::getSnapToken($params);
        } catch (\Exception $e) {
            // Handle Midtrans exception (e.g., invalid request)
            return redirect()->back()->withErrors('Terjadi kesalahan pada pembayaran: ' . $e->getMessage());
        }

        return view('pembayaran.process', compact('snapToken', 'sewa'));
    }



    // Menangani callback dari Midtrans
    public function notification(Sewa $sewa)
    {
        // Perbarui status sewa
        $sewa->status = 'Berhasil Melakukan Pembayaran';
        $sewa->save();

        // Kirimkan data sewa yang sudah diperbarui ke view
        return view('pembayaran.bukti', compact('sewa'));
    }


}
