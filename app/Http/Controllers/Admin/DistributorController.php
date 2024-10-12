<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index()
    {
        // Mengambil semua distributor dari database
        $distributors = Distributor::all();
        return view('pages.admin.distributor.index', compact('distributors'));
    }

    public function create()
    {
        // Menampilkan form untuk menambah distributor
        return view('pages.admin.distributor.create');
    }

    public function store(Request $request)
    {
        // Validasi input dari pengguna
        $request->validate([
            'nama_distributor' => 'required',
            'lokasi' => 'required',
            'kontak' => 'required',
            'email' => 'required|email',
        ]);

        // Menyimpan distributor baru ke database
        Distributor::create($request->all());

        return redirect()->route('admin.distributor')->with('success', 'Distributor berhasil ditambahkan');
    }

    public function edit($id)
    {
        // Mengambil distributor berdasarkan ID
        $distributor = Distributor::findOrFail($id); // Menggunakan findOrFail untuk menangani error
        return view('pages.admin.distributor.edit', compact('distributor'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input dari pengguna
        $request->validate([
            'nama_distributor' => 'required',
            'lokasi' => 'required',
            'kontak' => 'required',
            'email' => 'required|email',
        ]);

        // Mengambil distributor berdasarkan ID
        $distributor = Distributor::findOrFail($id); // Menggunakan findOrFail untuk menangani error
        $distributor->update($request->all());

        return redirect()->route('admin.distributor')->with('success', 'Distributor berhasil diupdate');
    }

    public function destroy($id)
    {
        // Mengambil distributor berdasarkan ID
        $distributor = Distributor::findOrFail($id); // Menggunakan findOrFail untuk menangani error
        $distributor->delete();

        return redirect()->route('admin.distributor')->with('success', 'Distributor berhasil dihapus');
    }
    public function show($id)
    {
        $distributor = Distributor::findOrFail($id);
        return view('pages.admin.distributor.detail', compact('distributor'));
    }

}
