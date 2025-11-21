<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // Semua role dapat melihat produk
    public function index()
    {
        return Product::all();
    }

    // Penjual membuat produk
    public function create()
    {
        return view('seller.create-product');
    }

    public function store(Request $request)
    {
        Product::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'seller_id' => Auth::guard('seller')->id()
        ]);

        return redirect()->back()->with('success','Produk dibuat');
    }

    // Admin & seller bisa edit
    public function edit($id)
    {
        return Product::find($id);
    }

    // Admin bisa hapus
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->back()->with('success','Produk dihapus');
    }
}
