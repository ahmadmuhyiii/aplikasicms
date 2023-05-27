<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use App\Models\Toko;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TokoController extends Controller
{
    public function index()
    {
        return view('pelanggan.toko.index', [
            'tokos' => Toko::all(),
            'transaksi' => Transaksi::all()
        ]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'nama_toko' => 'required',
            'nik' => 'required',
            'image2' => 'file|image|nullable',
            'email' => 'required',
            'image' => 'file|image|nullable',
            'no_telp' => 'nullable',
            'nomor_rek' => 'nullable',
            'province_id' => 'nullable',
            'city_id' => 'nullable',
            'alamat' => 'nullable',
        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('toko-images');
        }
        if ($request->file('image2')) {
            $validatedData['image2'] = $request->file('image2')->store('toko-images2');
        }

        $toko = new Toko;
        $toko->user_id = $request->user_id;
        $toko->user_id = Auth::user()->id;



        Toko::Create($validatedData);
        // if ($request->file('image')) {
        //     $validatedData['image'] = $request->file('image')->store('produk-images');
        // }

        return redirect('/pelanggan/toko')->with('success', 'New produk has ben added!');
    }

    public function edit(Toko $toko)
    {
        return view('pelanggan.toko.edit', [
            'toko' => $toko,
            'tokos' => Toko::all(),
            'provinces' => Province::all(),
            'citys' => City::all(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Toko $toko)
    {
        $validatedData = $request->validate([
            'nama_toko' => 'required',
            'nik' => 'required',
            'image2' => 'image|file|max:1024',
            'image' => 'image|file|max:1024',
            'email' => 'required',
            'no_telp' => 'required',
            'nomor_rek' => 'required',
            'province_id' => 'required',
            'city_id' => 'required',
            'alamat' => 'required'
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('toko-images');
        }
        if ($request->file('image2')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image2'] = $request->file('image2')->store('toko-images2');
        }

        Toko::where('id', $toko->id)
            ->update($validatedData);

        return redirect('/pelanggan/toko')->with('success', 'Toko has ben Updated!');
    }
}
