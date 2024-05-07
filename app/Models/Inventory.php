<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'incoming_or_sale',
        'quantity',
        'current_quantity',

    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }



}
