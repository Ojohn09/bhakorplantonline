<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pos extends Model
{
    use HasFactory;

    protected $fillable = [
        'pos_id', 'location_id', 'user_id', 'customer_id', 'product_id', 'quantity', 'amount', 'price', 'pos_invoice', 'payment_type', 'date', 'comment'
    ];


    public function locations()
    {
        return $this->belongsTo(Location::class, 'location_id', 'location_id');
    }

public function users()
{
    return $this->belongsTo(User::class, 'user_id' , 'id');
}


public function customers()
{
    return $this->belongsTo(Customer::class, 'customer_id' , 'customer_id');
}


public function products()
{
    return $this->belongsTo(Product::class, 'product_id' , 'product_id');
}

// public function users()
// {
//     return $this->belongsTo(Usertype::class, 'user_id' , 'user_id');
// }

// public function users()
// {
//     return $this->belongsTo(Usertype::class, 'user_id' , 'user_id');
// }


}
