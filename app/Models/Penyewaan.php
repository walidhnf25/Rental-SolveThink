<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Penyewaan extends Model
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $table = 'penyewaan';
    protected $fillable = [
        'nama_penyewa',
        'no_penyewa',
        'alamat_penyewa',
        'penyewaan',
        'total_harga',
        'tanggal_penyewaan',
        'bukti_pembayaran_penyewa',
        'bukti_identitas_penyewa',
        'pengambilan_barang_penyewa',
        'status_penyewaan',
    ];
}
