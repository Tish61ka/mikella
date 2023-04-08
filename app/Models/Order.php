<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function users()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function products_order()
    {
        return $this->belongsTo(ProductsOrder::class, 'id');
    }
}
