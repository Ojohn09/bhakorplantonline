<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Incoming extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'quantity', 'supplier_id', 'incoming_invoice', 'date'
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

public function suppliers()
{
    return $this->belongsTo(Supplier::class, 'supplier_id' , 'supplier_id');
}

}
