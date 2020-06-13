<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderTour extends Model
{
    protected $table = 'order_tour';

    public $timestamps = false;

    protected $fillable = [
        'user_id', 'tour_id', 'city_departure'
    ];
}
