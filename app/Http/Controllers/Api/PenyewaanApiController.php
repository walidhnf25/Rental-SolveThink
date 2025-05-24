<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Penyewaan;

class PenyewaanApiController extends Controller
{
    public function index()
    {
        $data = Penyewaan::latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar Semua Penyewaan',
            'data' => $data
        ]);
    }

    public function show($id)
    {
        $penyewaan = Penyewaan::find($id);

        if (!$penyewaan) {
            return response()->json([
                'success' => false,
                'message' => 'Data penjualan tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail Penyewaan',
            'data' => $penyewaan
        ]);
    }

    public function update(Request $request, $id)
    {
        $penyewaan = Penyewaan::findOrFail($id);

        $validated = $request->validate([
            'nama_penyewa' => 'required',
            'no_penyewa' => 'required',
            'alamat_penyewa' => 'required',
            'pengambilan_barang_penyewa' => 'required',
            'penyewaan' => 'required',
            'total_harga' => 'required|numeric',
            'tanggal_penyewaan' => 'required|date',
            'bukti_pembayaran_penyewa' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'bukti_identitas_penyewa' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        if ($request->hasFile('bukti_pembayaran_penyewa')) {
            // Hapus file lama jika ada
            if ($penyewaan->bukti_pembayaran_penyewa && Storage::disk('public')->exists($penyewaan->bukti_pembayaran_penyewa)) {
                Storage::disk('public')->delete($penyewaan->bukti_pembayaran_penyewa);
            }

            // Simpan file baru
            $validated['bukti_pembayaran_penyewa'] = $request->file('bukti_pembayaran_penyewa')
                ->store('bukti_pembayaran', 'public');
        }

        if ($request->hasFile('bukti_identitas_penyewa')) {
            // Hapus file lama jika ada
            if ($penyewaan->bukti_identitas_penyewa && Storage::disk('public')->exists($penyewaan->bukti_identitas_penyewa)) {
                Storage::disk('public')->delete($penyewaan->bukti_identitas_penyewa);
            }

            // Simpan file baru
            $validated['bukti_identitas_penyewa'] = $request->file('bukti_identitas_penyewa')
                ->store('bukti_identitas', 'public');
        }

        $penyewaan->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data penyewaan berhasil diperbarui',
            'data' => $penyewaan
        ], 200);
    }
}
