<?php

namespace App\Http\Controllers;

use App\Models\Barang;        // Import model Barang
use Illuminate\Http\Request;  // Untuk menangani input dari form
use App\Models\Lab;          // Import model Lab untuk relasi

class BarangController extends Controller
{
    /**
     * Menampilkan seluruh data barang.
     * Route: GET /barang
     */
    public function index()
    {
        // Mengambil semua data barang
        $barang = Barang::all();

        // Mengirim data ke view 'barang_index'
        return view('barang_index', compact('barang'));
    }

    /**
     * Menampilkan form untuk menambahkan barang baru.
     * Route: GET /barang/create
     */
    public function create()
    {
        $lab = Lab::all();
        return view('create_barang', compact('lab'));
    }

    /**
     * Menyimpan data barang baru ke dalam database.
     * Route: POST /barang
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required|string|max:100',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'nullable|string',
        ]);

        // Simpan data barang
        Barang::create($request->all());

        // Redirect ke halaman daftar barang dengan pesan sukses
        return redirect()->route('barang.index')->with('success', 'Data barang berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail satu barang.
     * Route: GET /barang/{id}
     */
    public function show(string $id)
    {
        // Mencari data barang berdasarkan ID
        $barang = Barang::findOrFail($id);

        // Tampilkan ke view detail
        return view('barang_show', compact('barang'));
    }

    /**
     * Menampilkan form untuk mengedit data barang.
     * Route: GET /barang/{id}/edit
     */
    public function edit(string $id)
    {
        // Mencari data barang yang akan diedit
        $barang = Barang::findOrFail($id);

        $lab = Lab::all();
        return view('barang_edit', compact('barang', 'lab'));
    }

    /**
     * Memperbarui data barang yang ada.
     * Route: PUT/PATCH /barang/{id}
     */
    public function update(Request $request, string $id)
    {
        // Validasi input baru
        $request->validate([
            'nama_barang' => 'required|string|max:100',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'nullable|string',
        ]);

        // Temukan dan update data barang
        $barang = Barang::findOrFail($id);
        $barang->update($request->all());

        // Redirect kembali dengan pesan sukses
        return redirect()->route('barang.index')->with('success', 'Data barang berhasil diperbarui.');
    }

    /**
     * Menghapus data barang dari database.
     * Route: DELETE /barang/{id}
     */
    public function destroy(string $id)
    {
        // Temukan dan hapus data barang
        $barang = Barang::findOrFail($id);
        $barang->delete();

        // Kembali ke daftar barang dengan pesan sukses
        return redirect()->route('barang.index')->with('success', 'Data barang berhasil dihapus.');
    }
}
