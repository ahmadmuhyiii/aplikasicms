<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produk;
use App\Models\Toko;
use App\Models\Transaksi;
use App\Models\Keranjang;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Transaksi $transaksi)
    {
        // // Set your Merchant Server Key
        // \Midtrans\Config::$serverKey = 'SB-Mid-server-Zu-LieaP1Tx5MZ1E_VVrqFTG';
        // // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        // \Midtrans\Config::$isProduction = false;
        // // Set sanitization on (default)
        // \Midtrans\Config::$isSanitized = true;
        // // Set 3DS transaction for credit card to true
        // \Midtrans\Config::$is3ds = true;

        // $getProdukId = json_decode($transaksi->produk_id, true);
        // foreach ($getProdukId as $value) {
        //     $getProduk = Produk::find($value);
        // }
        // // $idProduk = $transaksi->pluck('produk_id');
        // // $namaproduk = Produk::whereIn('id', $idProduk)->groupBy('nama_produk')->pluck('nama_produk');


        // $params = array(
        //     'transaction_details' => array(
        //         'order_id' => $transaksi->id,
        //         'gross_amount' => $transaksi->total_bayar,
        //     ),
        //     'item_details' => array(
        //         [
        //             'id' => $transaksi->produk_id,
        //             'price' => $transaksi->total_bayar,
        //             'quantity' => $transaksi->qty,
        //             'name' => $getProduk->nama_produk,
        //         ]
        //     ),
        //     'customer_details' => array(
        //         'first_name' => $transaksi->nama,
        //         'email' => $transaksi->email,
        //         'phone' => $transaksi->no_telp,
        //     ),
        // );
        // $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('pelanggan.order.index', [
            'transaksis' => Transaksi::all(),
            'transaksi' => $transaksi,
            'keranjangs' => Keranjang::all(),
            'produks' => Produk::all(),
            // 'snapToken' => $snapToken,
            'orders' => Order::all(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createorder(Request $request, Transaksi $transaksi)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-Zu-LieaP1Tx5MZ1E_VVrqFTG';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $getProdukId = json_decode($transaksi->produk_id, true);
        foreach ($getProdukId as $value) {
            $getProduk = Produk::find($value);
        }
        // $idProduk = $transaksi->pluck('produk_id');
        // $namaproduk = Produk::whereIn('id', $idProduk)->groupBy('nama_produk')->pluck('nama_produk');


        $params = array(
            'transaction_details' => array(
                'order_id' => $transaksi->id,
                'gross_amount' => $transaksi->total_bayar,
            ),
            'item_details' => array(
                [
                    'id' => $transaksi->produk_id,
                    'price' => $transaksi->total_bayar,
                    'quantity' => $transaksi->qty,
                    'name' => $getProduk->nama_produk,
                ]
            ),
            'customer_details' => array(
                'first_name' => $transaksi->nama,
                'email' => $transaksi->email,
                'phone' => $transaksi->no_telp,
            ),
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);


        return view('pelanggan.order.create', [
            'transaksis' => Transaksi::all(),
            'transaksi' => $transaksi,
            'keranjangs' => Keranjang::all(),
            'produks' => Produk::all(),
            'snapToken' => $snapToken,

        ]);
    }

    public function payment_post(Request $request, Order $order, Transaksi $transaksi)
    {

        $json = json_decode($request->get('json'));
        $order = new Order();
        $order->status = isset($json->transaction_status) ? $json->transaction_status : null;
        $order->transaction_id = $json->transaction_id;
        $order->order_id = $json->order_id;
        $order->gross_amount = $json->gross_amount;
        $order->payment_type = $json->payment_type;
        $order->payment_code = isset($json->payment_code) ? $json->payment_code : null;
        $order->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;
        $order->user_id = Auth::user()->id;
        $order->produk_id = $order->getTransaksi->produk_id;
        $order->toko_id = $order->getTransaksi->toko_id;
        $order->save();
        return redirect('/pelanggan/order');
    }

    public function destroy($id)
    {
        Order::where('id', $id)->delete();

        return redirect()->route('order.index');
    }
}
