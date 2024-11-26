<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'mobil_id', 'nama', 'email', 'phone', 'alamat', 'durasi', 'total', 'status' ,'snap_token',
    ];

    /**
     * Mendefinisikan relasi antara sewa dan mobil
     */
    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }

    /**
     * Menangani status pembayaran untuk transaksi sewa
     */
    public function updateStatus($status)
    {
        $this->status = $status;
        $this->save();
    }

    /**
     * Mendefinisikan mutator untuk total agar selalu dalam format yang benar
     */
    public function getTotalAttribute($value)
    {
        return number_format($value, 0, ',', '.');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
