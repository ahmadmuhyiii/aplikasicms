<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Sukucadang;
use App\Models\Transaksi;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class JualController extends Controller
{
    public function index()
    {
        return view('pelanggan.jual.index', [
            'produks' => Produk::where('toko_id', auth()->user()->toko->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.jual.create', [
            'kategoris' => Kategori::all(),
            'sukucadangs' => Sukucadang::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_produk' => 'required|max:255',
            'code' => 'required',
            'kategori_id' => 'required',
            'sukucadang_id' => 'required',
            'toko_id' => 'required',
            'kondisi' => 'required',
            'harga' => 'required|',
            'qty' => 'required',
            'berat' => 'required',
            'deskripsi' => 'required',
            'image' => 'image|file|max:1024'
        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('produk-images');
        }
        $produk = new Produk;
        $produk->toko_id = $request->toko_id;
        // $produk->toko_id = $request->toko->id;

        Produk::Create($validatedData);

        return redirect('/pelanggan/jual')->with('success', 'New produk has ben added!');
    }


    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        return view('pelanggan.jual.edit', [
            'produk' => $produk,
            'produks' => Produk::all(),
            'kategoris' => Kategori::all(),
            'sukucadangs' => Sukucadang::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $validatedData = $request->validate([
            'nama_produk' => 'required',
            'code' => 'required',
            'kategori_id' => 'required',
            'sukucadang_id' => 'required',
            'kondisi' => 'required',
            'harga' => 'required',
            'qty' => 'required',
            'berat' => 'required',
            'deskripsi' => 'required',
            'image' => 'image|file|max:1024'
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('produk-images');
        }

        Produk::where('id', $produk->id)
            ->update($validatedData);

        return redirect('/pelanggan/jual')->with('success', 'Produk has ben Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        if ($produk->image) {
            Storage::delete($produk->image);
        }

        Produk::destroy($produk->id);
        return redirect('/pelanggan/jual')->with('success', 'Kategori has ben Deleted!');
    }
}
