@extends('layout')

@section('content')
    <div class="container mt-4">
        <h2>Detail Laboratorium</h2>

        {{-- Menampilkan informasi lengkap tentang laboratorium --}}
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Nama Laboratorium</h5>
                <p class="card-text">{{ $lab->nama_lab }}</p>

                <h5 class="card-title mt-3">Keterangan</h5>
                <p class="card-text">{{ $lab->keterangan }}</p>
            </div>
        </div>

        {{-- Tombol navigasi kembali ke daftar laboratorium --}}
        <a href="{{ route('lab.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
@endsection
