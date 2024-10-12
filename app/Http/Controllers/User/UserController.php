<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\FlashSale; // Menambahkan model FlashSale
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $flash_sales = FlashSale::with('product') // Mengambil flash sale yang aktif
            ->where('start_time', '<=', now())
            ->where('end_time', '>=', now())
            ->get();

        return view('pages.user.index', compact('products', 'flash_sales')); // Kirim flash sales ke tampilan
    }

    public function detail_product($id)
    {
        $product = Product::findOrFail($id);
        $flashSale = FlashSale::where('product_id', $id)
            ->where('start_time', '<=', now()) // Flash sale sudah mulai
            ->where('end_time', '>=', now()) // Flash sale belum selesai
            ->first();
        return view('pages.user.detail', compact('product', 'flashSale'));
    }

    public function purchase($productId, $userId)
    {
        $product = Product::findOrFail($productId);
        $user = User::findOrFail($userId);

        // Check if user has enough points to purchase the product
        if ($user->point >= $product->price) {
            // Subtract product price from user's points
            $totalPoints = $user->point - $product->price;

            // Update user points
            $user->update(['point' => $totalPoints]);

            Alert::success('Berhasil!', 'Produk berhasil dibeli!');
            return redirect()->back();
        } else {
            Alert::error('Gagal!', 'Point anda tidak cukup!');
            return redirect()->back();
        }
    }

    public function flashsales() // Metode untuk menampilkan flash sale
    {
        $flash_sales = FlashSale::with('product')
            ->where('start_time', '<=', now())
            ->where('end_time', '>=', now())
            ->get();

        return view('pages.user.flashsales.index', compact('flash_sales')); // Kirim flash sales ke tampilan
    }

    public function purchaseFlashSale($flashSaleId, $userId)
    {
        $flashSale = FlashSale::findOrFail($flashSaleId);
        $user = User::findOrFail($userId);

        // Check if flash sale is active
        if ($flashSale->start_time <= now() && $flashSale->end_time >= now()) {
            // Check if user has enough points to purchase the flash sale product
            if ($user->point >= $flashSale->discount_price) {
                // Subtract discounted price from user's points
                $totalPoints = $user->point - $flashSale->discount_price;

                // Update user points
                $user->update(['point' => $totalPoints]);

                Alert::success('Berhasil!', 'Flash sale berhasil dibeli!');
                return redirect()->route('user.flashsales'); // Kembali ke halaman flash sales
            } else {
                Alert::error('Gagal!', 'Point anda tidak cukup untuk membeli flash sale!');
                return redirect()->back();
            }
        } else {
            Alert::error('Gagal!', 'Flash sale tidak aktif!');
            return redirect()->back();
        }
    }
}
