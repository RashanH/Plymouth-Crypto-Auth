<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','product_id', 'customer_id', 'key_code', 'maximum_devices', 'is_blocked', 'notes', 'expires_at'
    ];
}
