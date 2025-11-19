<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang'; // FIX NAMA TABEL

    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'lab_id',
        'status',
        'keterangan',
    ];

    public function lab()
    {
        return $this->belongsTo(Lab::class);
    }

    public function mutasiBarang()
    {
        return $this->hasMany(MutasiBarang::class);
    }
}
