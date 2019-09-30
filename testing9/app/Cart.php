<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $table = 'tbl_cart';

    protected $fillable = [
        'restaurant_id', 'user_id', 'dish_id','date',
    ];

    public $timestamps = false;
}
