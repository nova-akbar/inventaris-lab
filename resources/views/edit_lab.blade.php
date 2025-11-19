@extends('layout')

@section('content')
    <div class="container mt-4">
        <h2>Edit Data Laboratorium</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

<form action="{{ route('lab.update', $lab->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_lab" class="form-label">Nama Laboratorium</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="nama_lab" 
                    name="nama_lab" 
                    value="{{ $lab->nama_lab }}" 
                    required>
            </div>

            <div class="mb-3">
                <label for="penanggung_jawab" class="form-label">Penanggung Jawab</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="penanggung_jawab" 
                    name="penanggung_jawab" 
                    value="{{ old('penanggung_jawab', $lab->penanggung_jawab) }}">
            </div>

            <div class="mb-3">
                <label for="foto_penanggung_jawab" class="form-label">Foto Penanggung Jawab</label>
                <input type="file" class="form-control" name="foto_penanggung_jawab">

            @if($lab->foto_penanggung_jawab)
    <img src="{{ asset('storage/' . $lab->foto_penanggung_jawab) }}" alt="Foto Penanggung Jawab" width="100">
@endif

            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('lab.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
