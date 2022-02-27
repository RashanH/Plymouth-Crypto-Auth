<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Support\Facades\Auth;

class Key extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','product_id', 'customer_id', 'key_code', 'maximum_devices', 'is_blocked', 'notes', 'expires_at'
    ];
    

    public function devices()
    {
        return $this->hasMany(Device::class, 'key_id');
    }

    //protected static function booted()
    //{
    //    static::addGlobalScope('user_based_filter', function (Builder $builder) {
    //        $builder->where('user_id', '=', Auth::id());
    //    });
    //}
}
