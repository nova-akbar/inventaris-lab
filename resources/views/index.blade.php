@extends('layout')

@section('content')

    {{-- Judul halaman --}}
    <h1>Data Lab</h1>

    {{-- Tombol untuk menuju halaman tambah data lab --}}
    <a href="{{ route('lab.create') }}">Tambah Lab</a>

    {{-- Membuat tabel untuk menampilkan data dari tabel "lab" --}}
    <table border="1">
        {{-- Header tabel --}}
        <thead>
            <tr>
                <th>ID</th> {{-- Kolom untuk menampilkan ID lab --}}
                <th>Nama Lab</th> {{-- Kolom untuk menampilkan nama laboratorium --}}
                <th>Lokasi</th> {{-- Kolom untuk menampilkan lokasi laboratorium --}}
                <th>Aksi</th> {{-- Kolom untuk menampilkan tombol Edit dan Hapus --}}
            </tr>
        </thead>

        {{-- Isi tabel yang diambil dari variabel $lab (berisi data dari database) --}}
        <tbody>
            {{-- Melakukan perulangan untuk setiap data lab --}}
            @foreach ($lab as $l)
                <tr>
                    {{-- Menampilkan ID dari setiap lab --}}
                    <td>{{ $l->id }}</td>

                    {{-- Menampilkan nama lab --}}
                    <td>{{ $l->nama_lab }}</td>

                    {{-- Menampilkan lokasi lab --}}
                    <td>{{ $l->lokasi }}</td>

                    {{-- Kolom aksi berisi tombol edit dan hapus --}}
                    <td>
                        {{-- Tombol Edit akan menuju ke route lab.edit dengan parameter ID lab --}}
                        <a href="{{ route('lab.edit', $l->id) }}">Edit</a>

                        {{-- Form untuk menghapus data lab --}}
                        <form action="{{ route('lab.destroy', $l->id) }}" method="POST" style="display:inline">
                            {{-- Token CSRF wajib untuk keamanan form di Laravel --}}
                            @csrf

                            {{-- Method DELETE digunakan untuk menghapus data --}}
                            @method('DELETE')

                            {{-- Tombol submit untuk hapus data --}}
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection