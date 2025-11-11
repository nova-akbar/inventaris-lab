@extends('layout')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Edit Barang</h2>

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

        {{-- Form edit data barang --}}
        <form action="{{ route('barang.update', $barang->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang" class="form-control"
                    value="{{ old('nama_barang', $barang->nama_barang) }}" required>
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control"
                    value="{{ old('jumlah', $barang->jumlah) }}" required>
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control" rows="3">{{ old('keterangan', $barang->keterangan) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
