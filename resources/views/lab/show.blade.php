@extends('layout')

@section('content')

<style>
    body {
        background: #f4f6f9;
        font-family: "Segoe UI", sans-serif;
    }

    /* Header */
    .lab-header {
        width: 100%;
        padding: 40px;
        background: #1e2a3a;
        color: white;
        border-radius: 0 0 14px 14px;
        text-align: center;
        margin-bottom: 30px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.18);
    }

    .lab-header h1 {
        font-size: 32px;
        font-weight: 700;
        margin: 0;
    }

    /* Penanggung Jawab Box */
    .pj-card {
        background: white;
        padding: 25px;
        border-radius: 14px;
        box-shadow: 0 4px 18px rgba(0,0,0,0.12);
        margin-bottom: 30px;
        text-align: center;
    }

    .pj-img {
        width: 130px;
        height: 130px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid #ff7b00;
        margin-bottom: 15px;
    }

    .pj-name {
        font-size: 20px;
        font-weight: 600;
    }

    /* Barang Table */
    .barang-card {
        background: white;
        padding: 25px;
        border-radius: 14px;
        box-shadow: 0 4px 18px rgba(0,0,0,0.12);
    }

    .barang-card h3 {
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    table.table {
        border-radius: 10px;
        overflow: hidden;
    }

    table thead {
        background: #ff7b00;
        color: white;
    }

    table tbody tr:hover {
        background: #fff6e9;
    }

    .btn-back {
        display: inline-block;
        padding: 10px 18px;
        background: #1e2a3a;
        color: white;
        border-radius: 6px;
        text-decoration: none;
        margin-bottom: 20px;
        transition: 0.3s;
    }

    .btn-back:hover {
        background: #111a27;
    }
</style>

{{-- HEADER --}}
<div class="lab-header">
    <h1>{{ $lab->nama_lab }}</h1>
</div>

<div class="container">

    {{-- Tombol Kembali --}}
    <a href="{{ route('lab.index') }}" class="btn-back">← Kembali ke Daftar Lab</a>

    {{-- PENANGGUNG JAWAB CARD --}}
    <div class="pj-card">
        @if($lab->foto_penanggung_jawab)
            <img src="{{ asset('storage/' . $lab->foto_penanggung_jawab) }}" 
                 class="pj-img"
                 alt="Foto Penanggung Jawab">
        @else
            <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png"
                 class="pj-img">
        @endif

        <div class="pj-name">
            {{ $lab->penanggung_jawab ?? 'Belum diisi' }}
        </div>
    </div>


    {{-- BARANG DI LAB --}}
    <div class="barang-card">
        <h3>Daftar Barang di Lab</h3>

        @if($lab->barang->count() > 0)
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($lab->barang as $barang)
                    <tr>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->jumlah }}</td>
                        <td>{{ $barang->keterangan ?? '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        @else
            <p class="text-muted">Belum ada barang di lab ini.</p>
        @endif
    </div>

</div>

@endsection
