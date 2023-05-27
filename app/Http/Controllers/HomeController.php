<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Toko;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\Province;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pelanggan.home', [
            // 'produks' => Produk::where('qty', '>', 0)->get(),
            'produks' => Produk::where('qty', '>', 0)->orderBy('view', 'desc')->paginate(3),
            // 'produks' => Produk::orderBy('view', 'desc')->paginate(3),
        ]);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $jumlah_user = User::all()->count();
        $jumlah_toko = Toko::all()->count();
        $jumlah_produk = Produk::all()->count();
        $jumlah_kategori = Kategori::all()->count();

        return view('admin.adminHome')->with('jumlah_user', $jumlah_user)
            ->with('jumlah_toko', $jumlah_toko)
            ->with('jumlah_produk', $jumlah_produk)
            ->with('jumlah_kategori', $jumlah_kategori);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function tokoHome()
    {
        return view('toko.tokoHome');
    }
}
