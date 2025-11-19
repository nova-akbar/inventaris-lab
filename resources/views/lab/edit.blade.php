@extends('layout')

@section('content')

<style>
    body {
        background: #f4f6f9;
        font-family: "Segoe UI", sans-serif;
    }

    .edit-wrapper {
        max-width: 650px;
        margin: 40px auto;
    }

    .edit-title {
        font-size: 30px;
        font-weight: 700;
        margin-bottom: 20px;
        color: #1e2a3a;
        text-align: center;
    }

    .edit-card {
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 18px rgba(0,0,0,0.12);
    }

    .form-label {
        font-weight: 600;
        margin-bottom: 6px;
        color: #2e2e2e;
    }

    .form-control {
        padding: 12px;
        height: 46px;
        border: 1px solid #ddd;
        border-radius: 8px;
        transition: 0.25s;
    }

    .form-control:focus {
        border-color: #ff7b00;
        box-shadow: 0 0 0 3px rgba(255, 136, 0, 0.25);
    }

    .btn-save {
        width: 100%;
        background: #ff7b00;
        padding: 12px;
        border-radius: 8px;
        border: none;
        font-weight: bold;
        color: white;
        font-size: 16px;
        margin-top: 20px;
        transition: 0.25s;
        cursor: pointer;
    }

    .btn-save:hover {
        background: #e66d00;
        transform: translateY(-2px);
    }

    .btn-back {
        width: 100%;
        background: #1e2a3a;
        padding: 12px;
        border-radius: 8px;
        border: none;
        font-weight: bold;
        color: white;
        font-size: 16px;
        margin-top: 10px;
        transition: 0.25s;
        cursor: pointer;
        text-align: center;
        display: block;
        text-decoration: none;
    }

    .btn-back:hover {
        background: #0d141f;
        transform: translateY(-2px);
    }
</style>

<div class="edit-wrapper">

    <h2 class="edit-title">Edit Data Laboratorium</h2>

    <div class="edit-card">

        {{-- error validate --}}
        @if ($errors->any())
            <div class="alert alert-danger mb-3">
                <ul style="margin:0; padding-left:18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('lab.update', $lab->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Nama Lab --}}
            <div class="mb-3">
                <label class="form-label">Nama Laboratorium</label>
                <input 
                    type="text" 
                    name="nama_lab"
                    value="{{ $lab->nama_lab }}"
                    class="form-control"
                    required>
            </div>

            {{-- Penanggung Jawab --}}
            <div class="mb-3">
                <label class="form-label">Penanggung Jawab</label>
                <input 
                    type="text" 
                    name="penanggung_jawab"
                    value="{{ $lab->penanggung_jawab }}"
                    class="form-control"
                    required>
            </div>

            {{-- Foto --}}
            <div class="mb-3">
                <label class="form-label">Foto Penanggung Jawab</label>

                @if($lab->foto_penanggung_jawab)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $lab->foto_penanggung_jawab) }}" 
                             alt="foto"
                             width="120"
                             style="border-radius: 8px;">
                    </div>
                @endif

                <input 
                    type="file" 
                    name="foto_penanggung_jawab"
                    class="form-control">
            </div>

            <button class="btn-save">Simpan Perubahan</button>

            <a href="{{ route('lab.index') }}" class="btn-back">Kembali</a>

        </form>

    </div>
</div>

@endsection
