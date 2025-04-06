<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenyewaanController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:20',
            // Add other form fields here
        ]);

        // Create a new record
        Penyewaan::create($validated);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
}
