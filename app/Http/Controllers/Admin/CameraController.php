<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Camera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Penting untuk hapus file gambar

class CameraController extends Controller
{

    // 1. TAMPILKAN DAFTAR KAMERA
    public function index()
    {
        $cameras = Camera::all();
        return view('admin.cameras.index', compact('cameras'));
    }

    // 2. TAMPILKAN FORM TAMBAH
    public function create()
    {
        return view('admin.cameras.create');
    }

    // 3. PROSES SIMPAN DATA BARU
    public function store(Request $request)
    {
        // 1. HAPUS kode debug dd() yang tadi
        // (Jika tidak dihapus, program akan berhenti di sini terus)
        
        // 2. Gunakan Validasi yang lebih 'ramah' untuk gambar WhatsApp
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'quantity' => 'required|integer',
            'price_per_day' => 'required|numeric',
            // UBAH BARIS INI:
            // Hapus 'image', ganti jadi 'file'. Ini trik agar file compressed tetap lolos.
            'image' => 'required|file|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        // 3. Proses Upload
        $imagePath = $request->file('image')->store('cameras', 'public');

        // 4. Simpan ke Database
        Camera::create([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price_per_day' => $request->price_per_day,
            'image_path' => $imagePath
        ]);

        return redirect()->route('cameras.index')->with('success', 'Kamera berhasil ditambahkan!');
    }

    // 4. TAMPILKAN FORM EDIT
    public function edit(Camera $camera)
    {
        return view('admin.cameras.edit', compact('camera'));
    }

    // 5. PROSES UPDATE DATA
    public function update(Request $request, Camera $camera)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'quantity' => 'required|integer',
            'price_per_day' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048' // Image jadi nullable (opsional) saat edit
        ]);

        $data = $request->all();

        // Cek jika user upload gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama dari storage server biar hemat space
            if ($camera->image_path) {
                Storage::disk('public')->delete($camera->image_path);
            }
            // Simpan gambar baru
            $data['image_path'] = $request->file('image')->store('cameras', 'public');
        }

        $camera->update($data);

        return redirect()->route('cameras.index')->with('success', 'Data kamera diperbarui!');
    }

    // 6. HAPUS KAMERA
    public function destroy(Camera $camera)
    {
        // Hapus file fisiknya dulu
        if ($camera->image_path) {
            Storage::disk('public')->delete($camera->image_path);
        }
        
        // Baru hapus data di database
        $camera->delete();

        return redirect()->route('cameras.index')->with('success', 'Kamera dihapus.');
    }

}