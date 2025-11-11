@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Tambah Data Barang</h2>
    <form action="{{ route('barang.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" id="nama_barang" required>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" id="jumlah" required>
        </div>

        <div class="mb-3">
            <label for="kondisi" class="form-label">Kondisi</label>
            <input type="text" name="kondisi" class="form-control" id="kondisi" required>
        </div>

        <div class="mb-3">
            <label for="lab_id" class="form-label">Lab</label>
            <select name="lab_id" id="lab_id" class="form-select" required>
                <option value="">-- Pilih Lab --</option>
                @foreach($lab as $lab)
                    <option value="{{ $lab->id }}">{{ $lab->nama_lab }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
