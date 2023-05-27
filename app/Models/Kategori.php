<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Kategori extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'motor_id',
        'nama_kategori',
        'tahun',
        'image'

    ];

    protected $hidden = [
        'remember_token',
    ];

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }

    public function Getmotor()
    {
        return $this->belongsTo(Motor::class, 'motor_id');
    }

    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['search']) ? $filters['search'] : false) {
            return $query = Kategori::where('nama_kategori', 'like', '%' . $filters['search'] . '%');
        }
    }
}
