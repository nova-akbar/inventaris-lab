@extends('layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Form Mutasi Barang</h2>

    {{-- Menampilkan pesan error jika ada --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form mutasi barang --}}
    <form action="{{ route('mutasi_barang.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="barang_id" class="form-label">Nama Barang</label>
            <select name="barang_id" id="barang_id" class="form-select" required>
                <option value="">-- Pilih Barang --</option>
                @foreach($barang as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="lab_asal_id" class="form-label">Lab Asal</label>
            <select name="lab_asal_id" id="lab_asal_id" class="form-select" required>
                <option value="">-- Pilih Lab Asal --</option>
                @foreach($lab as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_lab }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="lab_tujuan_id" class="form-label">Lab Tujuan</label>
            <select name="lab_tujuan_id" id="lab_tujuan_id" class="form-select" required>
                <option value="">-- Pilih Lab Tujuan --</option>
                @foreach($lab as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_lab }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah Barang</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" min="1" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Mutasi</button>
        <a href="{{ route('mutasi_barang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
