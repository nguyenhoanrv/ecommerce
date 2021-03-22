<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name', 'product_code', 'product_quantily', 'product_details',
        'product_color', 'product_size', 'selling_price', 'discount_price', 'main_slider',
        'best_rated', 'hot_new', 'mid_slider', 'trend',
        'image_one', 'image_two', 'image_three', 'status',
        'category_id', 'subcategory_id', 'brand_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}