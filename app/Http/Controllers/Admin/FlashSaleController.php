<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\Product;
use Illuminate\Http\Request;

class FlashSaleController extends Controller
{
    // Tampilkan daftar flash sale
    public function index()
    {
        $flash_sales = FlashSale::with('product')->get();
        return view('pages.admin.flashsales.index', compact('flash_sales'));
    }



    // Form untuk membuat flash sale baru
    public function create()
    {
        $products = Product::all();
        return view('pages.admin.flashsales.create', compact('products'));
    }

    // Simpan flash sale baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'product_id' => 'required|exists:products,id', // Pastikan product_id ada di tabel products
            'discount_price' => 'required|numeric',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        // Menggunakan format standar PHP
        $startTime = date('Y-m-d H:i:s', strtotime($request->start_time)); // Mengonversi ke format yang benar
        $endTime = date('Y-m-d H:i:s', strtotime($request->end_time)); // Mengonversi ke format yang benar

        FlashSale::create([
            'product_id' => $request->product_id,
            'discount_price' => $request->discount_price,
            'start_time' => $startTime,
            'end_time' => $endTime,
        ]);

        return redirect()->route('admin.flashsales')->with('success', 'Flash Sale berhasil dibuat');
    }

    // Edit flash sale
    public function edit($id) // Menambahkan parameter ID di sini
    {
        $flash_sales = FlashSale::findOrFail($id); // Mengambil flash sale berdasarkan ID
        $products = Product::all(); // Mengambil semua produk untuk dropdown
        return view('pages.admin.flashsales.edit', compact('flash_sales', 'products'));
    }

    // Update flash sale
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'discount_price' => 'required|numeric',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        // Menggunakan format standar PHP
        $startTime = date('Y-m-d H:i:s', strtotime($request->start_time)); // Mengonversi ke format yang benar
        $endTime = date('Y-m-d H:i:s', strtotime($request->end_time)); // Mengonversi ke format yang benar

        $flashSale = FlashSale::findOrFail($id);
        $flashSale->update([
            'discount_price' => $request->discount_price,
            'start_time' => $startTime,
            'end_time' => $endTime,
        ]);

        return redirect()->route('admin.flashsales')->with('success', 'Flash Sale berhasil diperbarui');
    }

    // Hapus flash sale
    public function destroy($id) // Menambahkan parameter ID di sini
    {
        $flashSale = FlashSale::findOrFail($id); // Mengambil flash sale berdasarkan ID
        $flashSale->delete(); // Menghapus flash sale yang ada
        return redirect()->route('admin.flashsales')->with('success', 'Flash Sale berhasil dihapus');
    }
    public function show($id)
    {
        $flashsale = FlashSale::with('product')->findOrFail($id);
        return view('pages.admin.flashsales.detail', compact('flashsale'));
    }

}
