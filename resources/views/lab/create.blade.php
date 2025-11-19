@extends('layout')

@section('content')

<style>
    body {
        background: #f4f6f9;
        font-family: "Segoe UI", sans-serif;
    }

    /* Wrapper utama */
    .form-container {
        background: white;
        max-width: 600px;
        padding: 30px;
        margin: 40px auto;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.12);
    }

    .form-title {
        font-size: 28px;
        font-weight: 700;
        color: #333;
        margin-bottom: 20px;
        text-align: center;
    }

    label {
        font-weight: 600;
        color: #333;
    }

    input[type="text"],
    input[type="file"] {
        width: 100%;
        padding: 12px;
        border-radius: 6px;
        border: 1px solid #ccc;
        margin-top: 6px;
        margin-bottom: 18px;
        transition: 0.25s ease;
    }

    input[type="text"]:focus {
        border-color: #ff7b00;
        box-shadow: 0 0 5px rgba(255, 123, 0, 0.6);
    }

    /* Tombol simpan */
    .btn-primary-custom {
        background: #ff7b00;
        color: white;
        font-weight: bold;
        padding: 12px 20px;
        border: none;
        border-radius: 6px;
        transition: 0.3s;
        width: 100%;
        margin-bottom: 10px;
    }

    .btn-primary-custom:hover {
        background: #e56f00;
        transform: translateY(-2px);
    }

    /* Tombol batal */
    .btn-secondary-custom {
        background: #333;
        color: white;
        font-weight: bold;
        padding: 12px 20px;
        border: none;
        border-radius: 6px;
        transition: 0.3s;
        width: 100%;
        text-align: center;
        display: block;
    }

    .btn-secondary-custom:hover {
        background: #000;
        transform: translateY(-2px);
    }

</style>

<div class="form-container">

    <h2 class="form-title">Tambah Data Laboratorium</h2>

    {{-- Tampilkan Error --}}
    @if ($errors->any())
        <div class="alert alert-danger p-3" style="border-radius: 8px;">
            <strong>Terjadi kesalahan!</strong>
            <ul class="mt-2 mb-0">
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('lab.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Nama Lab --}}
        <label for="nama_lab">Nama Laboratorium</label>
        <input type="text" id="nama_lab" name="nama_lab" required>

        {{-- Penanggung Jawab --}}
        <label for="penanggung_jawab">Penanggung Jawab</label>
        <input type="text" id="penanggung_jawab" name="penanggung_jawab" required>

        {{-- Foto --}}
        <label for="foto_penanggung_jawab">Foto Penanggung Jawab</label>
        <input type="file" id="foto_penanggung_jawab" name="foto_penanggung_jawab">

        {{-- Tombol --}}
        <button type="submit" class="btn-primary-custom">Simpan</button>

        <a href="{{ route('lab.index') }}" class="btn-secondary-custom">Batal</a>

    </form>

</div>

@endsection
