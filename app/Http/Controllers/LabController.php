<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LabController extends Controller
{
    /**
     * Menampilkan daftar semua lab.
     */
    public function index()
    {
        $lab = Lab::all();
        return view('lab.index', compact('lab'));
    }

    /**
     * Menampilkan form tambah lab.
     */
    public function create()
    {
        return view('lab.create');
    }

    /**
     * Simpan lab baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lab' => 'required|string|max:100',
            'penanggung_jawab' => [
                'nullable',
                'string',
                'max:100',
                Rule::unique('lab')->where(function ($query) use ($request) {
                    return $query->where('nama_lab', $request->nama_lab);
                }),
            ],
            'foto_penanggung_jawab' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto_penanggung_jawab')) {
            $data['foto_penanggung_jawab'] = $request->file('foto_penanggung_jawab')->store('lab-foto', 'public');
        }

        Lab::create($data);

        return redirect()->route('lab.index')->with('success', 'Data lab berhasil ditambahkan.');
    }

    /**
     * Halaman detail lab — penanggung jawab + daftar barang.
     */
    public function show($id)
    {
        $lab = Lab::with('barang')->findOrFail($id);
        return view('lab.show', compact('lab'));
    }

    /**
     * Form edit lab.
     */
    public function edit($id)
    {
        $lab = Lab::findOrFail($id);
        return view('lab.edit', compact('lab'));
    }

    /**
     * Update lab.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lab' => 'required|string|max:100',
            'penanggung_jawab' => [
                'nullable',
                'string',
                'max:100',
                Rule::unique('lab')->ignore($id)->where(function ($query) use ($request) {
                    return $query->where('nama_lab', $request->nama_lab);
                }),
            ],
            'foto_penanggung_jawab' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $lab = Lab::findOrFail($id);

        $data = $request->only(['nama_lab', 'penanggung_jawab']);

        if ($request->hasFile('foto_penanggung_jawab')) {
            $data['foto_penanggung_jawab'] = $request->file('foto_penanggung_jawab')->store('lab-foto', 'public');
        }

        $lab->update($data);

        return redirect()->route('lab.index')->with('success', 'Data lab berhasil diperbarui.');
    }

    /**
     * Hapus lab.
     */
    public function destroy($id)
    {
        $lab = Lab::findOrFail($id);
        $lab->delete();

        return redirect()->route('lab.index')->with('success', 'Data lab berhasil dihapus.');
    }
}
