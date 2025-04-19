<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class NamaBarang extends Model
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $table = 'nama_barang';
    protected $fillable = [
        'nama_barang',
        'gambar_barang',
    ];
}
