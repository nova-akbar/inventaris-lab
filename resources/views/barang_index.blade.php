@extends('layout')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Daftar Barang</h2>

        {{-- Tombol untuk menuju halaman tambah barang --}}
        <a href="{{ route('barang.create') }}" class="btn btn-primary mb-3">+ Tambah Barang</a>

        {{-- Menampilkan pesan sukses jika ada --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tabel daftar barang --}}
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barang as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->jumlah }}</td>
                        {{-- Tambahkan kolom agar barang menampilkan nama lab yang terkait. --}}
                        <td>{{ $item->lab->nama_lab }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            {{-- Tombol untuk melihat detail --}}
                            <a href="{{ route('barang.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>

                            {{-- Tombol untuk mengedit --}}
                            <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            {{-- Tombol untuk menghapus --}}
                            <form action="{{ route('barang.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
