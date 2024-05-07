<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 'first_name', 'last_name', 'customertype_id', 'username', 'email', 'phone_number', 'address', 'password'
    ];

    public function customertypes()
    {
        return $this->belongsTo(Customertype::class, 'customertype_id', 'customertype_id');
    }
}


