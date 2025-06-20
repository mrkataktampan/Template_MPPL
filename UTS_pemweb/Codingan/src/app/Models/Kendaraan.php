<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kendaraan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'merek',
        'tipe',
        'tahun',
        'harga',
        'stok',
        'status',
    ];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }

}
