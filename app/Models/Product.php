<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','name', 'latest_version', 'force_latest_version', 'description', 'secret_code'
    ];

    public function keys()
    {
        return $this->hasMany(Key::class);
    }
}
