<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;


    protected $fillable = [
        'location_id', 'name', 'address', 'phone', 'email', 'website', 'description', 'image', 'longitude', 'latitude', 'status'
    ];
}
