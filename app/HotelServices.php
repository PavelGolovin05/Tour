<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelServices extends Model
{
    protected $table = 'hotel_services';

    public $timestamps = false;

    protected $fillable = [
        'hotel_id', 'service_id'
    ];
}
