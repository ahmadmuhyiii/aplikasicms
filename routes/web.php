<?php


use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelKategoriController;
use App\Http\Controllers\PelProdukController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\TokoController;
use App\Http\Controllers\JualController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\LacakController;
use App\Http\Controllers\SukucadangController;



use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransaksiController;

use App\Http\Controllers\GetApiController;

use App\Http\Controllers\AdmKategoriController;
use App\Http\Controllers\AdmSukucadangController;
use App\Http\Controllers\AdmPelangganController;
use App\Http\Controllers\AdmProdukController;
use App\Http\Controllers\AdmTokoController;
use App\Http\Controllers\AdminMessageController;
use App\Http\Controllers\AdmMotorController;
use App\Http\Controllers\BeliLangsungController;
use App\Http\Controllers\TokoPesananController;
use App\Http\Controllers\ViewTokoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('/pelanggan/kategori', PelKategoriController::class);
    Route::get('/pelanggan/pelkategori/{kategori}', [PelKategoriController::class, 'indexkategori']);
    Route::get('/pelanggan/pelkategori{motor}', [PelkategoriController::class, 'indexkate'])->name('pelkategori.index2');

    Route::get('/pelanggan/pelkategori/{kategori}/{sukucadang}', [PelKategoriController::class, 'indexsukucadang'])->name('pelkategori.indexsukucadang');
    Route::get('pelanggan/pelkategori/{kategori}/sukucadang{sukucadang}', [SukucadangController::class, PelKategoriController::class, 'index']);
    Route::resource('/pelanggan/pelproduk', PelProdukController::class)->parameter('pelproduk', 'produk');
    Route::resource('/pelanggan/toko', TokoController::class);
    Route::get('/pelanggan/viewtoko/show{toko}', [ViewTokoController::class, 'show']);
    Route::get('/pelanggan/pelproduk{produk}', [PelProdukController::class, 'show']);
    Route::post('/pelanggan/pelproduk/{produk}', [PelProdukController::class, 'update']);
    Route::resource('/pelanggan/transaksi', TransaksiController::class);
    Route::post('/pelanggan/transaksi/payment', [TransaksiController::class, 'payment']);
    // Route::resource('/pelanggan/transaksi', OrderController::class)->parameter('transaksi', 'order');
    Route::resource('/pelanggan/order', OrderController::class);
    Route::get('/pelanggan/order/{transaksi}/create', [OrderController::class, 'createorder']);
    Route::post('/pelanggan/order', [OrderController::class, 'payment_post']);
    Route::resource('/pelanggan/toko_pesanan', PesananController::class)->parameter('toko_pesanan', 'transaksi');
    Route::get('/pelanggan/toko_pesanan/{transaksi}/edit2', [PesananController::class, 'edit2']);

    Route::resource('/pelanggan/lacak', LacakController::class);
    Route::post('pelanggan/transaksi/belilangsung', [App\Http\Controllers\BeliLangsungController::class, 'belilangsung']);


    Route::resource('/pelanggan/chat', MessageController::class);

    Route::resource('/pelanggan/keranjang', KeranjangController::class);
    Route::resource('/pelanggan/jual', JualController::class)->parameter('jual', 'produk');
    Route::resource('/pelanggan/profil', UserController::class)->parameter('profil', 'user');

    Route::get('/pelanggan/rajaongkir', [TransaksiController::class, 'create']);
    Route::post('/checkongkircuy', [App\Http\Controllers\TransaksiController::class, 'checkOngkir']);
    Route::get('/getCity/ajax/{id}', [GetApiController::class, 'ajax']);

    // Route::get('/pelanggan/transaksi/create', [TransaksiController::class, 'payment']);
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('adminHome');

    // Route::resource('/admin/kategori', [AdmKategoriController::class, 'index'])->name('admin.kategori.index');
    Route::resource('/admin/admmotor', AdmMotorController::class)->parameter('admmotor', 'motor');
    Route::resource('/admin/kategori', AdmKategoriController::class);
    Route::resource('/admin/sukucadang', AdmSukucadangController::class);
    Route::resource('/admin/admchat', AdminMessageController::class);
    Route::resource('/admin/pelanggan', AdmPelangganController::class)->parameter('pelanggan', 'user');
    Route::get('/pdf', [AdmPelangganController::class, 'cetak_pdf']);
    Route::resource('/admin/produk', AdmProdukController::class);
    Route::get('/produkpdf', [AdmProdukController::class, 'cetak_pdf3']);
    Route::resource('/admin/toko', AdmTokoController::class);
    Route::get('/tokopdf', [AdmTokoController::class, 'cetak_pdf2']);
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:toko'])->group(function () {

    Route::get('/toko/home', [HomeController::class, 'tokoHome'])->name('tokoHome');
});
