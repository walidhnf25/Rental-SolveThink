<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
}
