<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Order extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getProduk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
    public function getToko()
    {
        return $this->belongsTo(Toko::class, 'toko_id');
    }
    public function getTransaksi()
    {
        return $this->belongsTo(Transaksi::class, 'order_id');
    }
}
