<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    /**
     * Fields that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'from',
        'to',
        'message',
        'link'
    ];


    public function getUser()
    {
        return $this->belongsTo(User::class, "from");
    }
    public function getProduk()
    {
        return $this->belongsTo(Produk::class, "link");
    }
}
