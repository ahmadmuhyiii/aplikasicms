<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Keranjang extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'produk_id',
        'qty',
        'subtotal'
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function produk()
    {
        return $this->hasMany(Produk::class);
    }

    public function getProduk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
    public function getToko()
    {
        return $this->belongsTo(Toko::class, 'toko_id');
    }
    public function getOrder()
    {
        return $this->belongsTo(Order::class);
    }
}
