<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use Uuids;
    protected $fillable = [
        'coupon_name', 'discount'
    ];
}