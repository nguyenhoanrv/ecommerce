<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use Uuids;

    protected $fillable = [
        'brand_name', 'brand_logo'
    ];
    public function limitProducts()
    {
        return $this->hasMany(Product::class)->limit(3);
    }
    public function products()
    {
        return $this->hasMany(Product::class)->limit(3);
    }
}