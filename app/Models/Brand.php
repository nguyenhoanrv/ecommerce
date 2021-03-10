<?php

namespace App\Models;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use Uuids;

    protected $fillable = [
        'brand_name'
    ];
}