<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotels extends Model
{
    protected $table = 'hotels';

    public $timestamps = false;

    protected $fillable = [
        'name', 'city_id', 'type_food_id', 'description', 'stars','photo_link'
    ];
}
