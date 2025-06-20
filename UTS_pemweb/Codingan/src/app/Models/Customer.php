<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'email',
        'telepon',
        'alamat',
    ];

    public function customer()
    {
        return $this->hasOne(\App\Models\Customer::class, 'email', 'email');
    }
}
