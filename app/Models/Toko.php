<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Toko extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'nama_toko',
        'nik',
        'image2',
        'image',
        'email',
        'no_telp',
        'nomor_rek',
        'province_id',
        'city_id',
        'alamat'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function getProduk()
    {
        return $this->belongsTo(Produk::class);
    }
    public function getProvince()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
    public function getCity()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['search']) ? $filters['search'] : false) {
            return $query = Toko::where('nama_toko', 'like', '%' . $filters['search'] . '%')
                ->orwhere('email', 'like', '&' . $filters['search'] . '%');
        }
    }
}
