<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    protected $fillable = ['name', 'description', 'price', 'category', 'available'];

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
