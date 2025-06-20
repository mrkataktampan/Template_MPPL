<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    protected $fillable = [
        'customer_id',
        'kendaraan_id',
        'jumlah',
        'total_harga',
    ];

    protected static function booted(): void
    {
        static::creating(function (Transaksi $transaksi) {
            $kendaraan = Kendaraan::find($transaksi->kendaraan_id);

            if (!$kendaraan) {
                throw new \Exception('Kendaraan tidak ditemukan.');
            }

            // Pastikan jumlah valid
            if ($transaksi->jumlah < 1) {
                throw new \Exception('Jumlah pembelian minimal 1.');
            }

            // Cek stok cukup
            if ($kendaraan->stok < $transaksi->jumlah) {
                throw new \Exception("Stok tidak mencukupi. Tersisa {$kendaraan->stok} unit.");
            }

            // Kurangi stok sesuai jumlah
            $kendaraan->stok -= $transaksi->jumlah;

            // Update status jika stok habis
            if ($kendaraan->stok <= 0) {
                $kendaraan->status = 'Sold Out';
            }

            $kendaraan->save();

            // Hitung total harga
            $transaksi->total_harga = $kendaraan->harga * $transaksi->jumlah;
        });
    }

    public function customer() { return $this->belongsTo(Customer::class); }
    public function kendaraan() { return $this->belongsTo(Kendaraan::class); }

}