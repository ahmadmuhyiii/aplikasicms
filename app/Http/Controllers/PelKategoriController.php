<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Sukucadang;
use App\Models\Motor;

class PelKategoriController extends Controller
{
    public function index()
    {
        return view('pelanggan.pelkategori.indexmotor', [
            'motors' => Motor::all(),
            'kategoris' => Kategori::all(),
            'sukucadangs' => Sukucadang::all(),
            'title' => 'Kategori'
        ]);
    }

    public function indexkate($id)
    {
        return view('pelanggan.pelkategori.index2', [
            'kategoris' => Kategori::all(),
            'sukucadangs' => Sukucadang::all(),
            'motors' => Motor::find($id),
        ]);
    }

    public function indexkategori($id, Produk $produk)
    {
        return view('pelanggan.pelkategori.viewkategori', [
            'produks' => Produk::all(),
            'kategoris' => Kategori::find($id),
            'sukucadangs' => Sukucadang::all()
        ]);
    }

    public function indexsukucadang(Request $request)
    {
        $kategori = $request->kategori;
        $sukucadang = $request->sukucadang;
        return view('pelanggan.pelkategori.indexsukucadang', [
            'produks' => Produk::all(),
            'kategoris' => Kategori::find($kategori),
            'sukucadangs' => Sukucadang::find($sukucadang)
        ]);
    }
}
