<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MutasiBarang extends Model
{
    use HasFactory;

    protected $table = 'mutasi_barang';

    protected $fillable = [
        'barang_id',
        'lab_asal_id',
        'lab_tujuan_id',
        'jumlah',
        'tanggal_mutasi',
    ];

    // Relasi: satu mutasi milik satu barang
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    // Relasi ke lab asal
   public function labAsal()
{
    return $this->belongsTo(Lab::class, 'lab_asal');
}

public function labTujuan()
{
    return $this->belongsTo(Lab::class, 'lab_tujuan');
}



    
}
