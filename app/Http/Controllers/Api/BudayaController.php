<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Budaya;


class BudayaController extends Controller
{
    // Method untuk mengambil semua data budaya
    public function index()
    {
        $budayas = Budaya::all();

        if ($budayas->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Data budaya tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $budayas
        ], 200);
    }

    public function createCulture(Request $request)
    {
        // Validasi input
        $validator = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'emailpenulis' => 'nullable|string|email|max:255',
            'namapenulis' => 'required|string|max:255',
            'nohp' => 'nullable|string|max:15',
        ]);

        $gambar = $request->file('gambar');
        $gambar->storeAs('public/images', $gambar->hashName());

        $culture = new Budaya();
        $culture->judul = $validator['judul'];
        $culture->kategori = $validator['kategori'];
        $culture->deskripsi = $validator['deskripsi'];
        $culture->statusPublish = 0;
        $culture->gambar = url('storage/images/' . $gambar->hashName());
        $culture->emailpenulis = $validator['emailpenulis'];
        $culture->namapenulis = $validator['namapenulis'];
        $culture->nohp = $validator['nohp'];
        $culture->save();

        // Kembalikan respons sukses
        return response()->json([
            'message' => 'Culture created successfully',

        ], 201);
    }

    // Fungsi untuk menghapus data budaya berdasarkan ID
    public function destroy($id)
    {
        $budaya = Budaya::find($id);

        if (!$budaya) {
            return response()->json(['success' => false, 'message' => 'Budaya tidak ditemukan'], 404);
        }

        $budaya->delete();

        return response()->json(['success' => true, 'message' => 'Budaya berhasil dihapus']);
    }

    // Fungsi untuk mengupdate statusPublish menjadi 1
    public function updateStatusPublish($id)
    {
        $budaya = Budaya::find($id);

        if (!$budaya) {
            return response()->json(['success' => false, 'message' => 'Budaya tidak ditemukan'], 404);
        }

        $budaya->statusPublish = 1;
        $budaya->save();

        return response()->json(['success' => true, 'message' => 'Status publish berhasil diperbarui']);
    }
}
