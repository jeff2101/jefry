<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan (jika tidak sesuai dengan nama model)
    protected $table = 'distributors';  // Pastikan tabel sesuai dengan yang ada di database

    // Menentukan atribut yang bisa diisi
    protected $fillable = [
        'nama_distributor',
        'lokasi',
        'kontak',
        'email'
    ];
}
