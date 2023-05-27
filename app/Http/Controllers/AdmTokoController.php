<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;

use Barryvdh\DomPDF\Facade\Pdf;

class AdmTokoController extends Controller
{
    public function index()
    {
        return view('admin.toko.index', [
            'tokos' => Toko::latest()->filter(request(['search']))->paginate(10)
        ]);
    }

    public function cetak_pdf2()
    {
        $data = Toko::all();

        view()->share('data', $data);
        $pdf = Pdf::loadview('admin.toko.cetak_pdf2');
        return $pdf->download('toko.pdf');
    }
}
