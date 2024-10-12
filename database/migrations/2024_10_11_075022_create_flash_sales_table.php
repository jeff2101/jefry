<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlashSalesTable extends Migration
{
    public function up()
    {
        Schema::create('flash_sales', function (Blueprint $table) {
            $table->id(); // Menambahkan kolom id sebagai primary key
            $table->unsignedBigInteger('product_id'); // Menyimpan ID produk
            $table->decimal('discount_price', 10, 2); // Menyimpan harga diskon dengan 2 angka desimal
            $table->timestamp('start_time'); // Menyimpan waktu mulai flash sale
            $table->timestamp('end_time')->nullable(); // Waktu akhir flash sale, bisa null
            $table->timestamps(); // Menyimpan created_at dan updated_at

            // Menambahkan foreign key untuk kolom product_id
            $table->foreign('product_id')
                ->references('id')->on('products') // Mengacu pada kolom id di tabel products
                ->onDelete('cascade'); // Menghapus flash sale jika produk dihapus
        });
    }

    public function down()
    {
        Schema::dropIfExists('flash_sales'); // Menghapus tabel flash_sales jika migrasi dibatalkan
    }
}
