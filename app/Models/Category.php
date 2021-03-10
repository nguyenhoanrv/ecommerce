<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    use Uuids;
    protected $fillable = [
        'category_name'
    ];
}