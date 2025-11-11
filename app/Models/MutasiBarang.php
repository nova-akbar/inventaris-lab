<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MutasiBarang extends Model
{
     use HasFactory;

    // Menentukan nama tabel yang digunakan
    protected $table = 'mutasi_barang';

    // Menentukan kolom yang bisa diisi massal
    protected $fillable = ['barang_id', 'tanggal_mutasi', 'jumlah', 'keterangan'];

    // Relasi Many-to-One: Setiap mutasi barang berkaitan dengan satu barang tertentu
    public function barang()
    {
        // relasi ke model Barang dengan foreign key 'barang_id'
        return $this->belongsTo(Barang::class);
    }
}
