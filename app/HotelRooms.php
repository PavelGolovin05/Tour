<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelRooms extends Model
{
    protected $table = 'hotel_rooms';

    public $timestamps = false;

    protected $fillable = [
        'hotel_id', 'type_rooms', 'count_rooms'
    ];
}
