<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function menus()
    {
        return $this->belongsTo(Menu::class, 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
