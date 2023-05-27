<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class AdmProdukController extends Controller
{
    public function index()
    {
        return view('admin.produk.index', [
            'produks' => Produk::latest()->filter(request(['search']))->paginate(10)
        ]);
    }

    public function cetak_pdf3()
    {
        $data = Produk::all();

        view()->share('data', $data);
        $pdf = Pdf::loadview('admin.produk.cetak_pdf3');
        return $pdf->stream('produk.pdf');
    }
}
