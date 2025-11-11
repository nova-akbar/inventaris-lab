@extends('layout')

@section('content')
    <div class="container mt-4">
        <h2>Edit Data Laboratorium</h2>

        {{-- Pesan error validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('lab.update', $lab->id) }}" method="POST">
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
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea 
                    class="form-control" 
                    id="keterangan" 
                    name="keterangan">{{ $lab->keterangan }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('lab.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection