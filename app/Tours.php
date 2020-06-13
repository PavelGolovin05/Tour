<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tours extends Model
{
    protected $table = 'tours';

    public $timestamps = false;

    protected $fillable = [
        'hotel_id', 'cost', 'count_peoples', 'start_tour', 'end_tour', 'insurance', 'type_transfer_id', 'visa', 'food', 'residence', 'hotel_delivery'
    ];
}
