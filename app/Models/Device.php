<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'key_id', 'product_id','hardware_unique', 'operating_system', 'registered_ip_address', 'registered_country'
    ];

  
}
