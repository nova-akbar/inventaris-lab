@extends('layout')

@section('content')

<style>
    .form-box {
        background: white;
        padding: 28px;
        border-radius: 12px;
        width: 75%;
        margin: auto;
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    }

    .title {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    label {
        font-weight: 600;
        margin-bottom: 6px;
        display: block;
    }

    select, input {
        width: 100%;
        padding: 12px;
        border-radius: 6px;
        border: 1px solid #ddd;
        margin-bottom: 18px;
        transition: .2s;
    }

    select:focus, input:focus {
        border-color: #ff7b00;
        box-shadow: 0 0 8px rgba(255,123,0,0.4);
    }

    .btn-save {
        background: #ff7b00;
        color: white;
        padding: 12px 20px;
        border-radius: 6px;
        border: none;
        font-weight: bold;
        transition: .2s;
    }

    .btn-save:hover { background: #e66d00; }

    .btn-back {
        background: #dcdcdc;
        padding: 12px 20px;
        border-radius: 6px;
        text-decoration: none;
        color: black;
        font-weight: bold;
    }

</style>

<div class="container mt-4">

    <div class="form-box">
        <h2 class="title">Edit Mutasi Barang</h2>

        <form action="{{ route('mutasi_barang.update', $mutasi_barang->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Barang</label>
            <select name="barang_id" required>
                @foreach($barang as $b)
                    <option value="{{ $b->id }}" {{ $mutasi_barang->barang_id == $b->id ? 'selected':'' }}>
                        {{ $b->nama_barang }}
                    </option>
                @endforeach
            </select>

            <label>Lab Asal</label>
            <select name="lab_asal_id" required>
                @foreach($lab as $l)
                    <option value="{{ $l->id }}" {{ $mutasi_barang->lab_asal_id == $l->id ? 'selected':'' }}>
                        {{ $l->nama_lab }}
                    </option>
                @endforeach
            </select>

            <label>Lab Tujuan</label>
            <select name="lab_tujuan_id" required>
                @foreach($lab as $l)
                    <option value="{{ $l->id }}" {{ $mutasi_barang->lab_tujuan_id == $l->id ? 'selected':'' }}>
                        {{ $l->nama_lab }}
                    </option>
                @endforeach
            </select>

            <label>Jumlah</label>
            <input type="number" name="jumlah" value="{{ $mutasi_barang->jumlah }}" required>

            <button class="btn-save">Simpan Perubahan</button>
            <a href="{{ route('mutasi_barang.index') }}" class="btn-back">Batal</a>

        </form>
    </div>

</div>

@endsection
