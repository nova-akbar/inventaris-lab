@extends('layout')

@section('content')

<style>
    .form-container {
        background: white;
        padding: 28px;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        width: 75%;
        margin: auto;
    }

    .page-title {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    label {
        font-weight: 600;
        margin-bottom: 6px;
        display: block;
    }

    input, select {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        margin-bottom: 18px;
        transition: .25s;
    }

    input:focus, select:focus {
        border-color: #ff7b00;
        box-shadow: 0 0 6px rgba(255, 123, 0, 0.5);
    }

    .btn-submit {
        background: #ff7b00;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 6px;
        font-weight: bold;
        transition: .25s;
    }

    .btn-submit:hover {
        background: #e66d00;
        transform: translateY(-2px);
    }

    .btn-back {
        background: #dcdcdc;
        padding: 12px 20px;
        border-radius: 6px;
        text-decoration: none;
        color: black;
        font-weight: 600;
    }

    .btn-back:hover {
        background: #cfcfcf;
    }
</style>

<div class="container mt-4">

    <div class="form-container">

        <h2 class="page-title">Tambah Barang</h2>

        <form action="{{ route('barang.store') }}" method="POST">
            @csrf

            <label>Nama Barang</label>
            <input type="text" name="nama_barang" required>

            <label>Jumlah</label>
            <input type="number" name="jumlah" required>

            <label>Keterangan / Kondisi</label>
            <input type="text" name="keterangan">

            <label>Pilih Lab</label>
            <select name="lab_id" required>
                <option value="">-- Pilih Lab --</option>
                @foreach($lab as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_lab }}</option>
                @endforeach
            </select>

            <button class="btn-submit">Simpan</button>
            <a href="{{ route('barang.index') }}" class="btn-back">Batal</a>
        </form>

    </div>

</div>

@endsection
