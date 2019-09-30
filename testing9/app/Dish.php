<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    public $table = 'tbl_dish';

    protected $fillable = [
        'restaurant_id', 'd_name', 'd_prise','d_photo',
    ];
    protected $nullable = [
        'd_photo'
    ];
    public $timestamps = false;
}
