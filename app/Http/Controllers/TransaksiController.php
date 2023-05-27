<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\Province;
use App\Models\City;
use Illuminate\Database\Events\TransactionRolledBack;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        // $transaksi = Transaksi::where('user_id', auth()->user()->id)->get();

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-Zu-LieaP1Tx5MZ1E_VVrqFTG';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            ),
            'item_details' => array(
                [
                    'id' => 'a01',
                    'price' => 10000,
                    'quantity' => 1,
                    'name' => 'Apple'
                ],
            ),
            'customer_details' => array(
                'first_name' => $request->nama,
                'last_name' => 'pratama',
                'email' => 'budi.pra@example.com',
                'phone' => $request->get('no_telp'),
            ),
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('pelanggan.transaksi.index', [
            'transaksi' => Transaksi::where('user_id', auth()->user()->id)->get(),
            'snapToken' => $snapToken
        ]);
    }
    public function create(Request $request)
    {
        $keranjang   = Keranjang::where('user_id', Auth::id())->get();
        $idProduk = $keranjang->pluck('produk_id');
        $idToko = Produk::whereIn('id', $idProduk)->groupBy('toko_id')->pluck('toko_id');

        $cekongkir = null;
        $provinsi = Province::all();
        return view('pelanggan.transaksi.create', [
            'keranjangs' => Keranjang::where('user_id', Auth::id())->get(),
            'produks' => Produk::all(),
            'idProduk' => $idProduk,
            'idToko' => $idToko,
            'provinsi' => $provinsi,
            'cekongkir' => $cekongkir,

        ]);
    }

    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'user_id' => 'required',
        //     'toko_id' => 'required',
        //     'produk_id' => 'required',
        //     'nama' => 'required',
        //     'no_telp' => 'required',
        //     'alamat' => 'required',
        //     'jasa_pengiriman' => 'required',
        //     'no_resi' => 'required',
        //     'payment' => 'required',
        //     'status_pembayaran' => 'required',
        //     'status_pesanan' => 'required'
        // ]);

        $transaksi = new Transaksi;
        $transaksi->user_id = $request->user_id;
        $transaksi->toko_id = $request->toko_id;
        $transaksi->produk_id = $request->produk_id;
        $transaksi->nama = $request->nama;
        $transaksi->no_telp = $request->no_telp;
        $transaksi->alamat = $request->alamat;
        $transaksi->jasa_pengiriman = $request->jasa_pengiriman;
        $transaksi->no_resi = $request->no_resi;
        $transaksi->status_pembayaran = $request->status_pembayaran;
        $transaksi->status_pesanan = $request->status_pesanan;
        $getProdukId = json_decode($request->produk_id, true);
        foreach ($getProdukId as $value) {
            $getProduk = Produk::find($value);
        }
        $hargaProduk = (int)$getProduk->harga;
        $ongkir = (int)$request->service;
        $totalharga = $hargaProduk + $ongkir;
        $transaksi->total_bayar = $totalharga;

        $transaksi->qty = $request->qty;
        $produk = Produk::find($value);
        $produk->qty = $produk->qty - $request->qty;
        $produk->save();
        $transaksi->save();
        // Transaksi::Create($validatedData);
        Keranjang::where('user_id', Auth::id())->delete();
        return redirect()->route('transaksi.index', []);
    }

    public function destroy($id)
    {
        Transaksi::find($id)->delete();
        return redirect()->route('transaksi.index');
    }

    public function checkOngkir(Request $request)
    {
        if ($request->origin && $request->destination && $request->weight && $request->courier) {
            $origin = $request->origin;
            $destination = $request->destination;
            $weight = $request->weight;
            $courier = $request->courier;

            $response = Http::asForm()->withHeaders([
                'key' => 'eb861daccba54d4b7daab328a345648b'
            ])->post('https://api.rajaongkir.com/starter/cost', [
                'origin' => $origin,
                'destination' => $destination,
                'weight' => $weight,
                'courier' => $courier
            ]);

            $cekongkir = $response['rajaongkir']['results'][0]['costs'];
        } else {
            $origin = '';
            $destination = '';
            $weight = '';
            $courier = '';
            $cekongkir = null;
        }

        return response()->json($cekongkir);
    }

    public function edit(Transaksi $transaksi, Request $request)
    {

        return view('pelanggan.transaksi.edit', [
            'transaksis' => Transaksi::all(),
            'transaksi' => $transaksi,
            'keranjangs' => Keranjang::all(),
            'produks' => Produk::all()

        ]);
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'status_pembayaran' => 'required'
        ]);

        Transaksi::where('id', $id)
            ->update($validatedData);

        return view('pelanggan.transaksi.edit', [
            'transaksi' => Transaksi::find($id),
        ]);
    }
}
