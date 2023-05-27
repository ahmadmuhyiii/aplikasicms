<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Keranjang;
use App\Models\Order;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function index()
    {
        return view('pelanggan.keranjang.index', [
            'keranjangs' => Keranjang::all(),
            'produks' => Produk::all(),
            'users' => User::all()
        ]);
    }

    public function create()
    {
        return view('pelanggan.keranjang.create', [
            'keranjangs' => Keranjang::all()
        ]);
    }

    public function store(Request $request)
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
        // if ($request->file('image')) {
        //     $validatedData['image'] = $request->file('image')->store('produk-images');
        // }

        return redirect('/pelanggan/keranjang')->with('success', 'New produk has ben added!');
    }
    public function destroy(Keranjang $keranjang)
    {

        Keranjang::destroy($keranjang->id);
        return redirect('/pelanggan/keranjang')->with('success', 'Keranjang has ben Deleted!');
    }

    public function edit(Keranjang $keranjang)
    {
        return view('pelanggan.keranjang.edit', [
            'keranjang' => $keranjang,
            'keranjangs' => Keranjang::all(),
            'produk' => Produk::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keranjang $keranjang)
    {
        $validatedData = $request->validate([
            'qty' => 'required'
        ]);

        Keranjang::where('id', $keranjang->id)
            ->update($validatedData);

        return redirect('/pelanggan/keranjang')->with('success', 'Keranjang has ben Updated!');
    }
}
