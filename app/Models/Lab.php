<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lab extends Model
{
    use HasFactory;

    protected $table = 'lab';

    protected $fillable = [
        'nama_lab',
        'penanggung_jawab',
        'foto_penanggung_jawab'
    ];

    // Satu lab punya banyak barang
    public function barang()
    {
        return $this->hasMany(\App\Models\Barang::class, 'lab_id');
    }

    // Mutasi — lab sebagai ASAL
    public function mutasiAsal()
    {
        return $this->hasMany(\App\Models\MutasiBarang::class, 'lab_asal_id', 'id');
    }

    // Mutasi — lab sebagai TUJUAN
    public function mutasiTujuan()
    {
        return $this->hasMany(\App\Models\MutasiBarang::class, 'lab_tujuan_id', 'id');
    }
}
