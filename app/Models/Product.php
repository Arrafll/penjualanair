<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function attachment(){
        return $this->hasMany(Attachment::class);
    }
    public function cart(){
        return $this->hasMany(Cart::class);
    }
}
