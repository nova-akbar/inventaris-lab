@extends('layout')

@section('content')

<style>
    body {
        background: #f4f6f9;
        font-family: "Segoe UI", sans-serif;
    }

    .page-title {
        font-size: 32px;
        font-weight: 700;
        color: #1f1f1f;
        margin-bottom: 20px;
    }

    .lab-header-box {
        background: linear-gradient(135deg, #ffa559, #ff7b00);
        padding: 25px 30px;
        border-radius: 12px;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 3px 15px rgba(255, 136, 0, 0.4);
        margin-bottom: 30px;
    }

    .lab-header-box h2 {
        font-size: 28px;
        font-weight: 600;
        margin: 0;
    }

    .btn-tambah {
        background: white;
        color: #ff7b00;
        font-weight: bold;
        padding: 10px 18px;
        border-radius: 6px;
        border: none;
        box-shadow: 0 3px 10px rgba(255,255,255,0.3);
        transition: 0.25s;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-tambah:hover {
        background: #ffe9d0;
        transform: translateY(-3px);
    }

    .lab-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
        margin-bottom: 40px;
    }

    .lab-card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.12);
        overflow: hidden;
        transition: 0.3s ease;
        border: 1px solid #eee;
    }

    .lab-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.18);
    }

    .lab-card-header {
        background: #1e2a3a;
        color: white;
        padding: 18px;
        font-size: 20px;
        font-weight: 600;
        text-align: center;
    }

    .lab-card-body {
        padding: 20px;
    }

    .label-text {
        font-weight: bold;
        color: #333;
    }

    .view-btn {
        display: inline-block;
        margin-top: 10px;
        padding: 10px 14px;
        font-size: 14px;
        background: #ff7b00;
        color: white;
        text-decoration: none;
        border-radius: 6px;
        font-weight: bold;
        transition: 0.3s ease;
    }

    .view-btn:hover {
        background: #e66d00;
        transform: translateX(4px);
    }

    /* === NEW BUTTONS === */

    .btn-edit {
        background: #1e2a3a;
        color: white;
        padding: 8px 14px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: bold;
        text-decoration: none;
        margin-right: 8px;
        transition: 0.25s ease;
    }

    .btn-edit:hover {
        background: #0f1622;
        transform: translateY(-2px);
    }

    .btn-delete {
        background: #d9534f;
        color: white;
        padding: 8px 14px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: bold;
        border: none;
        cursor: pointer;
        transition: 0.25s ease;
    }

    .btn-delete:hover {
        background: #c43e3a;
        transform: translateY(-2px);
    }

    .card-buttons {
        margin-top: 12px;
    }
</style>


<div class="container mt-4">

    <div class="lab-header-box">
        <h2>Daftar Laboratorium</h2>

        <a href="{{ route('lab.create') }}" class="btn-tambah">
            + Tambah Lab
        </a>
    </div>

    <div class="lab-grid">

        @foreach ($lab as $item)
        <div class="lab-card">

            <div class="lab-card-header">
                {{ $item->nama_lab }}
            </div>

            <div class="lab-card-body">

                <p class="label-text">Penanggung Jawab:</p>
                <p>{{ $item->penanggung_jawab ?? 'Belum diisi' }}</p>

                <a href="{{ route('lab.show', $item->id) }}" class="view-btn">
                    Lihat Detail →
                </a>

                <div class="card-buttons">

                    <a href="{{ route('lab.edit', $item->id) }}" class="btn-edit">
                        Edit
                    </a>

                    <form action="{{ route('lab.destroy', $item->id) }}" 
                          method="POST" 
                          style="display:inline;">
                        @csrf
                        @method('DELETE')
                        
                        <button class="btn-delete"
                                onclick="return confirm('Yakin ingin menghapus lab ini?')">
                            Hapus
                        </button>
                    </form>

                </div>

            </div>

        </div>
        @endforeach

    </div>

</div>

@endsection
