<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan model ini
    protected $table = 'barang';

    // Menentukan kolom yang bisa diisi massal
    protected $fillable = ['kode_barang', 'nama_barang', 'jumlah', 'lab_id'];

    // Relasi Many-to-One: Setiap barang dimiliki oleh satu lab
    public function lab()
    {
        // relasi ke model Lab dengan foreign key 'lab_id'
        return $this->belongsTo(Lab::class);
    }

    // Relasi One-to-Many: Satu barang bisa memiliki banyak catatan mutasi
    public function mutasiBarang()
    {
        // relasi ke model MutasiBarang berdasarkan foreign key 'barang_id' pada tabel 'mutasi_barang'
        return $this->hasMany(MutasiBarang::class);
    }
}
