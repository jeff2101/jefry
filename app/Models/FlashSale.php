<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class FlashSale extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai dengan konvensi
    protected $table = 'flash_sales';

    // Menentukan atribut yang dapat diisi secara massal
    protected $fillable = [
        'product_id',
        'discount_price',
        'start_time',
        'end_time',
    ];

    protected $casts = [
        'start_time' => 'datetime', // Pastikan ini ada
        'end_time' => 'datetime',    // Pastikan ini ada
    ];

    // Definisikan relasi dengan model Product
    public function product()
    {
        return $this->belongsTo(Product::class); // Menunjukkan bahwa FlashSale memiliki relasi 'belongs to' Product
    }

    // Menambahkan accessor untuk format tanggal (opsional)
    public function getStartTimeAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s'); // Ubah format tanggal sesuai kebutuhan
    }

    public function getEndTimeAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s'); // Ubah format tanggal sesuai kebutuhan
    }
}