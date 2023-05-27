<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produk;
use App\Models\Toko;
use App\Models\Keranjang;

class PelProdukController extends Controller
{
    public function index()
    {

        return view('pelanggan.pelproduk.index', [
            'produks' => Produk::latest()->filter(request(['search']))->paginate(12)
        ]);
    }

    public function show($id)
    {
        return view('pelanggan.pelproduk.viewproduk', [
            'toko' => Toko::all(),
            'produk' => Produk::find($id),
            'user' => User::all(),
            'keranjang' => Keranjang::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([

            'view' => 'required'
        ]);
        Produk::where('id', $id)
            ->update($validatedData);
        return view('pelanggan.pelproduk.viewproduk', [
            'produk' => Produk::find($id),
        ]);
    }
}

// $produk = Produk::find($request->id);
// $produk->update($request->all());
