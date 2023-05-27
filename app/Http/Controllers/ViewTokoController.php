<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produk;
use App\Models\Toko;

class ViewTokoController extends Controller
{
    public function show($id)
    {
        return view('pelanggan.viewtoko.show', [
            'toko' => Toko::find($id),
            'produks' => Produk::find($id),
            'produk' => Produk::all(),
            'user' => User::all(),
        ]);
    }
}
