@extends('layout')

@section('content')

<style>
    body {
        background: #f4f6f9;
        font-family: "Segoe UI", sans-serif;
    }

    /* Header Box */
    .page-header {
        background: linear-gradient(135deg, #ffa559, #ff7b00);
        padding: 22px 28px;
        border-radius: 12px;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 3px 15px rgba(255, 136, 0, 0.35);
        margin-bottom: 28px;
    }

    .page-header h2 {
        font-size: 28px;
        font-weight: 700;
        margin: 0;
    }

    .btn-add {
        background: white;
        color: #ff7b00;
        padding: 10px 18px;
        font-weight: bold;
        border-radius: 6px;
        border: none;
        box-shadow: 0 3px 10px rgba(255,255,255,0.35);
        transition: 0.3s;
        text-decoration: none;
    }

    .btn-add:hover {
        background: #ffe1c2;
        transform: translateY(-3px);
    }

    /* Table Styling */
    .table-container {
        background: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 5px 18px rgba(0,0,0,0.12);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        overflow: hidden;
    }

    thead {
        background: #1e2a3a;
        color: white;
    }

    th {
        padding: 14px;
        font-size: 15px;
    }

    td {
        padding: 14px;
        background: #ffffff;
        border-bottom: 1px solid #eee;
    }

    tr:hover td {
        background: #fafafa;
    }

    .action-btn {
        display: inline-block;
        padding: 8px 12px;
        border-radius: 6px;
        font-weight: 600;
        font-size: 14px;
        text-decoration: none;
        transition: 0.25s;
    }

    .btn-edit {
        background: #ff7b00;
        color: white;
    }

    .btn-edit:hover {
        background: #e66d00;
        transform: translateY(-2px);
    }

    .btn-delete {
        background: #c82333;
        color: white;
        border: none;
    }

    .btn-delete:hover {
        background: #a71d2a;
        transform: translateY(-2px);
    }
</style>

<div class="container mt-4">

    {{-- Header --}}
    <div class="page-header">
        <h2>Daftar Barang</h2>
        <a href="{{ route('barang.create') }}" class="btn-add">+ Tambah Barang</a>
    </div>

    {{-- Table --}}
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th>Lab</th>
                    <th style="width: 160px;">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($barang as $item)
                <tr>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->keterangan ?? '-' }}</td>
                    <td>{{ $item->lab->nama_lab ?? '-' }}</td>

                    <td>
                        <a href="{{ route('barang.edit', $item->id) }}" class="action-btn btn-edit">Edit</a>

                        <form action="{{ route('barang.destroy', $item->id) }}" method="POST" 
                              style="display:inline-block;"
                              onsubmit="return confirm('Hapus barang ini?');">
                              @csrf
                              @method('DELETE')
                              <button class="action-btn btn-delete">Hapus</button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
