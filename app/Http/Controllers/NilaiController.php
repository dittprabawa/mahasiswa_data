<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    // GET /api/nilai - tampilkan semua data
    public function index()
    {
        $nilai = Nilai::all();

        return response()->json([
            'success' => true,
            'data' => $nilai
        ], 200);
    }

    // POST /api/nilai - tambah data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'mata_kuliah' => 'required|string|max:255',
            'nilai' => 'required|integer|min:0|max:100',
        ]);

        $nilai = Nilai::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Nilai berhasil ditambahkan',
            'data' => $nilai
        ], 201);
    }

    // GET /api/nilai/{id} - tampilkan 1 data
    public function show(string $id)
    {
        $nilai = Nilai::find($id);

        if (!$nilai) {
            return response()->json([
                'success' => false,
                'message' => 'Data nilai tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $nilai
        ], 200);
    }

    // PUT/PATCH /api/nilai/{id} - update data
    public function update(Request $request, string $id)
    {
        $nilai = Nilai::find($id);

        if (!$nilai) {
            return response()->json([
                'success' => false,
                'message' => 'Data nilai tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'mahasiswa_id' => 'sometimes|required|exists:mahasiswas,id',
            'mata_kuliah' => 'sometimes|required|string|max:255',
            'nilai' => 'sometimes|required|integer|min:0|max:100',
        ]);

        $nilai->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Nilai berhasil diperbarui',
            'data' => $nilai
        ], 200);
    }

    // DELETE /api/nilai/{id} - hapus data
    public function destroy(string $id)
    {
        $nilai = Nilai::find($id);

        if (!$nilai) {
            return response()->json([
                'success' => false,
                'message' => 'Data nilai tidak ditemukan'
            ], 404);
        }

        $nilai->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data nilai berhasil dihapus'
        ], 200);
    }
    
    // GET /mahasiswa - tampilkan halaman web (bukan API)
    public function tampilWeb()
    {
        $mahasiswa = Mahasiswa::with('nilais')->get();

        return view('mahasiswa.index', compact('mahasiswa'));
    }
}