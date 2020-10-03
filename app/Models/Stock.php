<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Authenticatable;

class Stock extends Model
{
    protected $guarded = [
    'id'
    ];
}

// class Stock extends Authenticatable
// {
//     protected $fillable = [
//         'name',
//     ];
// }
