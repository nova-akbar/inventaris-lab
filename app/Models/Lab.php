<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Memungkinkan model membuat data dummy lewat factory untuk testing atau seeding.

class Lab extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan model ini di database
    protected $table = 'lab';

    // Menentukan kolom mana yang dapat diisi secara mass assignment (fillable)
    protected $fillable = ['nama_lab'];

    // Relasi One-to-Many: Satu lab dapat memiliki banyak barang
    public function barang()
    {
        // relasi ke model Barang berdasarkan foreign key 'lab_id' pada tabel 'barang'
        return $this->hasMany(Barang::class);
    }
}
