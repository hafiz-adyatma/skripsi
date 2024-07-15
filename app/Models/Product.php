<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'price',
        'color',
        'description',
    ];

    public function sizes()
    {
        return $this->hasMany(ProductSize::class);
    }
}
