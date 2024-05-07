<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coblog extends Model
{
    use HasFactory;


    protected $fillable = [
        'product_id',
        'quantity',
        'expected_quantity',
        'comment',
        'user_id',
        'date',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    
}
