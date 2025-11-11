@extends('layout')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Detail Barang</h2>

        {{-- Tombol kembali ke daftar barang --}}
        <a href="{{ route('barang.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

        {{-- Kartu berisi detail informasi barang --}}
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title mb-3">{{ $barang->nama_barang }}</h5>

                <p><strong>Jumlah:</strong> {{ $barang->jumlah }}</p>
                <p><strong>Keterangan:</strong> {{ $barang->keterangan ?? '-' }}</p>

                <div class="mt-4">
                    <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-warning">Edit</a>

                    <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
