<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AsetBarangBekas extends Model
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $table = 'aset_barang_bekas';
    protected $fillable = [
        'id_nama_barang',
        'id_gambar_barang',
        'harga_jual_barang',
        'jenis_barang',
    ];

    public function namaBarang()
    {
        return $this->belongsTo(NamaBarang::class, 'id_nama_barang', 'id');
    }
}
