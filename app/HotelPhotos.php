<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelPhotos extends Model
{
    protected $table = 'hotel_photos';

    public $timestamps = false;

    protected $fillable = [
        'hotel_id', 'photo_link'
    ];
}
