<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Order;
use App\Models\Toko;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function index()
    {
        return view('pelanggan.toko_pesanan.index', [
            'transaksis' => Transaksi::all(),
            'orders' => Order::all(),
        ]);
    }
    //   'transaksis' => Transaksi::where('toko_id', auth()->user()->toko->id)->get(),

    public function destroy($id)
    {
        Transaksi::find($id)->delete();
        return redirect()->route('toko_pesanan.index');
    }

    public function edit(Transaksi $transaksi)
    {

        return view('pelanggan.toko_pesanan.edit', [
            'transaksi' => $transaksi,
            'transaksis' => Transaksi::all(),

        ]);
    }
    // $transaksi = Transaksi::where('id', $transaksi->id)->first();

    public function update(Request $request, Transaksi $transaksi)
    {
        $validatedData = $request->validate([
            'no_resi' => 'required',
            'status_pesanan' => 'required'
        ]);

        Transaksi::where('id', $transaksi->id)
            ->update($validatedData);

        return redirect('/pelanggan/toko_pesanan');
    }


    public function edit2(Transaksi $transaksi)
    {

        return view('pelanggan.toko_pesanan.edit2', [
            'transaksi' => $transaksi,
            'transaksis' => Transaksi::all(),

        ]);
    }
    // $transaksi = Transaksi::where('id', $transaksi->id)->first();

    public function update2(Request $request, Transaksi $transaksi)
    {
        $validatedData = $request->validate([
            'status_pesanan' => 'required'
        ]);

        Transaksi::where('id', $transaksi->id)
            ->update($validatedData);

        return redirect('/pelanggan/toko_pesanan');
    }
    // public function cetak_laporan()
    // {
    //     $data = User::all();

    //     view()->share('data', $data);
    //     $pdf = Pdf::loadview('admin.pelanggan.cetak_pdf');
    //     return $pdf->stream('user.pdf');
    // }
}
