@extends('layout')

@section('content')

<style>
    body {
        background: #f5f7fa;
        font-family: "Segoe UI", sans-serif;
    }

    /* ▬▬▬ HEADER ▬▬▬ */
    .mutasi-header {
        background: linear-gradient(135deg, #ff9d42, #ff7b00);
        padding: 28px 35px;
        border-radius: 14px;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 6px 18px rgba(255, 130, 0, 0.45);
        margin-bottom: 35px;
    }

    .mutasi-header h2 {
        margin: 0;
        font-size: 30px;
        font-weight: 700;
        letter-spacing: 1px;
    }

    .btn-add {
        background: white;
        color: #ff7b00;
        padding: 12px 20px;
        font-weight: bold;
        border-radius: 8px;
        text-decoration: none;
        transition: .25s;
    }

    .btn-add:hover {
        background: #ffe7cf;
        transform: translateY(-3px);
    }

    /* ▬▬▬ TABLE WRAPPER ▬▬▬ */
    .table-box {
        background: white;
        padding: 22px;
        border-radius: 14px;
        box-shadow: 0 5px 18px rgba(0,0,0,0.1);
        border: 1px solid #ececec;
    }

    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 10px;
        table-layout: fixed; /* BIAR RAPIH & SEJEJAR */
    }

    thead tr th {
        background: #1e293b;
        color: white;
        padding: 14px;
        text-align: center;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        font-size: 15px;
        white-space: nowrap;
    }

    /* ▬▬▬ KUNCI LEBAR KOLOM ▬▬▬ */
    th:nth-child(1), td:nth-child(1) { min-width: 150px; }
    th:nth-child(2), td:nth-child(2) { min-width: 130px; }
    th:nth-child(3), td:nth-child(3) { min-width: 130px; }
    th:nth-child(4), td:nth-child(4) { min-width: 80px; }
    th:nth-child(5), td:nth-child(5) { min-width: 130px; }
    th:nth-child(6), td:nth-child(6) { min-width: 150px; }

    tbody tr {
        background: #ffffff;
        box-shadow: 0 3px 10px rgba(0,0,0,0.07);
        transition: .2s;
    }

    tbody tr:hover {
        transform: scale(1.01);
        box-shadow: 0 4px 16px rgba(0,0,0,0.12);
    }

    tbody td {
        padding: 16px;
        text-align: center;
        font-size: 14px;
        color: #333;
        word-wrap: break-word;
    }

    /* ▬▬▬ BUTTONS ▬▬▬ */
    .btn-edit {
        background: #ff8b24;
        border-radius: 6px;
        padding: 8px 15px;
        color: white;
        text-decoration: none;
        font-weight: bold;
        transition: .2s;
    }
    .btn-edit:hover {
        background: #e67914;
    }

    .btn-delete {
        background: #e63946;
        border-radius: 6px;
        padding: 8px 15px;
        color: white;
        font-weight: bold;
        border: none;
        cursor: pointer;
        transition: .2s;
    }
    .btn-delete:hover {
        background: #c71f2d;
    }
</style>


<div class="container mt-4">

    {{-- HEADER --}}
    <div class="mutasi-header">
        <h2>Mutasi Barang</h2>

        <a href="{{ route('mutasi_barang.create') }}" class="btn-add">
            + Tambah Mutasi
        </a>
    </div>

    {{-- TABLE --}}
    <div class="table-box">

        <table>
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Lab Asal</th>
                    <th>Lab Tujuan</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($mutasi_barang as $item)
                <tr>
                    <td>{{ $item->barang->nama_barang }}</td>
                  <td>{{ $item->labAsal->nama_lab ?? 'Tidak ditemukan' }}</td>
<td>{{ $item->labTujuan->nama_lab ?? 'Tidak ditemukan' }}</td>

                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->tanggal_mutasi }}</td>
                    <td>
                        <a href="{{ route('mutasi_barang.edit', $item->id) }}" class="btn-edit">Edit</a>

                        <form action="{{ route('mutasi_barang.destroy', $item->id) }}"
                              method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus mutasi ini?')" class="btn-delete">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>

</div>

@endsection
