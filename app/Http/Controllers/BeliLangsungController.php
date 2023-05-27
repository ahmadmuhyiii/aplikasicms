<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;
use App\Models\Province;

class BeliLangsungController extends Controller
{
    // public function create()
    // {
    //     $keranjang   = Keranjang::where('user_id', Auth::id())->get();
    //     $idProduk = $keranjang->pluck('produk_id');
    //     $idToko = Produk::whereIn('id', $idProduk)->groupBy('toko_id')->pluck('toko_id');



    //     $cekongkir = null;
    //     $provinsi = Province::all();
    //     return view('pelanggan.transaksi.create', [
    //         'keranjangs' => Keranjang::where('user_id', Auth::id())->get(),
    //         'produks' => Produk::all(),
    //         'idProduk' => $idProduk,
    //         'idToko' => $idToko,
    //         'provinsi' => $provinsi,
    //         'cekongkir' => $cekongkir,

    //     ]);
    // }

    public function belilangsung(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'produk_id' => 'required',
            'qty' => 'required',
            'harga' => 'required',
        ]);

        $keranjang = new Keranjang;
        $keranjang->produk_id = $request->produk_id;
        $keranjang->user_id = $request->user_id;
        $qty = (int)$request->qty;
        $harga = (int)$request->harga;
        $subTotal = $qty * $harga;
        $keranjang->qty = $qty;
        $keranjang->subtotal = $subTotal;
        $keranjang->user_id = Auth::user()->id;

        $keranjang->save();

        return redirect('/pelanggan/transaksi/create')->with('success', 'New produk has ben added!');
    }
}
