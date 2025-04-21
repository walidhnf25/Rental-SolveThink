<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyewaan;
use App\Models\AsetBarangBekas;
use App\Models\NamaBarang;
use Illuminate\Support\Facades\DB;

class PenyewaanController extends Controller
{
    public function index()
    {
        // Ambil stok berdasarkan id_nama_barang
        $stokPerBarang = DB::table('aset_barang_bekas')->select('id_nama_barang', DB::raw('COUNT(*) as stok'))->groupBy('id_nama_barang')->pluck('stok', 'id_nama_barang');

        // Ambil barang Microcontroller dan Sensor dengan harga
        $barangMicrocontroller = AsetBarangBekas::select('id_nama_barang', 'harga_jual_barang', DB::raw('COUNT(*) as stok'))->with('namaBarang')->where('jenis_barang', 'Microcontroller')->groupBy('id_nama_barang', 'harga_jual_barang')->get();
        $barangSensor = AsetBarangBekas::select('id_nama_barang', 'harga_jual_barang', DB::raw('COUNT(*) as stok'))->with('namaBarang')->where('jenis_barang', 'Sensor')->groupBy('id_nama_barang', 'harga_jual_barang')->get();
        $barangActuator = AsetBarangBekas::select('id_nama_barang', 'harga_jual_barang', DB::raw('COUNT(*) as stok'))->with('namaBarang')->where('jenis_barang', 'Actuator')->groupBy('id_nama_barang', 'harga_jual_barang')->get();
        $barangPower = AsetBarangBekas::select('id_nama_barang', 'harga_jual_barang', DB::raw('COUNT(*) as stok'))->with('namaBarang')->where('jenis_barang', 'Power')->groupBy('id_nama_barang', 'harga_jual_barang')->get();
        $barangEquipment = AsetBarangBekas::select('id_nama_barang', 'harga_jual_barang', DB::raw('COUNT(*) as stok'))->with('namaBarang')->where('jenis_barang', 'Equipment')->groupBy('id_nama_barang', 'harga_jual_barang')->get();
        
        return view('index', compact('stokPerBarang', 'barangMicrocontroller', 'barangSensor', 'barangActuator', 'barangPower', 'barangEquipment'
        ));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama_penyewa' => 'required|string|max:255',
                'no_penyewa' => 'required|string|max:20',
                'alamat_penyewa' => 'required|string',
                'pengambilan_barang_penyewa' => 'required|string',
                'penyewaan' => 'required|string',
                'total_harga' => 'required|numeric',
                'bukti_pembayaran_penyewa' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
                'bukti_identitas_penyewa' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            ]);

            // Upload file jika ada
            if ($request->hasFile('bukti_pembayaran_penyewa')) {
                $validated['bukti_pembayaran_penyewa'] = $request->file('bukti_pembayaran_penyewa')
                    ->store('bukti_pembayaran', 'public');
            }

            // Upload file jika ada
            if ($request->hasFile('bukti_identitas_penyewa')) {
                $validated['bukti_identitas_penyewa'] = $request->file('bukti_identitas_penyewa')
                    ->store('bukti_identitas', 'public');
            }

            // Tambahkan tanggal penyewaan sekarang
            $validated['tanggal_penyewaan'] = now(); // atau \Carbon\Carbon::now()

            $validated['status_penyewaan'] = 'Belum Dibalikkan';

            // Simpan data penjualan
            $penyewaan  = Penyewaan::create($validated);

            // Kurangi stok barang
            $penyewaanList = explode(',', $validated['penyewaan']);
            foreach ($penyewaanList as $item) {
                [$namaBarang, $jumlah] = explode(':', trim($item));
                $jumlah = (int) trim($jumlah);

                $idNamaBarang = NamaBarang::where('nama_barang', $namaBarang)->value('id');

                if ($idNamaBarang) {
                    DB::table('aset_barang_bekas')
                        ->where('id_nama_barang', $idNamaBarang)
                        ->limit($jumlah)
                        ->delete();
                }
            }

            return redirect()->back()->with('success', 'Pesanan berhasil dikirim! Silakan konfirmasi melalui WhatsApp.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Tolong Cek Kembali Pesanan Anda.');
        }
    }
}
