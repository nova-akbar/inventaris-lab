@extends('layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Mutasi Barang</h2>

    {{-- Tampilkan pesan sukses jika ada --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tombol untuk menambah mutasi barang baru --}}
    <a href="{{ route('mutasi_barang.create') }}" class="btn btn-primary mb-3">Tambah Mutasi Barang</a>

    {{-- Tabel daftar mutasi barang --}}
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Lab Asal</th>
                <th>Lab Tujuan</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mutasi_barang as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->barang->nama_barang }}</td>
                    <td>{{ $item->labAsal->nama_lab }}</td>
                    <td>{{ $item->labTujuan->nama_lab }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
                    <td>
                        <a href="{{ route('mutasi_barang.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('mutasi_barang.destroy', $item->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada data mutasi barang</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
