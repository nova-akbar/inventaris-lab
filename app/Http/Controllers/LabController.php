<?php

namespace App\Http\Controllers;

use App\Models\Lab;          // Import model Lab agar bisa digunakan di controller ini
use Illuminate\Http\Request; // Digunakan untuk menangani data yang dikirim dari form (input pengguna)

class LabController extends Controller
{
    /**
     * Menampilkan seluruh data laboratorium.
     * Method ini akan dipanggil saat pengguna membuka halaman daftar lab (route: GET /lab).
    */
    public function index()
    {
        // Mengambil semua data dari tabel 'lab' menggunakan model Lab
        $lab = Lab::all();

        // Mengirim data ke view 'index' agar bisa ditampilkan di halaman
        return view('index', compact('lab'));
    }

    /**
     * Menampilkan form untuk menambahkan laboratorium baru.
     * Method ini akan dipanggil saat pengguna membuka halaman tambah lab (route: GET /lab/create).
    */
    public function create()
    {
        // Hanya menampilkan form tambah LAB
        return view('create');
    }

    /**
     * Menyimpan data laboratorium baru ke dalam database.
     * Method ini akan dipanggil saat pengguna menekan tombol "Simpan" pada form tambah data (route: POST /lab).
    */
    public function store(Request $request)
    {
        // Validasi agar data yang dikirim sesuai aturan
        $request->validate([
            'nama_lab' => 'required|string|max:100', // nama_lab wajib diisi, berupa teks, maksimal 100 karakter
            'keterangan' => 'nullable|string',       // keterangan boleh kosong, tapi jika diisi harus berupa teks
        ]);

        // Menyimpan data ke tabel 'lab' berdasarkan data yang dikirim dari form
        Lab::create($request->all());

        // Setelah data berhasil disimpan, arahkan kembali ke halaman daftar lab dengan pesan sukses
        return redirect()->route('lab.index')->with('success', 'Data lab berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail dari satu laboratorium.
     * Method ini opsional, digunakan jika ingin melihat detail satu data lab tertentu (route: GET /lab/{id}).
     */
    public function show(string $id)
    {
        // Mencari data lab berdasarkan ID. Jika tidak ditemukan, akan memunculkan error 404.
        $lab = Lab::findOrFail($id);

        // Mengirim data tersebut ke view 'show.blade.php' untuk ditampilkan.
        return view('show', compact('lab'));
    }

    /**
     * Menampilkan form edit untuk mengubah data laboratorium yang sudah ada.
     * Method ini dipanggil saat pengguna menekan tombol "Edit" pada tabel (route: GET /lab/{id}/edit).
     */
    public function edit(string $id)
    {
        // Mencari data lab berdasarkan ID. Jika tidak ditemukan, akan memunculkan error 404.
        $lab = Lab::findOrFail($id);

        // Mengirim data lab yang ditemukan ke view 'edit.blade.php' untuk diedit.
        return view('edit', compact('lab'));
    }

    /**
     * Menyimpan perubahan data laboratorium ke dalam database.
     * Method ini dipanggil saat pengguna menekan tombol "Simpan Perubahan" (route: PUT/PATCH /lab/{id}).
     */
    public function update(Request $request, string $id)
    {
        // Validasi data baru yang dikirim dari form edit
        $request->validate([
            'nama_lab' => 'required|string|max:100',
            'keterangan' => 'nullable|string',
        ]);

        // Mengupdate data lab berdasarkan input terbaru
        $lab = Lab::findOrFail($id);

        // Perbarui seluruh kolom sesuai data baru dari pengguna.
        $lab->update($request->all());

        // Setelah diperbarui, kembali ke halaman daftar lab dengan pesan sukses
        return redirect()->route('lab.index')->with('success', 'Data lab berhasil diperbarui.');
    }

    /**
     * Menghapus data laboratorium dari database.
     * Method ini dipanggil saat pengguna menekan tombol "Hapus" (route: DELETE /lab/{id}).
     */
    public function destroy(string $id)
    {
        // Menghapus data lab berdasarkan ID, jika tidak ada ada maka error
        $lab = Lab::findOrFail($id);

        // Hapus data lab tersebut dari database.
        $lab->delete();

        // Setelah berhasil dihapus, arahkan ke halaman daftar lab dengan pesan sukses
        return redirect()->route('lab.index')->with('success', 'Data lab berhasil dihapus.');
    }
}
