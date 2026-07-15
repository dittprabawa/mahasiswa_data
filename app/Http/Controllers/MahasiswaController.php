<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // GET /api/mahasiswa - tampilkan semua data
    public function index()
    {
        $mahasiswa = Mahasiswa::all();

        return response()->json([
            'success' => true,
            'data' => $mahasiswa
        ], 200);
    }

    // POST /api/mahasiswa - tambah data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|string|max:20|unique:mahasiswas',
            'nama' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'angkatan' => 'required|digits:4',
            'email' => 'nullable|email',
        ]);

        $mahasiswa = Mahasiswa::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data mahasiswa berhasil ditambahkan',
            'data' => $mahasiswa
        ], 201);
    }

    // GET /api/mahasiswa/{id} - tampilkan 1 data beserta nilainya
    public function show(string $id)
    {
        $mahasiswa = Mahasiswa::with('nilais')->find($id);

        if (!$mahasiswa) {
            return response()->json([
                'success' => false,
                'message' => 'Data mahasiswa tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $mahasiswa
        ], 200);
    }

    // PUT/PATCH /api/mahasiswa/{id} - update data
    public function update(Request $request, string $id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return response()->json([
                'success' => false,
                'message' => 'Data mahasiswa tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'nim' => 'sometimes|required|string|max:20|unique:mahasiswas,nim,' . $id,
            'nama' => 'sometimes|required|string|max:255',
            'jurusan' => 'sometimes|required|string|max:255',
            'angkatan' => 'sometimes|required|digits:4',
            'email' => 'nullable|email',
        ]);

        $mahasiswa->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data mahasiswa berhasil diperbarui',
            'data' => $mahasiswa
        ], 200);
    }

    // DELETE /api/mahasiswa/{id} - hapus data
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return response()->json([
                'success' => false,
                'message' => 'Data mahasiswa tidak ditemukan'
            ], 404);
        }

        $mahasiswa->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data mahasiswa berhasil dihapus'
        ], 200);
    }

    // GET /mahasiswa - tampilkan halaman web (bukan API)
    public function tampilWeb()
    {
        $mahasiswa = Mahasiswa::with('nilais')->get();

        return view('mahasiswa.index', compact('mahasiswa'));
    }

    // GET /mahasiswa/create - form tambah data
    public function tambahForm()
    {
        return view('mahasiswa.create');
    }

    // POST /mahasiswa - simpan data baru dari form web
    public function simpanWeb(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|string|max:20|unique:mahasiswas',
            'nama' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'angkatan' => 'required|digits:4',
            'email' => 'nullable|email',
        ]);

        Mahasiswa::create($validated);

        return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil ditambahkan');
    }

    // GET /mahasiswa/{id} - detail 1 mahasiswa beserta nilainya
    public function detailWeb(string $id)
    {
        $mahasiswa = Mahasiswa::with('nilais')->findOrFail($id);

        return view('mahasiswa.show', compact('mahasiswa'));
    }

    // GET /mahasiswa/{id}/edit - form edit data
    public function editForm(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    // PUT /mahasiswa/{id} - update data dari form web
    public function updateWeb(Request $request, string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $validated = $request->validate([
            'nim' => 'required|string|max:20|unique:mahasiswas,nim,' . $id,
            'nama' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'angkatan' => 'required|digits:4',
            'email' => 'nullable|email',
        ]);

        $mahasiswa->update($validated);

        return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui');
    }

    // DELETE /mahasiswa/{id} - hapus data dari web
    public function hapusWeb(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil dihapus');
    }
}