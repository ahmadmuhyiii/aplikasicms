<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Transaksi extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'toko_id',
        'produk_id',
        'nama',
        'no_telp',
        'alamat',
        'jasa_pengiriman',
        'no_resi',
        'qty',
        'total_bayar',
        'status_pembayaran',
        'status_pesanan'
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getProduk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
    public function getKeranjang()
    {
        return $this->belongsTo(Keranjang::class);
    }
    public function getToko()
    {
        return $this->belongsTo(Toko::class, 'toko_id');
    }
}
