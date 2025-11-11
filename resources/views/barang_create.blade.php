@extends('layout')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Tambah Barang</h2>

        {{-- Tombol kembali ke daftar barang --}}
        <a href="{{ route('barang.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

        {{-- Menampilkan pesan error validasi jika ada --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form untuk menambah data barang --}}
        <form action="{{ route('barang.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang" class="form-control"
                    placeholder="Masukkan nama barang" required>
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control"
                    placeholder="Masukkan jumlah barang" required>
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control" rows="3"
                    placeholder="Masukkan keterangan (opsional)"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
