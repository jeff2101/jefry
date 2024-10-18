<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Admin;
use App\Models\Distributor;
use App\Models\FlashSale;
class AdminController extends Controller
{
    public function dashboard()
    {
        $products = Product::count();
        $users = User::count();
        $distributors = Distributor::count();
        $flashSales = FlashSale::count();
        $admins = Admin::count();

        return view('pages.admin.index', compact('products', 'users', 'distributors', 'flashSales', 'admins'));
    }

    // Menampilkan daftar admin
    public function index()
    {
        $admins = Admin::all();
        return view('pages.admin.admin.index', compact('admins'));
    }

    // Menampilkan form untuk menambah admin baru
    public function create()
    {
        return view('pages.admin.admin.create');
    }

    // Menyimpan admin baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:admins',
            'email' => 'required|email|unique:admins',
            'password' => 'required|string|min:6',
        ]);

        Admin::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.admin')->with('success', 'Admin created successfully.');
    }

    // Menampilkan form untuk mengedit admin
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('pages.admin.admin.edit', compact('admin'));
    }

    // Memperbarui data admin di database
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:admins,username,' . $id,
            'email' => 'required|email|unique:admins,email,' . $id,
            'password' => 'nullable|string|min:6',
        ]);

        $admin->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $admin->password,
        ]);

        return redirect()->route('admin.admin')->with('success', 'Admin updated successfully.');
    }

    // Menghapus admin
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin.admin')->with('success', 'Admin deleted successfully.');
    }

    // Menampilkan detail admin dan flash sale (contoh rute /admin/flashsales/{id})
    public function show($id)
    {
        // Ambil admin berdasarkan ID
        $admin = Admin::findOrFail($id);
        // Kamu bisa menyesuaikan query di sini untuk mengambil flash sale terkait
        // $flashsales = FlashSale::where('admin_id', $id)->get();
        return view('pages.admin.admin.detail', compact('admin'));
    }
}
