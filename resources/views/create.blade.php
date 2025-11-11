@extends('layout')

@section('content')
    <div class="container mt-4">
        <h2>Tambah Data Laboratorium</h2>

        {{-- Menampilkan pesan error validasi (jika ada) --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form untuk menambahkan data lab --}}
        <form action="{{ route('lab.store') }}" method="POST">
            @csrf {{-- Token keamanan wajib di Laravel --}}

            <div class="mb-3">
                <label for="nama_lab" class="form-label">Nama Laboratorium</label>
                <input type="text" class="form-control" id="nama_lab" name="nama_lab" placeholder="Masukkan nama lab" required>
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Tambahkan keterangan (opsional)"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('lab.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
