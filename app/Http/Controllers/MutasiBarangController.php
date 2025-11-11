<?php

namespace App\Http\Controllers;

use App\Models\MutasiBarang; // Model untuk tabel mutasi_barang
use App\Models\Barang;       // Model untuk tabel barang
use App\Models\Lab;          // Model untuk tabel lab
use Illuminate\Http\Request; // Untuk menangani input form

class MutasiBarangController extends Controller
{
    /**
     * Menampilkan daftar mutasi barang.
     * Route: GET /mutasi_barang
     */
    public function index()
    {
        // Mengambil semua data mutasi barang
        $mutasi_barang = MutasiBarang::with(['barang', 'labAsal', 'labTujuan'])->get();

        // Mengirim data ke view index_mutasi_barang.blade.php
        return view('index_mutasi_barang', compact('mutasi_barang'));
    }

    /**
     * Menampilkan form untuk menambahkan mutasi barang baru.
     * Route: GET /mutasi_barang/create
     */
    public function create()
    {
        // Mengambil semua data barang dan lab untuk dropdown
        $barang = Barang::all();
        $lab = Lab::all();

        // Mengirim ke view create_mutasi_barang.blade.php
        return view('create_mutasi_barang', compact('barang', 'lab'));
    }

    /**
     * Menyimpan data mutasi barang ke dalam database.
     * Route: POST /mutasi_barang
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'barang_id' => 'required|exists:barang,id',
            'lab_asal_id' => 'required|exists:lab,id|different:lab_tujuan_id',
            'lab_tujuan_id' => 'required|exists:lab,id|different:lab_asal_id',
            'jumlah' => 'required|integer|min:1',
        ]);

        // Simpan data mutasi
        MutasiBarang::create([
            'barang_id' => $request->barang_id,
            'lab_asal_id' => $request->lab_asal_id,
            'lab_tujuan_id' => $request->lab_tujuan_id,
            'jumlah' => $request->jumlah,
        ]);

        // Kembali ke daftar mutasi barang
        return redirect()->route('mutasi_barang.index')->with('success', 'Data mutasi barang berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail satu mutasi barang (opsional).
     * Route: GET /mutasi_barang/{id}
     */
    public function show($id)
    {
        $mutasi_barang = MutasiBarang::with(['barang', 'labAsal', 'labTujuan'])->findOrFail($id);
        return view('show_mutasi_barang', compact('mutasi_barang'));
    }

    /**
     * Menampilkan form edit mutasi barang.
     * Route: GET /mutasi_barang/{id}/edit
     */
    public function edit($id)
    {
        $mutasi_barang = MutasiBarang::findOrFail($id);
        $barang = Barang::all();
        $lab = Lab::all();

        return view('edit_mutasi_barang', compact('mutasi_barang', 'barang', 'lab'));
    }

    /**
     * Memperbarui data mutasi barang.
     * Route: PUT/PATCH /mutasi_barang/{id}
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'barang_id' => 'required|exists:barang,id',
            'lab_asal_id' => 'required|exists:lab,id|different:lab_tujuan_id',
            'lab_tujuan_id' => 'required|exists:lab,id|different:lab_asal_id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $mutasi_barang = MutasiBarang::findOrFail($id);
        $mutasi_barang->update($request->all());

        return redirect()->route('mutasi_barang.index')->with('success', 'Data mutasi barang berhasil diperbarui.');
    }

    /**
     * Menghapus data mutasi barang.
     * Route: DELETE /mutasi_barang/{id}
     */
    public function destroy($id)
    {
        $mutasi_barang = MutasiBarang::findOrFail($id);
        $mutasi_barang->delete();

        return redirect()->route('mutasi_barang.index')->with('success', 'Data mutasi barang berhasil dihapus.');
    }
}
