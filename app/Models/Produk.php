<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Produk extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'nama_produk',
        'code',
        'kategori_id',
        'sukucadang_id',
        'toko_id',
        'kondisi',
        'harga',
        'qty',
        'berat',
        'deskripsi',
        'image',
        'view'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function Getsukucadang()
    {
        return $this->belongsTo(Sukucadang::class, 'sukucadang_id');
    }

    public function keranjang()
    {
        return $this->belongsTo(Keranjang::class);
    }
    public function getToko()
    {
        return $this->belongsTo(Toko::class, 'toko_id');
    }
    public function getTransaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['search']) ? $filters['search'] : false) {
            return $query = Produk::where('nama_produk', 'like', '%' . $filters['search'] . '%');
        }
    }
}
