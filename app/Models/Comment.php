<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = false;
    
    public function menu()
    {
        return $this->hasMany(Menu::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
