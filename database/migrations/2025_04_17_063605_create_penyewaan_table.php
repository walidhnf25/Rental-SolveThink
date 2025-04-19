<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyewaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyewaan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penyewa')->nullable();
            $table->string('no_penyewa')->nullable();
            $table->string('alamat_penyewa')->nullable();
            $table->text('penyewaan')->nullable();
            $table->integer('total_harga')->nullable();
            $table->date('tanggal_penyewaan')->nullable();
            $table->string('bukti_pembayaran_penyewa')->nullable();
            $table->string('bukti_identitas_penyewa')->nullable();
            $table->string('pengambilan_barang_penyewa')->nullable();
            $table->string('status_penyewaan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penyewaan');
    }
}
