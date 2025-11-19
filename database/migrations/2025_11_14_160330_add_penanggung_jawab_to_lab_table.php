@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Tambah Data Laboratorium</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('lab.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nama_lab" class="form-label">Nama Laboratorium</label>
            <input type="text" class="form-control" id="nama_lab" name="nama_lab" required>
        </div>

        <div class="mb-3">
            <label for="penanggung_jawab" class="form-label">Penanggung Jawab</label>
            <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab" required>
        </div>

        <div class="mb-3">
            <label for="foto_penanggung_jawab" class="form-label">Foto Penanggung Jawab</label>
            <input type="file" class="form-control" id="foto_penanggung_jawab" name="foto_penanggung_jawab">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('lab.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
