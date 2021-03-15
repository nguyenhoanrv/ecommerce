<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Newletter extends Model
{
    use Uuids;
    protected $fillable = [
        'email'
    ];
}